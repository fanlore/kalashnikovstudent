<template>
  <div class="w-full overflow-hidden shadow-xs" v-if="studentLesson && currentHomework">

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
      <li class="text-sm text-gray-600 dark:text-gray-400">
        <router-link :to="{ name: 'LessonHomeworks', params: { id: studentLesson.id }}">
          <a class="flex items-center hover:text-indigo-600" href="#">
            Домашние задания
            <svg class="flex-shrink-0 h-5 w-5 text-gray-400 dark:text-gray-600 mx-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"/>
            </svg>
          </a>
        </router-link>
      </li>
      <li class="text-sm font-semibold text-gray-800 truncate dark:text-gray-200" aria-current="page">
        {{currentHomework.user_data[0].surname}}
      </li>
    </ol>

    <div class="shadow-sm rounded-lg bg-white p-5 mb-5" >
      <div><span class="text-xs px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full dark:bg-green-700 dark:text-green-100"> {{ studentLesson.discipline }} </span></div>
      <h2 class="font-bold text-2xl text-gray-700">{{ studentLesson.title }}</h2>
      <div class="h-full w-full py-12">
        <div class="container">
          <div class=" mx-auto">
            <div class="bg-gray-200 h-1 flex items-center justify-between">
              <div class="w-1/3 bg-indigo-600 h-1 flex items-center">
                <div class="bg-indigo-600 h-6 w-6 rounded-full shadow flex items-center justify-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFFFFF" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <path d="M5 12l5 5l10 -10" />
                  </svg>
                </div>
              </div>
              <div class="w-1/3 flex justify-between bg-indigo-600 h-1 items-center relative">
                <div class="absolute right-0 -mr-2">
                  <div class="relative bg-white shadow-lg px-2 py-1 rounded mt-16 -mr-12">
                    <svg class="absolute top-0 -mt-1 w-full right-0 left-0" width="16px" height="8px" viewBox="0 0 16 8" version="1.1" xmlns="http://www.w3.org/2000/svg">
                      <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Progress-Bars" transform="translate(-322.000000, -198.000000)" fill="#FFFFFF">
                          <g id="Group-4" transform="translate(310.000000, 198.000000)">
                            <polygon id="Triangle" points="20 0 28 8 12 8"></polygon>
                          </g>
                        </g>
                      </g>
                    </svg>
                    <p tabindex="0" class="focus:outline-none text-indigo-600 text-xs font-bold">Шаг 3: требуется повторное выполнение</p>
                  </div>
                </div>
                <div class="bg-indigo-600 h-6 w-6 rounded-full shadow flex items-center justify-center -ml-2">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFFFFF" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <path d="M5 12l5 5l10 -10" />
                  </svg>
                </div>
                <div class="bg-white h-6 w-6 rounded-full shadow flex items-center justify-center -mr-3 relative">
                  <div class="h-3 w-3 bg-indigo-600 rounded-full"></div>
                </div>
              </div>
              <div class="w-1/3 flex justify-end">
                <div class="bg-white h-6 w-6 rounded-full shadow"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="shadow-sm rounded-lg bg-white p-5 mb-5">
      <p class="font-bold text-gray-500 mb-5">Домашнее задание</p>
      <div class="flex flex-wrap items-center" >
        <a
          class="mr-5 mb-2 group relative inline-flex items-center overflow-hidden rounded bg-indigo-600 px-8 py-3 text-white focus:outline-none focus:ring active:bg-indigo-500"
          :href="studentLesson.homework_media"
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
          <span class="text-sm font-medium transition-all group-hover:mr-4">
          Скачать файл
        </span>
        </a>

      </div>
    </div>
    <div class="shadow-sm rounded-lg bg-white p-5 mb-5">
      <p class="font-bold text-gray-500 mb-5">Выполненное д/з</p>

      <div class="flex flex-wrap items-center" v-if="currentHomework.homework_media">
        <a
          class="mr-5 mb-2 group relative inline-flex items-center overflow-hidden rounded bg-indigo-600 px-8 py-3 text-white focus:outline-none focus:ring active:bg-indigo-500"
          :href="currentHomework.homework_media"
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
          <span class="text-sm font-medium transition-all group-hover:mr-4">
          Скачать файл
        </span>
        </a>

      </div>
      <p  v-else>Нет прикреплённых архивов</p>
    </div>
    <div class="shadow-sm rounded-lg bg-white p-5 mb-5">
      <Chat :homeworkId="route.params.id"></Chat>
    </div>
  </div>
</template>
<script setup>
import { useRoute, useRouter } from 'vue-router';
import {computed, ref, watch, defineProps} from "vue";
import {useStore} from "vuex";
import store from "../../../store";
import Preloader from "./../../../components/Preloader.vue";
import Chat from "./../../../components/Chat.vue";
import useVuelidate from "@vuelidate/core"
import {required, email,minLength, helpers} from "@vuelidate/validators"
import axiosClient from "../../../axios";

const route = useRoute();
const router = useRouter();
// const lessonModel = ref({
//
// });

const studentLesson = computed(() => store.state.studentLessons.currentLesson.data);
const currentHomework = computed(() => store.state.studentLessons.currentHomework.data);

store.dispatch("getStudentLesson", {id:route.params.lessonId,usePreloader:true}).then(() => {
  store.dispatch("getStudentHomework",{id:route.params.id, usePreloader:true});
})


</script>

<style>

</style>
