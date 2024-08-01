<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import Register from "../Components/Modal/Register.vue";
import Login from "../Components/Modal/Login.vue";


const showRegisterModalValue = ref(false);
const showLoginModalValue = ref(false);
const loginFlg = ref(localStorage.getItem('loginFlg'));

const showRegisterModal = () => {
  showRegisterModalValue.value = true;
}

const closeRegisterModal = () => {
  showRegisterModalValue.value = false;
}

const showLoginModal = () => {
  showLoginModalValue.value = true;
}

const closeLoginModal = () => {
  showLoginModalValue.value = false;
}

const loginOption = () => {
  loginFlg.value = localStorage.getItem('loginFlg'); 
}

const logout = () => {
  //ログアウト
  fetch('/logout', {
      method: 'GET',
      headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
  })
  .then((response) => {
      return response.json();
  })
  .then((result) => {
    localStorage.setItem('loginFlg', 'false');
    localStorage.removeItem('email');
    alert(result['msg']);
    loginFlg.value = 'false';
    window.location.reload();
  })
  .catch(error => {
      console.error('エラーが発生!', error);
  })
}

</script>

<template>
  <header class="header">
    <div class="title">
      <h1><i class="bi bi-egg-fried"></i>RESE</h1>
    </div>
    <div class="options">
      <div class="option-box" v-if="loginFlg == 'false'">
        <div class="option-parts" @click="showRegisterModal">
          <div class="option-icon">
            <span><i class="bi bi-person-add"></i></span>
          </div>
          <div class="option-name">
            ユーザ登録
          </div>
        </div>
        <div class="option-parts" @click="showLoginModal">
          <div class="option-icon">
            <span><i class="bi bi-box-arrow-in-right"></i></span>
          </div>
          <div class="option-name">
            ログイン
          </div>
        </div>
        <Register v-if="showRegisterModalValue" 
                  @close-modal="closeRegisterModal" 
                  @login="loginOption">
        </Register>
        <Login v-if="showLoginModalValue" 
                  @close-LoginModal="closeLoginModal" 
                  @login="loginOption">
        </Login>
      </div>
      <div class="option-box" v-else>
        <Link :href="route('myPage')">
          <div class="option-parts">
            <div class="option-icon">
              <span><i class="bi bi-house-up"></i></span>
            </div>
            <div class="option-name">
              マイページ
            </div>
          </div>
        </Link>
        <div class="option-parts" @click="logout">
          <div class="option-icon">
            <span><i class="bi bi-box-arrow-in-left"></i></span>
          </div>
          <div class="option-name">
            ログアウト
          </div>
        </div>
      </div>
    </div>
  </header>
</template>
