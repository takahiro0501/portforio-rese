<script setup>
import { ref } from 'vue';
import Header from "../Components/Header.vue";
import ShopCard from "../Components/ShopCard.vue";
import ShopSearch from "../Components/ShopSearch.vue";

const props = defineProps({
  shops: Object,
  areas: Object,
  genres: Object,
  user: Object,
  favorite: Object,
  reservation: Object,
});

const shops = ref([]);
const loginUser = ref(null);

if (props.user == null) {
  localStorage.setItem('loginFlg','false');
  localStorage.removeItem('email');
} else {
  localStorage.setItem('loginFlg','true');  
  localStorage.setItem('email',props.user.email);  
}

if (localStorage.getItem('email') !== null) {
  loginUser.value = localStorage.getItem('email');
}

const searchShop = (shopVal) => {
  shops.value = shopVal;
}

const shopReservationData = (shopId) => {
  return props.reservation['s'+shopId];
}
</script>

<template>
  <!-- ヘッダー定義 -->
  <Header></Header>
  <div class="login-user">
    <span v-if="loginUser !== null">{{ loginUser }} 様、ログイン中！</span>
    <span v-else>ゲスト 様</span>
  </div>
  <div class="wrapper d-flex">
    <!-- 店舗一覧 -->
    <div class="main" v-if="shops.length !== 0">
      <div v-for="(shop,key) in shops" v-bind:key="key">
        <ShopCard :shop="shop" 
                  :favorite="props.favorite" 
                  :reservation="shopReservationData(shop.id)">
        </ShopCard>
      </div>
    </div>
    <div v-else class="main">
      ～該当する店舗はありません～
    </div>
    <!-- 店舗検索 -->
    <ShopSearch
      :areas="props.areas"
      :genres="props.genres"
      :shops="props.shops"
      @search-shop="searchShop"
    >
    </ShopSearch>
  </div>
</template>