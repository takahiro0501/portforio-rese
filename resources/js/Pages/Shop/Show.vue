<script setup>
import Header from "../Components/Header.vue";
import EyeCatch from "../Components/EyeCatch.vue";
import Menu from "../Components/Menu.vue";
import Map from "../Components/Map.vue";

const props = defineProps({
  shop: Object,
  favoriteFlg: Boolean
});
</script>

<template>
  <div class="contents">
    <!-- ヘッダー定義 -->
    <Header></Header>
    <div class="wrapper shop-display">
      <!-- 店舗アイキャッチ -->
      <div class="shop-eye-catch">
        <EyeCatch :shop="shop" :favoriteFlg="favoriteFlg"></EyeCatch>
      </div>
      <!-- おすすめメニュー -->
      <div>
        <Menu :shopFood="shop.shop_food"></Menu>
      </div>
      <!-- アクセス -->
      <div class="shop-access">
        <Map :address="shop.address" :postCode="shop.post_code"></Map>
      </div>
    </div>
  </div>
</template>

<style>
.contents{
  width: 100%;
  height: 100vh;
  z-index: 1;
}

</style>
