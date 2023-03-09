<template>
  <div class="w-full overflow-hidden shadow-xs" >

    <ol class="flex items-center whitespace-nowrap min-w-0 mb-5" aria-label="Breadcrumb">
      <li class="text-sm text-gray-600 dark:text-gray-400">
        <router-link to="/dashboard">
          <a class="flex items-center hover:text-indigo-600" href="#">
            Главная
            <svg class="flex-shrink-0 h-5 w-5 text-gray-400 dark:text-gray-600 mx-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"/>
            </svg>
          </a>
        </router-link>
      </li>
      <li class="text-sm text-gray-600 dark:text-gray-400">
        <router-link to="/admin/users">
          <a class="flex items-center hover:text-indigo-600" href="#">
            Пользователи
            <svg class="flex-shrink-0 h-5 w-5 text-gray-400 dark:text-gray-600 mx-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"/>
            </svg>
          </a>
        </router-link>
      </li>

      <li class="text-sm font-semibold text-gray-800 truncate dark:text-gray-200" aria-current="page">
        {{ route.params.id ? 'Редактирование профиля ' + userModel.name + ' ' + userModel.surname : "Создание пользователя" }}
      </li>
    </ol>
    <div class="">
      <div>
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
              <h3 class="text-lg font-medium leading-6 text-gray-900">Профиль</h3>
              <p class="mt-1 text-sm text-gray-600">Общая информация</p>
            </div>
          </div>
          <div class="mt-5 md:col-span-2 md:mt-0">
            <form action="#" method="POST">
              <div class="shadow sm:overflow-hidden sm:rounded-md">
                <div class="space-y-6 bg-white px-4 py-5 sm:p-6">

                  <div v-if="route.params.id">
                    <label class="block text-sm font-medium text-gray-700">Фото</label>
                    <div class="mt-1 flex items-center">
                    <span class="inline-block h-12 w-12 overflow-hidden rounded-full bg-gray-100 ">
                      <img class="h-full w-full object-cover" :src="userModel.avatar ? userModel.avatar :`https://eu.ui-avatars.com/api/?name=${userModel.name}+${userModel.surname}`" alt="Аватарка">
                    </span>
                    </div>
                    <label class="block text-sm font-medium text-gray-700">Новое фото</label>
                    <div class="mt-1 flex items-center" v-if="route.params.id">
                    <span class="inline-block h-12 w-12 overflow-hidden rounded-full bg-gray-100 ">
                      <img class="h-full w-full object-cover" :src="userModel.imagePreview ? userModel.imagePreview :`https://eu.ui-avatars.com/api/?name=${userModel.name}+${userModel.surname}`" alt="Аватарка">
                    </span>
                    </div>
                  </div>
                  <div v-else>
                    <label class="block text-sm font-medium text-gray-700">Фото</label>
                    <div class="mt-1 flex items-center">
                    <span class="inline-block h-12 w-12 overflow-hidden rounded-full bg-gray-100 ">
                      <img class="h-full w-full object-cover" :src="userModel.imagePreview ? userModel.imagePreview : `https://eu.ui-avatars.com/api/?name=${userModel.name}+${userModel.surname}`" alt="Аватарка">
                    </span>
                    </div>
                  </div>

                  <div>
                    <label class="block text-sm font-medium text-gray-700"></label>
                    <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                      <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                          <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                          <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                            <span>Загрузите фотографию</span>
                            <input @change="onImageChoose" id="file-upload" name="file-upload" type="file" class="sr-only" />
                          </label>
                          <p class="pl-1">или перетащите</p>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, GIF до 10Мб</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                  <button @click.prevent="submitWithValidate" type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Сохранить</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="hidden sm:block" aria-hidden="true">
        <div class="py-5">
          <div class="border-t border-gray-200" />
        </div>
      </div>

      <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
              <h3 class="text-lg font-medium leading-6 text-gray-900">Личная информация</h3>
              <p class="mt-1 text-sm text-gray-600">Личная информация о пользователе</p>
            </div>
          </div>
          <div class="mt-5 md:col-span-2 md:mt-0">
            <form @submit.prevent="submitWithValidate">
              <div class="overflow-hidden shadow sm:rounded-md">
                <div class="bg-white px-4 py-5 sm:p-6">
                  <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                      <label for="first-name" class="block text-sm font-medium text-gray-700">Имя</label>
                      <input v-model="userModel.name"  type="text" name="first-name" id="first-name" autocomplete="given-name" :class="$v.name.$error ? 'transition ease-in-out delay-150 bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full dark:bg-red-100 dark:border-red-400 shadow-[4px_4px_0px_0px_#c7302b] border-none' : 'transition ease-in-out delay-150 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm'" />
                      <span class="text-red-600 text-xs font-bold" v-for="error in $v.name.$errors">
                      {{ error.$message}}
                      </span>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="last-name" class="block text-sm font-medium text-gray-700">Фамилия</label>
                      <input v-model="userModel.surname" type="text" name="last-name" id="last-name" autocomplete="family-name" :class="$v.surname.$error ? 'transition ease-in-out delay-150 bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full dark:bg-red-100 dark:border-red-400 shadow-[4px_4px_0px_0px_#c7302b] border-none' : 'transition ease-in-out delay-150 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm'" />
                      <span class="text-red-600 text-xs font-bold" v-for="error in $v.surname.$errors">
                      {{ error.$message}}
                      </span>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="patronymic" class="block text-sm font-medium text-gray-700">Отчество</label>
                      <input v-model="userModel.patronymic" type="text" name="patronymic" id="patronymic" autocomplete="family-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="email-address" class="block text-sm font-medium text-gray-700">Почтовый адрес</label>
                      <input v-model="userModel.email" type="text" name="email-address" id="email-address" autocomplete="email" :class="$v.email.$error ? 'transition ease-in-out delay-150 bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full dark:bg-red-100 dark:border-red-400 shadow-[4px_4px_0px_0px_#c7302b] border-none' : 'transition ease-in-out delay-150 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm'" />
                      <span class="text-red-600 text-xs font-bold" v-for="error in $v.email.$errors">
                      {{ error.$message}}
                      </span>
                    </div>

                    <div class="col-span-6 sm:col-span-3"  v-if="!route.params.id && $v.password">
                      <label for="password" class="block text-sm font-medium text-gray-700">Пароль</label>
                      <input v-model="userModel.password" type="text" name="email-address" id="password" :class="$v.password.$error ? 'transition ease-in-out delay-150 bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full dark:bg-red-100 dark:border-red-400 shadow-[4px_4px_0px_0px_#c7302b] border-none' : 'transition ease-in-out delay-150 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm'" />
                      <span class="text-red-600 text-xs font-bold" v-if="$v.password.$error">
                      {{ $v.password.$errors[0].$message}}
                      </span>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="group" class="block text-sm font-medium text-gray-700">Группа</label>
                      <select v-model="userModel.group"  id="group" name="group" autocomplete="group" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                          <option disabled selected>Не выбрано</option>
                          <option :value="group.group_number" v-for="group in groups" :key="group.id" :selected="group.group_number === userModel.group">{{ group.group_number }}</option>
                      </select>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="user-role" class="block text-sm font-medium text-gray-700">Роль</label>
                      <select v-model="userModel.role" id="user-role" name="user-role" autocomplete="user-role" :class="$v.role.$error ? 'transition ease-in-out delay-150 bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full dark:bg-red-100 dark:border-red-400 shadow-[4px_4px_0px_0px_#c7302b] border-none' : 'transition ease-in-out delay-150 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm'">
                        <option disabled selected>Не выбрано</option>
                        <option value="Admin">Администратор</option>
                        <option value="Teacher">Преподаватель</option>
                        <option value="Student">Студент</option>
                      </select>
                      <span class="text-red-600 text-xs font-bold" v-for="error in $v.role.$errors">
                      {{ error.$message}}
                      </span>
                    </div>

                  </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                  <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Сохранить</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</template>

<script setup>
import { useRoute, useRouter } from 'vue-router';
import {computed, ref, watch} from "vue";
import {useStore} from "vuex";
import store from "../../../store";
import Preloader from "./../../../components/Preloader.vue";
import useVuelidate from "@vuelidate/core"
import {required, email,minLength, helpers} from "@vuelidate/validators"

const route = useRoute();
const router = useRouter();
const userModel = ref({
  id:"",
  name:"",
  surname:"",
  patronymic:"",
  email: "",
  group: "",
  faculty: "",
  image:"",
  role: "",
  imagePreview:"",
});


store.dispatch("getGroups");
const groups = computed(() => store.state.groups.groups.data);

let rules = {
  name: {
    required:helpers.withMessage('Данное поле обязательно', required)
  },
  surname: {
    required:helpers.withMessage('Данное поле обязательно', required)
  },
  email: {
    required:helpers.withMessage('Данное поле обязательно', required),
    email:helpers.withMessage('Адрес электронной почты должен быть действительным', email),
  },
  role: {
    required:helpers.withMessage('Данное поле обязательно', required),
  },
  password: {
    required:helpers.withMessage('Данное поле обязательно', required),
    minLengthValue: helpers.withMessage('Поле должно содержать не менее 8 символов', minLength(8)),
    containsPasswordRequirement: helpers.withMessage(
      () => `Пароль должен содержать символы в верхнем и нижнем регистре, числа и специальные символы`,
      (value) => /(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])/.test(value)
    ),
  }
}
if (route.params.id){
  rules = {
    name: {
      required:helpers.withMessage('Данное поле обязательно', required)
    },
    surname: {
      required:helpers.withMessage('Данное поле обязательно', required)
    },
    email: {
      required:helpers.withMessage('Данное поле обязательно', required),
      email:helpers.withMessage('Адрес электронной почты должен быть действительным', email),
    },
    role: {
      required:helpers.withMessage('Данное поле обязательно', required),
    },
  }
  store.dispatch("getUserEdit", route.params.id);
}else {
  userModel.value.password = "";
}

const $v = useVuelidate(rules, userModel);
async function submitWithValidate(){
  const result = await $v.value.$validate();
  if (result){
    saveUser();
  }else {
  }
}
if (!route.params.id){
}

const userLoading = computed(() => store.state.users.currentUser.loading);

watch(
  () => store.state.users.currentUser.data,
  (newVal, oldVal) => {
    userModel.value = {
      ...JSON.parse(JSON.stringify(newVal)),
    };
  }
)

function onImageChoose(ev) {
  const file = ev.target.files[0];
  userModel.value.image = file;
  const reader = new FileReader();
  reader.onload = () => {
    userModel.value.imagePreview = reader.result;
  };
  reader.readAsDataURL(file);
}

function saveUser() {
  let action = "создан";
  if (userModel.value.id) {
    action = "обновлён";
  }
  store.dispatch("saveUser", { ...userModel.value }).then(({ data }) => {
    console.log(data)
    store.commit("notify", {
      type: "success",
      message: "Пользователь успешно " + action,
    });
  });
  store.dispatch("getUsers",{url:'/users'});

  router.push({ path: '/admin/users' });
}

</script>

<style scoped>

</style>
