
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
        Домашние задания
      </li>
    </ol>
    <div class="shadow-md ">
      <div class="py-3 px-4 bg-white rounded-t-md flex justify-between items-center dark:bg-gray-800">
        <div class="flex flex-wrap">
          <div class="relative max-w-xs self-end mr-3 ">
            <label for="hs-table-with-pagination-search" class="sr-only">Поиск</label>
            <input type="text" name="hs-table-with-pagination-search" id="hs-table-with-pagination-search" class="p-3 pl-10 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" placeholder="Поиск" :value="search" @input="updateSearch">
            <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none pl-4">
              <svg class="h-3.5 w-3.5 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
              </svg>
            </div>
          </div>
        </div>
      </div>
      <div class="w-full overflow-x-auto ">
        <table class="w-full whitespace-no-wrap">
          <thead>
          <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <th scope="col" class="py-3 px-4 pr-0">
              <div class="flex items-center h-5">
                <input id="hs-table-pagination-checkbox-all" type="checkbox" class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                <label for="hs-table-pagination-checkbox-all" class="sr-only">Checkbox</label>
              </div>
            </th>
            <th scope="col" class="px-4 py-3 text-left">Студент</th>
            <th scope="col" class="px-4 py-3 text-left">Статус</th>
            <th scope="col" class="px-4 py-3 text-left">Оценка</th>
            <th scope="col" class="px-4 py-3 text-left">Действие</th>
          </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
          <tr class="text-gray-700 dark:text-gray-400" v-for="homework in homeworks" v-if="homeworks">
            <td class="py-3  animate-fade-in-down pl-4">
              <div class="flex items-center h-5">
                <input :id="homework.id" :value="homework.id" v-model="homeworkParams.checked" type="checkbox" class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                <label :for="homework.id" class="sr-only">Checkbox</label>
              </div>
            </td>
            <td class="px-4 py-3 text-sm font-semibold">
              {{homework.user_data[0].surname}}
              {{homework.user_data[0].name}}
              {{homework.user_data[0].patronymic}}
            </td>

            <td class="px-4 py-3">
              <div class="flex items-center text-xs">
                <div>
                      <span class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full dark:bg-green-700 dark:text-green-100" v-if="homework.progress === 'wait'">
                          Ожидание выполнения
                      </span>
                  <span class="px-2 py-1 font-semibold leading-tight text-teal-700 bg-teal-100 rounded-full dark:bg-green-700 dark:text-green-100" v-if="homework.progress=== 'check'">
                            На проверке
                        </span>
                  <span class="px-2 py-1 font-semibold leading-tight text-pink-700 bg-pink-100 rounded-full dark:bg-green-700 dark:text-green-100" v-if="homework.progress=== 'retake'">
                            Требуется повторное выполнение
                        </span>
                  <span class="px-2 py-1 font-semibold leading-tight text-rose-700 bg-rose-100 rounded-full dark:bg-green-700 dark:text-green-100" v-if="homework.progress === 'passed'">
                            Выполнено
                        </span>
                </div>
              </div>
            </td>
            <td class="px-4 py-3">

            </td>

            <td class="px-4 py-3 text-sm">
              <div class="hs-dropdown relative inline-flex">
                <button id="hs-dropdown-custom-icon-trigger" type="button" class="hs-dropdown-toggle p-2 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-gray-800 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                  </svg>
                </button>

                <div class="z-50 hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden mt-2 min-w-[15rem] bg-white shadow-md rounded-lg p-2 mt-2 dark:bg-gray-800 dark:border dark:border-gray-700" aria-labelledby="hs-dropdown-custom-icon-trigger">
<!--                  <router-link :to="{name:'LessonHomeworkView', params:{ id:homework.id,lessonId:homework.lesson_data[0].id}}" >-->
                  <button class="w-full" @click.prevent="toHomeworkView(homework)">
                    <a class="flex items-center gap-x-3 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="#">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                      </svg>
                      Открыть
                    </a>
                  </button>
<!--                  </router-link>-->

                </div>
              </div>
            </td>
          </tr >

          </tbody>
        </table>
<!--        <h2 class="p-5" v-if="!lessons.length">По вашему запросу ничего не найдено</h2>-->
      </div>
      <div class="rounded-b-md flex flex-wrap items-center justify-between px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
        <div class="flex flex-wrap">
<!--          <span class="flex items-center col-span-3">-->
<!--          Выведено {{ lessons.length }} из {{ lessonsMeta.total }}-->
<!--&lt;!&ndash;        </span>&ndash;&gt;-->
<!--          <select v-model="lessonsParams.limit" @change="getLessons" id="hs-select-label" class="ml-2 py-3 px-4 pr-9 block border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">-->
<!--            <option selected value="5">5</option>-->
<!--            <option value="10">10</option>-->
<!--            <option value="15">15</option>-->
<!--            <option value="30">30</option>-->
<!--          </select>-->
        </div>
        <!-- Pagination -->
        <span class="flex col-span-4 sm:justify-end items-center">
<!--                  <nav aria-label="Table navigation">-->
<!--                    <ul class="inline-flex items-center">-->

<!--                      <li v-for="(link, i) of lessonsMeta.links" :key="i" >-->
<!--                        <button-->
<!--                          @click="getForPage($event, link)"-->
<!--                          :class="[-->
<!--                              link.active-->
<!--                                ? 'px-3 py-1 text-white transition-colors duration-150 bg-indigo-600 border border-r-0 border-indigo-600 rounded-md focus:outline-none focus:shadow-outline-purple'-->
<!--                                : 'px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple',-->
<!--                            ]">-->
<!--                          <div v-if="lessonsMeta.links[0].label === link.label">-->
<!--                            <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>-->
<!--                          </div>-->
<!--                          <div v-else-if="lessonsMeta.links[lessonsMeta.links.length - 1].label === link.label">-->
<!--                             <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">-->
<!--                              <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>-->
<!--                            </svg>-->
<!--                          </div>-->
<!--                          <div v-else>-->
<!--                            {{  link.label }}-->
<!--                          </div>-->
<!--                        </button>-->
<!--                      </li>-->
<!--                      <li>-->
<!--                        <button class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next">-->

<!--                        </button>-->
<!--                      </li>-->
<!--                    </ul>-->
<!--                  </nav>-->
                </span>
      </div>
    </div>
  </div>

</template>

<script setup>
import Preloader from "./../../../components/Preloader.vue";
import { useRouter,useRoute } from 'vue-router';
import {computed, ref, watch} from "vue";
import {useStore} from "vuex";
const store = useStore();
const homeworks = computed(() => store.state.teacherLessons.homeworks.data);
let route = useRoute();
let router = useRouter();
let lessonId = route.params.id;
let homeworkParams = ref({
  limit:"5",
  disciplineId:"",
  checked:[],
});
function getHomeworks(){
  store.dispatch("getHomeworks",{lessonId:lessonId,usePreloader:true});
}
getHomeworks();
function toHomeworkView(homework){
  store.commit("setCurrentHomework",homework);
  // localStorage.setItem('homeworkLink', homework.homework_media);
  router.push({
    name: 'LessonHomeworkView',
    params:{
      id:homework.id,
      lessonId:homework.lesson_data[0].id
    }
  });
}
// let search = computed(() => store.state.teacherLessons.lessons.search);

// function updateSearch (e) {
//   store.commit('updateLessonSearch', e.target.value);
//   getDisciplinesLessons(null,false);
// }
//
// watch(
//   () => userFilterParams.value.role,
//   (newVal, oldVal) => {
//     console.log(userFilterParams.value.role)
//   }
// )
// getDisciplinesLessons();
// async function getDisciplinesLessons(disciplineId = null, preloader = true){
//   if (preloader){
//     store.commit("setLoading", true);
//   }
//   let response;
//   try {
//     response = await store.dispatch("getDisciplinesTeacher");
//   }catch (e){
//     return
//   }
//   if (disciplineId === null){
//     disciplineId = response.data.data[0].id;
//     lessonsParams.value.disciplineId = `${disciplineId}`
//   }
//   store.dispatch("getLessons",{disciplineId:disciplineId,usePreloader:preloader});
// }
// // function getUsers(preloader = true){
// //   store.dispatch("getUsers",{limit: userFilterParams.value.limit,role:userFilterParams.value.role,usePreloader:preloader});
// // }
// // getUsers();
// function deleteLesson(lesson) {
//   if (
//     confirm(
//       `Вы уверены, что хотите безвозвратно удалить урок ${lesson.title}?`
//     )
//   ) {
//     store.dispatch("deleteLesson", lesson.id).then(() => {
//       getDisciplinesLessons();
//       store.commit("notify", {
//         type: "success",
//         message: "Урок успешно удалён" ,
//       },{root:true});
//     });
//   }
// }
// function deleteLessons(lessons) {
//   if (
//     confirm(
//       `Вы уверены, что хотите безвозвратно удалить уроки ?`
//     )
//   ) {
//     store.dispatch("deleteLessons", lessons).then(() => {
//       getDisciplinesLessons();
//       store.commit("notify", {
//         type: "success",
//         message: "Уроки успешно удалены" ,
//       },{root:true});
//     });
//   }
//   lessonsParams.value.checked = []
//
// }
// function getForPage(ev, link) {
//   ev.preventDefault();
//   if (!link.url || link.active) {
//     return;
//   }
//   let linkUrl = link.url + `&discipline_id=${lessonsParams.value.disciplineId}`;
//   // if (search.value !== ''){
//   //   linkUrl += `&q=${search.value}`;
//   // }
//   if (lessonsParams.value.limit !== '5'){
//     linkUrl += `&limit=${lessonsParams.value.limit}`;
//   }
//   store.dispatch("getLessons", { url:linkUrl});
// }

</script>

<style scoped>

</style>
