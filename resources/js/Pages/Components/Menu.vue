<script setup>
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';
import 'vue3-carousel/dist/carousel.css';

const props = defineProps({
  shopFood: Object,
});

</script>


<template>

  <div class="shop-menu">
    おすすめメニュー
  </div>
  <div class="shop-menu-img">
    <Carousel :items-to-show="3" :wrap-around="true" class="mx-2">
    <Slide v-for="num in shopFood.images.length" :key="num">
      <div class="carousel__item">
          <img :src="shopFood.images[num-1].image" alt="">
          <div class="shop-menu-caption">
            {{ shopFood.images[num-1].caption }}
          </div>
      </div>
    </Slide>
    <template #addons>
      <Navigation />
      <Pagination />
    </template>
  </Carousel>  
  </div>

</template>

<style>
.carousel__prev,
.carousel__next{
  width: 40px;
  height: 50px;
  border-radius: 50%;
  color: white;
  background-color: #555555;
  top: 40%;
}

.carousel__prev:hover,
.carousel__next:hover
{
  color: #555555;
  background-color: #c0c0c0;
}

.carousel__prev{
  left: -8%;
}
.carousel__next{
  right: -8%;
}
</style>