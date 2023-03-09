<template>
  <div class="w-full overflow-hidden shadow-xs">

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
        <router-link to="/teacher/lessons">
          <a class="flex items-center hover:text-indigo-600" href="#">
            Уроки
            <svg class="flex-shrink-0 h-5 w-5 text-gray-400 dark:text-gray-600 mx-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"/>
            </svg>
          </a>
        </router-link>
      </li>

      <li class="text-sm font-semibold text-gray-800 truncate dark:text-gray-200" aria-current="page">
        {{ route.params.id ? 'Редактирование урока' : "Создание урока" }}
      </li>
    </ol>

    <div class="shadow-sm rounded-lg bg-white p-5 mb-5">
      <div class="mb-4">
        <label for="lesson-theme" class="block text-sm font-medium text-gray-700">Тема</label>
        <input v-model="lessonModel.title" type="text" name="lesson-theme" id="lesson-theme" autocomplete="given-name" class="transition ease-in-out delay-150 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
      </div>

      <div class="mb-4">
        <label for="lesson-number" class="block text-sm font-medium text-gray-700">Порядковый номер</label>
        <input v-model="lessonModel.order_number"  type="number" name="lesson-number" id="lesson-number" autocomplete="given-name" class="transition ease-in-out delay-150 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
      </div>
      <div class="mb-4">
        <label for="lesson-type" class="block text-sm font-medium text-gray-700">Тип урока</label>
        <select id="lesson-type" name="lesson-type" v-model="lessonModel.destination" autocomplete="lesson-type" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
          <option disabled="">Не выбрано</option>
          <option value="lection">Лекция</option>
          <option value="practice">Практика</option>
          <option value="test">Тест</option>
          <option value="exam">Экзамен</option>
        </select>
      </div>
      <div class="flex items-center">
        <input v-model="lessonModel.is_available" v-bind:true-value="1" v-bind:false-value="0" type="checkbox" id="hs-valid-toggle-switch" class="relative shrink-0 w-[3.25rem] h-7 bg-gray-100 checked:bg-none checked:bg-green-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 border border-transparent ring-1 ring-transparent checked:hover:bg-green-600 checked:focus:bg-green-600 focus:border-green-600 focus:ring-green-600 ring-offset-white focus:outline-none appearance-none dark:bg-gray-700 dark:checked:bg-green-600 dark:focus:ring-offset-gray-800
  before:inline-block before:w-6 before:h-6 before:bg-white checked:before:bg-green-200 before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-green-200" checked>
        <label for="hs-valid-toggle-switch" class="text-sm text-gray-500 ml-3 dark:text-gray-400">Закрыть/открыть доступ</label>
      </div>
    </div>
    <Tiptap v-model="lessonModel.content"></Tiptap>
    <div class="shadow-sm rounded-lg bg-white p-5 mb-5">
      <p class="font-bold text-gray-500 mb-5">Домашнее задание</p>
        <div class="flex justify-center items-center w-full" v-if="!lessonModel.homework_media" v-bind="getRootProps()">
          <div class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
            <div class="flex flex-col justify-center items-center pt-5 pb-6">
              <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
              <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Кликните</span> или перетащите, чтобы загрузить</p>
              <p class="text-xs text-gray-500 dark:text-gray-400">ZIP, RAR (Макс. 50МБ)</p>
            </div>
            <input v-bind="getInputProps()">
          </div>
      </div>
      <div class="flex flex-wrap items-center" v-else>
        <a
          class="mr-5 mb-2 group relative inline-flex items-center overflow-hidden rounded bg-indigo-600 px-8 py-3 text-white focus:outline-none focus:ring active:bg-indigo-500"
          :href="lessonModel.homework_media"
          download
        >
        <span
          class="absolute right-0 translate-x-full transition-transform group-hover:-translate-x-4"
        >
          <svg
            class="h-5 w-5"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M17 8l4 4m0 0l-4 4m4-4H3"
            />
          </svg>
        </span>
        <span class="text-sm font-medium transition-all group-hover:mr-4" v-if="lessonModel.homework_file_name ">
          Файл {{ lessonModel.homework_file_name }} готов к загрузке
        </span>

          <span class="text-sm font-medium transition-all group-hover:mr-4" v-else>
          Скачать файл
        </span>
        </a>
        <a @click.prevent="clearFile" class="flex items-center mb-2 gap-x-3 py-3 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
          Удалить
        </a>
      </div>
    </div>
    <div class="py-2 text-right">
      <button @click.prevent="saveLesson" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Сохранить</button>
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
import { useDropzone } from "vue3-dropzone";

import Tiptap from './../../../components/Tiptap.vue'
import axiosClient from "../../../axios";

const route = useRoute();
const router = useRouter();
const lessonModel = ref({
  title:"",
  destination:"",
  order_number:"",
  content:"",
  is_available:"0",
  discipline_id:route.params.discipline_id,
  homework_file_name:"",
  homework_media:"",
});

// dropzone
function onDrop(acceptFiles, rejectReasons) {
  console.log(acceptFiles);
  console.log(rejectReasons);
}
function onDropAccepted(acceptFiles){
  let file = acceptFiles[0];
  // let reader = new FileReader();
  // reader.readAsDataURL(file);
  //
  // reader.onload = function() {
  //   lessonModel.value.homework_file_preview = reader.result;
  // };
  lessonModel.value.homework_file_name = acceptFiles[0].name;
  lessonModel.value.homework_media = file;


  // const formData = new FormData();
  // formData.append('file',acceptFiles[0])
  // axiosClient.post('/teacher/lesson/storeFiles',formData)
}
const { getRootProps, getInputProps, ...rest } = useDropzone({ onDrop,onDropAccepted,maxFiles:1,maxSize:52428800,accept:['.rar','.zip']});

function clearFile(){
  lessonModel.value.homework_file_name = "";
  lessonModel.value.homework_media = "";
}

if (route.params.id) {
  lessonModel.id = "";
  store.dispatch("getLessonEdit", route.params.id);
}
watch(
  () => store.state.teacherLessons.currentLesson.data,
  (newVal, oldVal) => {
    lessonModel.value = {
      ...JSON.parse(JSON.stringify(newVal)),
    };
  }
)
// let rules = {
//   name: {
//     required:helpers.withMessage('Данное поле обязательно', required)
//   },
//   surname: {
//     required:helpers.withMessage('Данное поле обязательно', required)
//   },
//   email: {
//     required:helpers.withMessage('Данное поле обязательно', required),
//     email:helpers.withMessage('Адрес электронной почты должен быть действительным', email),
//   },
//   role: {
//     required:helpers.withMessage('Данное поле обязательно', required),
//   },
//   password: {
//     required:helpers.withMessage('Данное поле обязательно', required),
//     minLengthValue: helpers.withMessage('Поле должно содержать не менее 8 символов', minLength(8)),
//     containsPasswordRequirement: helpers.withMessage(
//       () => `Пароль должен содержать символы в верхнем и нижнем регистре, числа и специальные символы`,
//       (value) => /(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])/.test(value)
//     ),
//   }
// }
// if (route.params.id){
  // rules = {
  //   name: {
  //     required:helpers.withMessage('Данное поле обязательно', required)
  //   },
  //   surname: {
  //     required:helpers.withMessage('Данное поле обязательно', required)
  //   },
  //   email: {
  //     required:helpers.withMessage('Данное поле обязательно', required),
  //     email:helpers.withMessage('Адрес электронной почты должен быть действительным', email),
  //   },
  //   role: {
  //     required:helpers.withMessage('Данное поле обязательно', required),
  //   },
  // }
// }

// const $v = useVuelidate(rules, userModel);
// async function submitWithValidate(){
//   const result = await $v.value.$validate();
//   if (result){
//     saveUser();
//   }else {
//   }
// }


// const userLoading = computed(() => store.state.users.currentUser.loading);

// watch(
//   () => store.state.users.currentUser.data,
//   (newVal, oldVal) => {
//     userModel.value = {
//       ...JSON.parse(JSON.stringify(newVal)),
//     };
//   }
// )

// function onImageChoose(ev) {
//   const file = ev.target.files[0];
//   const reader = new FileReader();
//   reader.onload = () => {
//     userModel.value.image = reader.result;
//     userModel.value.image_url = reader.result;
//     ev.target.value = "";
//   };
//   reader.readAsDataURL(file);
// }

function saveLesson() {
  let action = "создан";
  if (lessonModel.value.id) {
    action = "обновлён";
  }
  store.dispatch("saveLesson", { ...lessonModel.value }).then(({ data }) => {
    console.log(data)
    store.commit("notify", {
      type: "success",
      message: "Урок успешно " + action,
    });
  });
  router.push({ path: '/teacher/lessons' });
}

</script>

<style>

</style>
