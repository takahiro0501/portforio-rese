<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

const loginFlg = ref(localStorage.getItem('loginFlg'));
const favoriteFlg = ref(null);
const props = defineProps({
  shop: Object,
  favorite: Object,
  reservation: Object,
  MyPageFlg: Boolean
});

const favoriteAlert = () => {
  alert('お気に入り機能はログイン後、利用可能です');
}

if (loginFlg.value == 'true') {
  for (let i = 0; i < props.favorite.length; i++) {
    if (props.favorite[i]['shop_id'] == props.shop.id) {
      favoriteFlg.value = true;
    }
  }  
}

const favoriteRegister = (value) => {
  const param = {
    'email': localStorage.getItem('email'),
    'shopId': props.shop.id,
    'move': value
  };
  //お気に入り登録/解除
  fetch('favorite', {
      method: 'POST',
      headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
      body: JSON.stringify(param)
  })
  .then((response) => {
      return response.json();
  })
  .then((result) => {
    if (value == 'register') {
      alert('［'+props.shop.title+'］'+'をお気に入り登録しました！');
      favoriteFlg.value = true;
    } else {
      alert('［'+props.shop.title+'］'+'のお気に入りを解除しました！');
      favoriteFlg.value = false;      
    }
  })
  .catch(error => {
      console.error('エラーが発生', error);
  })
}

</script>

<template>
  <div class="shop-card">
    <div class="shop-card-wrapper">
      <div class="card-left">
        <img :src="shop.img" alt="">
      </div>
      <div class="card-right">
        <div class="card-first">
          <span class="area-name">#{{ shop.area.name }}</span>
          <span>#{{ shop.genre.name }}</span>
        </div>
        <div class="card-second">
          <div>
            <span class="shops-title">
              {{ shop.title }}
            </span>
            <span class="shops-tel">
              <i class="bi bi-telephone-inbound"></i>
              {{ shop.tel }}
            </span>
            <span v-if="props.MyPageFlg">
              <span class="shops-favorite red">
                <i class="bi bi-heart-fill"></i>
              </span>
            </span>
            <span v-else>
              <div v-if="loginFlg == 'false'" class="shops-favorite">
                <span class="shops-favorite" @click="favoriteAlert">
                  <i class="bi bi-suit-heart"></i>
                </span>
              </div>
              <div v-else class="shops-favorite">
                  <span class="shops-favorite" v-if="!favoriteFlg" @click="favoriteRegister('register')">
                    <i class="bi bi-suit-heart"></i>
                  </span>
                  <span class="shops-favorite red" v-else @click="favoriteRegister('cancel')">
                    <i class="bi bi-heart-fill"></i>
                  </span>
              </div>
            </span>
          </div>
          <div class="showBtn">
            <Link :href="route('shop.show',shop)">
              <button class="btn btn-outline-primary">詳細ページへ移動</button>
            </Link>
          </div>
        </div>
        <div class="card-third">
          <span>{{ shop.text }}</span>
        </div>
        <div class="card-forth">
          <span>
            【営業時間】{{ shop.start_time.slice(0,5)}}~
            {{ shop.end_time.slice(0,5)}}
          </span>
        </div>
        <div class="reservation-box">
          <table class="reservation-table" >
            <tr>
              <th v-for="(value,day) in props.reservation" :key="shop.id+day+value">
                {{ day }}
              </th>
            </tr>
            <tr>
              <th v-for="(value,day) in props.reservation" :key="day+value">{{ value }} </th>
            </tr>
          </table>
          <div class="main-usage">
            <span>◎：予約可</span>
            <span>△：残席わずか</span>
            <span>×：予約不可</span>
            <span>TEL：要問い合せ</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
