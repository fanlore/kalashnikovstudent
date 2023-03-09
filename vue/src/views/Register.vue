<template>
  <div class="min-w-screen min-h-screen flex items-center justify-center px-5 py-5">
    <div class="bg-white text-gray-500 rounded shadow-md w-full overflow-hidden" style="max-width:1000px">
      <div class="md:flex w-full">
        <div class="hidden md:flex w-1/2 py-10 px-10 bg-gradient-to-br to-indigo-500 from-indigo-400 ">
          <img src="../assets/RegisterIllustration.svg" alt="Регистрация иллюстрация" class="self-center">
        </div>
        <div class="w-full md:w-1/2 pt-5 pb-10 px-5 md:px-10">
          <div class="block mb-2">
            <a href="#">
              <img src="../assets/logo.svg" alt="Логотип образовательной платформы." class="ml-auto">
            </a>
          </div>
          <div class="text-center relative mb-8 after:w-8 after:bg-indigo-500 after:h-1 after:rounded-lg after:absolute after:contents-[] after:left-1/2 after:-bottom-2 after:-translate-x-1/2">
            <h1 class="font-extrabold text-2xl text-gray-900">Регистрация</h1>
          </div>
          <div>

            <form @submit="register">
               <div class="grid xl:grid-cols-2 xl:gap-6">
                <div class="relative z-0 w-full mb-4 group">
                  <input type="text" name="first_name" id="first_name"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:ring-0 focus:border-indigo-600 peer"
                    placeholder=" " required="" v-model="user.name">
                  <label for="first_name"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Имя
                  </label>
                </div>
                <div class="relative z-0 w-full mb-4 group">
                  <input type="text" name="last_name" id="last_name"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:ring-0 focus:border-indigo-600 peer"
                    placeholder=" " required="" v-model="user.surname">
                  <label for="last_name"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Фамилия
                  </label>
                </div>
              </div>
<!-- 
               <div class="relative z-0 w-full mb-4 group">
                  <div class="relative">
                    <select class="block appearance-none w-full bg-transparent border-0 border-b-2 border-gray-300 text-gray-900 text-sm pl-0 py-3 pr-8 leading-tight focus:bg-white focus:border-indigo-500 outline-0 focus:ring-transparent" id="grid-state">
                      <option>Студент</option>
                    </select>
                  </div>
              </div> -->

              <div class="relative z-0 w-full mb-6 group">
                <input type="email" name="email"
                  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:ring-0 focus:border-indigo-600 peer"
                  placeholder=" " required="" v-model="user.email">
                <label for="email"
                  class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 ">Почта
                  </label>
                  <div v-if="errorMsg.email">
                <p class=" text-red-700 font-light text-sm mt-2 mb-2">
                  {{ errorMsg.email[0] }}
                </p>
              </div>
              </div>
              <div class="relative z-0 w-full mb-6 group">
                <input type="password" name="floating_password" id="floating_password"
                  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:ring-0 focus:border-indigo-600 peer"
                  placeholder=" " required="" v-model="user.password">
                <label for="floating_password"
                  class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Пароль</label>
              </div>

              <div class="relative z-0 w-full mb-6 group">
                <input type="password" name="repeat_password" id="floating_repeat_password"
                  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:ring-0 focus:border-indigo-600 peer"
                  placeholder=" " required="" v-model="user.password_confirmation">
                <label for="floating_repeat_password"
                  class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Подтвердить пароль
                  </label>
              </div>
              <div v-if="errorMsg.password">
                <p class=" text-red-700 font-light text-sm mt-2 mb-2" v-for="err in errorMsg.password">
                  {{ err }}
                </p>
              </div>

              <button type="submit"
                class="text-white focus:outline-none bg-indigo-500 font-medium text-sm w-full px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800 transition-all focus:shadow-[6px_6px_0px_rgba(99,102,241,0.35)] active:shadow-[0px_0px_0px_rgba(99,102,241,0.35)] hover:shadow-[6px_6px_0px_rgba(99,102,241,0.35)] relative focus:after:-left-2 focus:after:-top-2 active:after:left-0 active:after:top-0 after:absolute after:contents-[] after:w-full after:h-full after:left-0 after:top-0 after:border-2 after:border-indigo-500 hover:after:-left-2 hover:after:-top-2 after:transition-all"
                >Зарегистрироваться</button>

            </form>
            <p class="text-sm font-semibold mt-2 pt-1 mb-0">
                  <router-link :to="{name: 'Login'}" class="text-indigo-500 hover:text-indigo-700 focus:text-indigo-700 transition duration-200 ease-in-out">Перейти к авторизации</router-link>
                </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
  import store from '../store';
  import {useRouter} from 'vue-router';
  import {ref} from 'vue';

  const router = useRouter();
  const user = {
    name:'',
    surname:'',
    email:'',
    password:'',
    password_confirmation:''
  }

  let errorMsg = ref('');

  function register(e){
    e.preventDefault();
    store
      .dispatch('register', user)
      .then((res) => {
        router.push({
          name:'Dashboard'
        })
      })
      .catch(err => {
          console.log(err.response.data.errors);
          errorMsg.value = err.response.data.errors;
        })
  }

</script>

<style scope>


</style>
