<script setup>
import { Loader } from '@googlemaps/js-api-loader';

const props = defineProps({
  address: String,
  postCode: String,
});

const apiKey = import.meta.env.VITE_GOOGLE_MAP_API_KEY;
const url = `https://maps.googleapis.com/maps/api/geocode/json?address=${props.address}&key=${apiKey}`;

const loader = new Loader({
  apiKey: apiKey,
  version: "weekly",
  libraries: ["places"]
});

const mapOptions = {
  center: {
    lat: 0,
    lng: 0
  },
  zoom: 15
};

async function getMap() {
  await fetch(url)
    .then(res => {
      res.json().then(result => {
        mapOptions.center.lat = result.results[0].geometry.location.lat;
        mapOptions.center.lng = result.results[0].geometry.location.lng;
        loader
          .importLibrary('maps')
          .then(({Map}) => {
            const map = new Map(document.getElementById("map"), mapOptions);
            const marker = new google.maps.Marker({
              position: mapOptions.center,
              map: map,
            });
          })
          .catch(e => {
            console.log(e);
          });
      })
    })
} 
getMap();
</script>


<template>

  <div class="shop-access-title">
    アクセス
  </div>
  <div class="shop-access-text">
    <span>〒{{ postCode }}</span>
    <span>{{ address }}</span>
  </div>
  <div id="map" style="width: 100%; height: 60vh;"></div>

</template>
