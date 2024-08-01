<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import ShopCard from "../Components/ShopCard.vue";

const props = defineProps({
  user: Object,
  reservation: Object,
  userHistory: Object
});

const shopReservationData = (shopId) => {
  return props.reservation['s'+shopId];
}

const topBack = () => {
  window.location.href = '/shop';
}
</script>

<template>
  <header class="header">
    <div class="title">
      <h1><i class="bi bi-egg-fried"></i>RESE</h1>
    </div>
  </header>
  <div class="myPage-box">
    <div class="myPage-nav">
      <div class="nav flex-column nav-pills myPage-nav-btn" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <button class="nav-link active" 
                id="v-pills-favorite-tab" 
                data-bs-toggle="pill" 
                data-bs-target="#v-pills-favorite" 
                type="button" 
                role="tab" 
                aria-controls="v-pills-favorite" 
                aria-selected="true">
          お気に入り
        </button>
        <button class="nav-link" 
                id="v-pills-history-tab" 
                data-bs-toggle="pill" 
                data-bs-target="#v-pills-history" 
                type="button" 
                role="tab" 
                aria-controls="v-pills-history" 
                aria-selected="false">
          予約履歴
        </button>
          <button class="nav-link" data-bs-toggle="pill" type="button" role="tab" aria-selected="false" @click="topBack">戻る</button>
      </div>
      <div class="tab-content myPage-contents" id="v-pills-tabContent">
        <div class="tab-pane fade show active" 
              id="v-pills-favorite" 
              role="tabpanel" 
              aria-labelledby="v-pills-favorite-tab" 
              tabindex="0">
          <div>
            <div v-if="props.user.favorite.length == 0">
              お気に入り登録はありません
            </div>
            <div class="main" v-else>
              <div v-for="(shop,key) in props.user.favorite" v-bind:key="key">
                <ShopCard :shop="shop.shop" 
                          :favorite="shop"
                          :reservation="shopReservationData(shop.shop.id)"
                          :MyPageFlg=true>
                </ShopCard>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" 
              id="v-pills-history" 
              role="tabpanel" 
              aria-labelledby="v-pills-history-tab" 
              tabindex="0">
          <div v-if="props.userHistory.length == 0">
            予約履歴はありません。
          </div>
          <div v-else>
            <div v-for="(history,key) in props.userHistory" v-bind:key="key" class="reservation-card">
              <div class="history-img">
                <img :src="history.shop.img" alt="">
              </div>
              <div class="history-wrapper">
                <div class="history-data">
                  <span>店名：</span>{{ history.shop.title }}
                </div>
                <div class="history-data">
                  <span>住所：</span>{{ history.shop.address }}
                </div>
                <div class="history-data">
                  <span>TEL：</span>{{ history.shop.tel }}
                </div>
                <div class="history-data">
                  <span>日時：</span>{{ history.datetime }}
                </div>
                <div class="history-data">
                  <span>人数：</span>{{ history.number }}人
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>