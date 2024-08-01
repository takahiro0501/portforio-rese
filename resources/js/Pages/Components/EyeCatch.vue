<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import Reservation from "../Components/Modal/Reservation.vue";


const props = defineProps({
  shop: Object,
  favoriteFlg: Boolean
});

const loginFlg = ref(localStorage.getItem('loginFlg'));
const favoriteFlgSelf = ref(props.favoriteFlg);
const showReservation = ref(false);
const openModal = () => {
  showReservation.value = true;
};
const closeModal = () => {
  showReservation.value = false;
};

console.log(loginFlg.value);

const favoriteAlert = () => {
  alert('お気に入り機能はログイン後、利用可能です\n［テストユーザ］test@test.com\n［パスワード］12345678');
}
const alertLogin = () => {
  alert('予約機能はログイン後、利用可能です。\n［テストユーザ］test@test.com\n［パスワード］ 12345678');
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
      favoriteFlgSelf.value = true;
    } else {
      alert('［'+props.shop.title+'］'+'のお気に入りを解除しました！');
      favoriteFlgSelf.value = false;      
    }
  })
  .catch(error => {
      console.error('エラーが発生', error);
  })
}
</script>

<template>
  <div class="shop-breadcrumb"> 
    <Link :href="route('shop.index')">
      <span class="shop-back">
        <i class="bi bi-arrow-left-square"></i>
        トップページへ戻る
      </span>
      <span>
        店舗一覧 > {{ shop.title }}
      </span>
    </Link>
  </div>
  <div class="d-flex justify-content-between">
    <div class="eyeCatch-box">
      <div class="shop-title">
        <span v-if="loginFlg == 'true'">
          <span v-if="!favoriteFlgSelf" @click="favoriteRegister('register')">
            <i class="bi bi-suit-heart"></i>
          </span>
          <span v-else>
            <i class="bi bi-heart-fill red" @click="favoriteRegister('cancel')"></i>
          </span>
        </span>
        <span v-else>
          <span @click="favoriteAlert">
            <i class="bi bi-suit-heart"></i>
          </span>
        </span>
        {{ shop.title }}
      </div>
      <div>
        <div class="shop-tel">
          <i class="bi bi-telephone-inbound"></i>
          {{ shop.tel }}
        </div>
        <div class="shop-time">
          【営業時間】
          {{ shop.start_time.slice(0,5) }}~
          {{ shop.end_time.slice(0,5) }}
        </div>
      </div>
    </div>
    <div class="shop-btn">
      <!-- <button class="btn btn-secondary shop-info">
        店舗情報を共有する
      </button> -->
      
      <button class="btn btn-secondary" @click="openModal" v-if="loginFlg == 'true'">
        空席確認・予約する
      </button>
      <button class="btn btn-secondary" @click="alertLogin" v-if="loginFlg == 'false'">
        空席確認・予約する
      </button>
      <Reservation v-if="showReservation" @close-modal="closeModal" :shop="shop"></Reservation>
    </div>
  </div>
  <div class="shop-img">
    <img :src="shop.img" alt="">
  </div>
  <div class="shop-text">
    {{ shop.text }}
  </div>
</template>
