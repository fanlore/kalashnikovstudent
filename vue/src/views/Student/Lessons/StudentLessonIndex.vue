<template>
  <div class="w-full overflow-hidden shadow-xs" v-if="studentLesson && currentHomework">
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
                    <p tabindex="0" class="focus:outline-none text-indigo-600 text-xs font-bold">?????? 3: ?????????????????? ?????????????????? ????????????????????</p>
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
    <div class="shadow-sm rounded-lg bg-white p-5 mb-5" v-html="studentLesson.content">

    </div>


    <div class="shadow-sm rounded-lg bg-white p-5 mb-5">
      <p class="font-bold text-gray-500 mb-5">???????????????? ??????????????</p>
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
          ?????????????? ????????
        </span>
        </a>

      </div>
    </div>
    <div class="shadow-sm rounded-lg bg-white p-5 mb-5" v-if="currentHomework.homework_media">
      <p class="font-bold text-gray-500 mb-5">?????????????????? ??/??</p>
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
          ?????????????? ????????
        </span>

        </a>
        <a @click.prevent="clearFile" class="flex items-center mb-2 gap-x-3 py-3 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
          ??????????????
        </a>

      </div>

    </div>
    <div class="shadow-sm rounded-lg bg-white p-5 mb-5" v-else>
      <Dropzone :homeworkId="studentLesson.homework_id"></Dropzone>
    </div>
    <div class="shadow-sm rounded-lg bg-white p-5 mb-5">
      <Chat></Chat>
    </div>
  </div>
</template>

<script setup>
import { useRoute, useRouter } from 'vue-router';
import {computed, ref, watch} from "vue";
import {useStore} from "vuex";
import store from "../../../store";
import Preloader from "./../../../components/Preloader.vue";
import Chat from "./../../../components/Chat.vue";
import useVuelidate from "@vuelidate/core"
import {required, email,minLength, helpers} from "@vuelidate/validators"
import Dropzone from "./../../../components/Dropzone.vue";
import axiosClient from "../../../axios";

const route = useRoute();
const router = useRouter();


const studentLesson = computed(() => store.state.studentLessons.currentLesson.data);
const currentHomework = computed(() => store.state.studentLessons.currentHomework.data);

if (route.params.id) {
  store.dispatch("getStudentLesson", {id:route.params.id,usePreloader:true}).then(() => {
    store.dispatch("getStudentHomework",{id:studentLesson.value.homework_id, usePreloader:true})
  });
}

function clearFile(){
  axiosClient.post(`/student/homework/store?delete_homework=1&homework_id=${currentHomework.value.id}`)
    .then(() => {
    store.dispatch("getStudentHomework",{id:studentLesson.value.homework_id, usePreloader:true})
  })
    .then(()=> {
    store.commit("notify", {
      type: "error",
      message: "???????? ????????????",
    });
  })
}

</script>

<style>

</style>
