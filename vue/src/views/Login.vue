<template>
    <div class="min-w-screen min-h-screen flex items-center justify-center px-5 py-5">
    <div class="bg-white text-gray-500 rounded shadow-md w-full overflow-hidden min-h-[400px]" style="max-width:1000px">
      <div class="md:flex w-full h-full">
        <div class="hidden md:flex w-1/2 py-10 px-10 min-h-[400px] relative overflow-hidden">
          <img src="../assets/LoginIllustration.svg" alt="Регистрация иллюстрация" class="self-center">
          <div class="bg-svg absolute left-0 bottom-0">
            <svg width="500" height="156" viewBox="0 0 500 156"  style="height:100px;width:100%;">
            <path d="M469.099 146.586C444.032 140.268 415.048 136.93 387.715 132.087C374.329 129.715 361.199 127.03 349.624 123.677C336.883 119.988 325.818 115.627 315.129 111.233C304.426 106.834 293.535 102.431 283.275 97.9109C273.887 93.7737 267.355 88.9361 257.994 84.7755C239.284 76.4684 211.789 73.8208 183.517 71.6541C170.252 70.6408 157.336 69.5155 146.526 66.4943C136.266 63.6272 128.809 59.8355 122.626 55.8384C109.321 47.2418 101.985 37.7205 89.3777 29.0119C75.6304 19.5093 56.3573 10.9828 30.5257 5.16452C20.9764 3.01186 10.5687 1.31215 -6.81898e-06 1.52588e-05L0 156L500 156C490.37 152.554 480.405 149.439 469.099 146.586Z" fill="url(#paint0_linear_22_4269)"/>
            <defs>
            <linearGradient id="paint0_linear_22_4269" x1="512.339" y1="168.57" x2="376.603" y2="-191.545" gradientUnits="userSpaceOnUse">
            <stop stop-color="#5464F4"/>
            <stop offset="1" stop-color="#BBC1FB"/>
            </linearGradient>
            </defs>
          </svg>
          </div>
        </div>
        <div class="w-full md:w-1/2 pt-5 pb-10 px-5 md:px-10">

          <div class="block mb-2">
            <a href="#">
              <img src="../assets/logo.svg" alt="Логотип образовательной платформы." class="ml-auto">
            </a>
          </div>
          <div class="text-center relative mb-8 after:w-8 after:bg-indigo-500 after:h-1 after:rounded-lg after:absolute after:contents-[] after:left-1/2 after:-bottom-2 after:-translate-x-1/2">
            <h1 class="font-extrabold text-2xl text-gray-900">Авторизация</h1>
          </div>
          <div>

            <form @submit="login">

              <div class="relative z-0 w-full mb-6 group">
                <input type="email" name="email"
                  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:ring-0 focus:border-indigo-600 peer"
                  placeholder=" " required="" v-model="user.email">
                <label for="email"
                  class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 ">Почта
                  </label>
              </div>
              <div class="relative z-0 w-full mb-6 group">
                <input type="password" name="floating_password" id="floating_password"
                  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:ring-0 focus:border-indigo-600 peer"
                  placeholder=" " required="" v-model="user.password">
                <label for="floating_password"
                  class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Пароль</label>
                  <div v-if="errorMsg">
                    <p class=" text-red-700 font-light text-sm mt-2 mb-6">
                  {{ errorMsg }}
                   </p>
                  </div>
                </div>


              <button type="submit"
                class="text-white focus:outline-none bg-indigo-500 font-medium text-sm w-full px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800 transition-all focus:shadow-[6px_6px_0px_rgba(99,102,241,0.35)] active:shadow-[0px_0px_0px_rgba(99,102,241,0.35)] hover:shadow-[6px_6px_0px_rgba(99,102,241,0.35)] relative focus:after:-left-2 focus:after:-top-2 active:after:left-0 active:after:top-0 after:absolute after:contents-[] after:w-full after:h-full after:left-0 after:top-0 after:border-2 after:border-indigo-500 hover:after:-left-2 hover:after:-top-2 after:transition-all"
                >Авторизоваться</button>

                    <div class="mt-4 flex flex-col md:flex-row justify-between">
              <div class="flex items-center">
                  <input
                      id="remember-me"
                      type="checkbox"
                      class="form-checkbox h-4 w-4 tw-blue transition duration-150 ease-in-out" v-model="user.remember">
                      <label for="remember-me" class="ml-2 block text-sm leading-5 text-gray-900" >
                          Запомнить меня
                      </label>
                  </div>

                  <div class="text-sm leading-5 mt-4 md:mt-0">
                      <a
                          href="/password-reset/"
                          class="font-medium tw-blue focus:outline-none no-underline transition ease-in-out duration-150">
                          Восстановить пароль
                      </a>
                  </div>
              </div>
              <p class="text-sm font-semibold mt-2 pt-1 mb-0">
                  Нет аккаунта ?
                  <router-link
                      :to="{name: 'Register'}"
                      class="text-indigo-500 hover:text-indigo-700 focus:text-indigo-700 transition duration-200 ease-in-out">Зарегистрироваться</router-link>
              </p>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
    import {useRouter} from 'vue-router';
    import store from '../store';
    import {ref} from 'vue';
    const router = useRouter();
    const user = {
      email:'',
      password:'',
      remember:false
    }

    let errorMsg = ref('');

    function login(e){
      e.preventDefault();
      store
        .dispatch('login', user)
        .then((res) => {
          router.push({
            name:'Dashboard'
          })
        })
        .catch(err => {
          errorMsg.value = err.response.data.error;
        })
    }
</script>

<style scoped>

</style>
