<script setup>
import { ref,watch,onMounted } from 'vue';

onMounted(() => {
  const loginBtn = document.getElementById('loginBtn');
});

const emits = defineEmits(['login','close-LoginModal']);
const login = () => {
  emits("login");
};

const closeLoginModal = () => {
  emits("close-LoginModal");
};

const stopEvent = (e) => {
  e.stopPropagation();
};

const email = ref('');
const password = ref('');
const errorEmail = ref('');
const errorPassword = ref('');
const errorUser = ref('');
const emailFlg = ref(0);
const passwordFlg = ref(0);

const validationEmail = () => {
  errorEmail.value = '';
  if (email.value == '') {
    errorEmail.value = 'メールアドレスを入力してください';
    emailFlg.value = 0;
    return;
  }
  if (email.value.length >= 100) {
    errorEmail.value = '100字以内で入力してください';
    emailFlg.value = 0;
    return;
  }
  emailFlg.value = 1;
}

const validationPassword = () => {
  errorPassword.value = '';
  if (password.value.length < 8) {
    errorPassword.value = '8字以上で入力してください';
    passwordFlg.value = 0;
    return;
  }
  if (password.value.length >= 100) {
    errorPassword.value = '100字以内で入力してください';
    passwordFlg.value = 0;
    return;
  }
  passwordFlg.value = 1;
}

watch([emailFlg, passwordFlg], () => {
  if (emailFlg.value == 1 && passwordFlg.value == 1) {
    loginBtn.disabled = false;
  } else {
    loginBtn.disabled = true;
  }
})

const loginExe = () => {
  const param = { 'email': email.value, 'password': password.value };
  //ログイン
  fetch('login', {
      method: 'POST',
      headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
      body: JSON.stringify(param)
  })
  .then((response) => {
      return response.json();
  })
    .then((result) => {
    if (result['errLogin']) {
      errorUser.value = result['errLogin'];
    } else if (result['email']) {
      localStorage.setItem('loginFlg', 'true')
      localStorage.setItem('email', result['email']);
      alert('ログインしました！');
      login();
      closeLoginModal();
      window.location.reload();
    }
  })
  .catch(error => {
      console.error('エラーが発生', error);
  })
}
</script>


<template>
<div id="overlay" @click="closeLoginModal">
  <div class="register-box" @click="stopEvent">
    <div class="modal-header">
      <h5 class="modal-title"> 
          ログイン（テストユーザ：test@test.com パスワード12345678）
      </h5>
      <button type="button" class="btn-close" @click="closeLoginModal"></button>
    </div>
    <div class="modal-body">
      <div class="mb-3 text-start">
        <label class="form-label fs-5">メールアドレス</label>
        <input type="email" class="form-control" v-model="email" @input="validationEmail" placeholder="name@example.com">
        <div class="err-massage fs-5">{{ errorEmail }}</div>
      </div>
      <div class="mb-4 text-start">
        <label class="form-label fs-5">パスワード</label>
        <input type="password" class="form-control" v-model="password" @input="validationPassword">
        <div class="err-massage fs-5">{{ errorPassword }}</div>
        <div class="err-massage fs-5">{{ errorUser }}</div>
      </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" @click="closeLoginModal">閉じる</button>
        <button type="button" class="btn btn-primary" @click="loginExe" id="loginBtn" disabled>ログイン</button>
    </div>
  </div>
</div>
</template>