<script setup>
import { ref,watch,onMounted } from 'vue';
import Calender from '../../../calender';


const emit = defineEmits(['close-modal'])
const props = defineProps({
  shop: Object,
});

const tNum = ref(0);
const tNumTel = ref('');
const tDate = ref('');
const tTime = ref('');
const showCalenderValue = ref(false);
let targetDate = new Date();

onMounted(() => {
  const reserveBtn = document.getElementById('reserveBtn');
  const dummyBtn = document.getElementById('dummyBtn');
});

watch(tNum, (tNumNew) => {
  if (tNumNew == -1) {
    tNumTel.value = "直接店舗にて電話でご確認ください";
  } else {
    tNumTel.value = "";    
  }
})

watch([tNum, tDate, tTime], () => {
  if (tNum.value == 0 || tNum.value == -1 || tDate.value == '' || tTime.value == '') {
    dummyBtn.style.display = 'block';
    reserveBtn.style.display = 'none';    
  } else {
    if (tNum.value !== 0 && tNum.value !== -1) {
      if (tDate.value !== '') {
        if (tTime.value !== '') {
          dummyBtn.style.display = 'none';
          reserveBtn.style.display = 'block';
        }
      }
    }
  }
});

//未入力の注意アラート
const alertReserve = () => {
  window.alert('人数、日付け、時間をすべて入力してください');
}

//初期カレンダー表示
const showCalender = (targetDate) => {
  const prevBtn = document.getElementById('prev');
  if (targetDate.getMonth() == new Date().getMonth()) {
      prevBtn.disabled = true;      
  } else {
    prevBtn.disabled = false;
  }
  showCalenderValue.value = true;
  Calender.addCalender(targetDate,props.shop.id);
};

//クリックされた日付を取得
const getTargetDate = () => {
  const tds = document.getElementsByClassName("active-day");
  Object.keys(tds).forEach(function (key) {
    if (getComputedStyle(tds[key]).fontSize == '15px') {
      tDate.value = tds[key].dataset.target;
      closeCalender();
      targetDate = new Date();
      return;
    }
  });
}

//カレンダー非表示
const closeCalender = () => {
  showCalenderValue.value = false;
};

//カレンダー月変更
const changeMonth = (btn) => {
  const prevBtn = document.getElementById('prev');
  if (btn == 'prev') {
    targetDate.setMonth(targetDate.getMonth() - 1);
    if (targetDate.getMonth() == new Date().getMonth()) {
      prevBtn.disabled = true;    
    }  
  } else if (btn == 'next') {
    targetDate.setMonth(targetDate.getMonth() + 1);     
    prevBtn.disabled = false;
  }
  Calender.addCalender(targetDate,props.shop.id);
}

const closeModal = () => {
  targetDate = new Date();
  emit("close-modal");
};

const stopEvent = (e) => {
  e.stopPropagation();
};

const getTimeArray = () => {
  const timeArray = [];
  const st_time = new Date('July 1, 1999,' + props.shop.start_time);
  const end_time = new Date('July 2, 1999,' + props.shop.end_time);
  let minute = '';
  while (st_time.getTime() <= end_time.getTime()) {
    if (st_time.getMinutes() == 0) {
      minute = '00';
    } else if (st_time.getMinutes() == 30) {
      minute = '30';
    }
    timeArray.push(st_time.getHours() + ':' + minute);
    st_time.setMinutes(st_time.getMinutes() + 30);
  }
  return timeArray;
}
const shopTime = getTimeArray();

const reserve = () => {
  if (localStorage.getItem('loginFlg') === 'true') {
    const param = {'shopId': props.shop.id ,'email': localStorage.getItem('email') ,'num':tNum.value, 'date':tDate.value,'time':tTime.value};
    //予約登録
    fetch('registerData', {
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
        body: JSON.stringify(param)
    })
    .then((response) => {
        return response.json();
    })
    .then((result) => {
      //登録後処理
      alert(localStorage.getItem('email') +' 様\n\n'+result['msg']);
      closeModal();
    })
    .catch(error => {
        console.error('エラーが発生', error);
    })
  } else {
    alert('ログイン又はユーザ登録を先に行ってください');
  }
}
</script>

<template>
  <div id="overlay" @click="closeModal">
    <div class="reserve-box" @click="stopEvent">
      <div>
        <div class="modal-header">
          <h5 class="modal-title"> 
            ＜ {{ shop.title }} ＞ をネット予約する
          </h5>
          <button type="button" class="btn-close" @click="closeModal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-4">
            <label class="form-label">１，人数を選択してください</label>
            <select class="form-select" v-model="tNum" @click="closeCalender">
              <option value="0" selected></option>
              <option v-for="(n,index) in shop.shop_limit.limit_person" :key="index" :value="n">
                {{ n }}人
              </option>
              <option value="-1">{{ shop.shop_limit.limit_person + 1 }}人以上</option>
            </select>
            <div class="err-massage">{{ tNumTel }}</div>
          </div>
          <div class="mb-4 calender">
            <label class="form-label">２，日付を選択してください</label>
            <input type="text" class="form-control calender-input" placeholder="年/月/日" @click="showCalender(targetDate)" v-model="tDate" readonly>
            <div class="calender-box" v-show="showCalenderValue">
              <div id="calender-header">
                <button @click="changeMonth('prev')" id="prev">
                  <i class="bi bi-caret-left-fill"></i>
                </button>
                <span id="year-month"></span>
                <button @click="changeMonth('next')" id="next">
                  <i class="bi bi-caret-right-fill"></i>
                </button>
              </div>
              <div id="calender-contents" @click="getTargetDate"></div>
              <div class="calender-usage">
                <span>◎：予約可</span>
                <span>△：残席わずか</span>
                <span>×：予約不可</span>
                <span>TEL：要問い合せ({{ shop.tel }})</span>
              </div>
            </div>
          </div>
          <div class="mb-4">
            <label class="form-label">３，時間を選択してください</label>
            <select class="form-select" v-model="tTime">
              <option value="" selected></option>
              <option v-for="(time,index) in shopTime" :value="time" :key="index">{{ time }}</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" @click="closeModal">閉じる</button>
          <button type="button" id='dummyBtn' class="btn btn-primary" @click="alertReserve">予約を確定する</button>
          <button type="button" id='reserveBtn' class="btn btn-primary" @click="reserve">予約を確定する</button>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>

.calender-input {
  background-color: white;
}
</style>