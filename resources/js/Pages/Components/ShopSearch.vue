<script setup>
import { ref, computed } from 'vue';

const props = defineProps({
  areas: Object,
  genres: Object,
  shops: Object,
});
const emit = defineEmits(['search-shop'])
const areaSelected = ref(0);
const genreSelected = ref(0);
const searchWord = ref('');
const result = computed(() => {
    let shopArray = [];
    if (areaSelected.value !== 0 || genreSelected.value !== 0){
      if (areaSelected.value !== 0 && genreSelected.value == 0){
        Object.keys(props.shops).forEach(function (key){
          if (props.shops[key].area_id == areaSelected.value){
            shopArray.push(props.shops[key]);
          }
        })
      } else if(areaSelected.value == 0 && genreSelected.value !== 0){
        Object.keys(props.shops).forEach(function (key){
          if (props.shops[key].genre_id == genreSelected.value){
            shopArray.push(props.shops[key]);
          }
        })
      } else {
        Object.keys(props.shops).forEach(function (key){
          if (
            props.shops[key].area_id == areaSelected.value &&
            props.shops[key].genre_id == genreSelected.value
          ){
            shopArray.push(props.shops[key]);
          }
        })
      }
    } else {
      shopArray = props.shops;
    }
    if (searchWord.value !== '') {
      emit('search-shop', 
        shopArray.filter(function (shop) {
          return shop.title.indexOf(searchWord.value) !== -1;
        })
      )
    }else{
      emit('search-shop', shopArray)
    }
})

const resetSearch = () => {
  areaSelected.value = 0;
  genreSelected.value = 0;
  searchWord.value = '';
  emit('search-shop', props.shops)
}
</script>

<template>
<div class="search-pc">
  <div class="form-part">
    <div  class="form-label">
      <label for="">エリアで検索する</label>
    </div>
    <div  class="form-input">
      <select name="" v-model="areaSelected" class="form-select">
        <option :value="0"></option>
        <option v-for="(area,key) in props.areas" :key="key" :value="area.id">
          {{ area.name }}
        </option>
      </select>
    </div>
  </div>
  <div class="form-part">
    <div  class="form-label">
      <label for="">ジャンルで検索する</label>
    </div>
    <div  class="form-input">
      <select name="" v-model="genreSelected" class="form-select">
        <option :value="0"></option>
        <option v-for="(genre,key) in props.genres" v-bind:key="key" :value="genre.id">
          {{ genre.name }}
        </option>
      </select>
    </div>
  </div>
  <div>
    <div  class="form-label">
      <label for="">店名で検索する</label>
    </div>
    <div>
      <input type="text" class="form-control" v-model.trim="searchWord">
    </div>
  </div>
  <div class="form-button">
    <button type="submit" class="btn btn-primary" @click="resetSearch">検索条件をリセットする</button>
  </div>
</div>
  {{ result }}
</template>
