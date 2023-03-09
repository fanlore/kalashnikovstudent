
<template>
  <div class="w-full overflow-hidden shadow-xs">

    <!--    &lt;!&ndash;Modal&ndash;&gt;-->
<!--    <div id="group-delete-modal" class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">-->
<!--      <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">-->
<!--        <div class="flex flex-col bg-white px-8 border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">-->
<!--          <div class="flex justify-between items-center py-3 px-4  dark:border-gray-700">-->
<!--            <button type="button" class="hs-dropdown-toggle inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-sm dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800" data-hs-overlay="#group-delete-modal">-->
<!--              <span class="sr-only">Закрыть</span>-->
<!--              <svg class="w-3.5 h-3.5" width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--                <path d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z" fill="currentColor"/>-->
<!--              </svg>-->
<!--            </button>-->
<!--          </div>-->
<!--          <div class="d-block m-auto">-->
<!--            <svg xmlns="http://www.w3.org/2000/svg" width="97" height="96" viewBox="0 0 97 96" fill="none">-->
<!--              <g clip-path="url(#clip0_312_1895)">-->
<!--                <circle opacity="0.12" cx="48.5" cy="48.0001" r="48" fill="#FFD912"/>-->
<!--                <path fill-rule="evenodd" clip-rule="evenodd" d="M48.5 30.0001C46.8431 30.0001 45.5 31.3432 45.5 33.0001V55.0001C45.5 56.6569 46.8431 58.0001 48.5 58.0001C50.1569 58.0001 51.5 56.6569 51.5 55.0001V33.0001C51.5 31.3432 50.1569 30.0001 48.5 30.0001ZM48.5 66.0001C46.8431 66.0001 45.5 64.6569 45.5 63.0001C45.5 61.3432 46.8431 60.0001 48.5 60.0001C50.1569 60.0001 51.5 61.3432 51.5 63.0001C51.5 64.6569 50.1569 66.0001 48.5 66.0001Z" fill="#FFD912"/>-->
<!--              </g>-->
<!--              <defs>-->
<!--                <clipPath id="clip0_312_1895">-->
<!--                  <rect width="96" height="96" fill="white" transform="translate(0.5 9.15527e-05)"/>-->
<!--                </clipPath>-->
<!--              </defs>-->
<!--            </svg>-->
<!--          </div>-->
<!--          <div class="p-4 overflow-y-auto">-->
<!--            <h3 class="font-bold text-gray-800 dark:text-white text-center">-->
<!--              Безвозвратно удалить пользователя ?-->
<!--            </h3>-->
<!--          </div>-->
<!--          <div class="flex justify-end items-center gap-x-2 py-3 px-4 dark:border-gray-700">-->
<!--            <button type="button" class="hs-dropdown-toggle py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-gray-800 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800" data-hs-overlay="#hs-vertically-centered-modal">-->
<!--              Отменить-->
<!--            </button>-->
<!--            <a  @click.prevent="deletegroup(group)" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-indigo-500 text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800" href="#">-->
<!--              Удалить-->
<!--            </a>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->

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

      <li class="text-sm font-semibold text-gray-800 truncate dark:text-gray-200" aria-current="page">
        Дисциплины
      </li>
    </ol>
    <div class="shadow-md ">
      <div class="py-3 px-4 bg-white rounded-t-md flex justify-between items-center dark:bg-gray-800">
      <div class="flex flex-wrap">
<!--        <div class="flex flex-col mr-2">-->
<!--          <label for="hs-select-label" class="block text-left text-sm font-medium mb-2 dark:text-white">По группе</label>-->
<!--          <select v-model="disciplineFilterParams.groupNumber" @change="getDisciplines" id="hs-select-label" class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">-->
<!--            <option value="All">Все</option>-->
<!--            <option :value="group.group_number" v-for="group in disciplines" :key="group.id">{{ group.group_number }}</option>-->
<!--          </select>-->
<!--        </div>-->

<!--        <div class="flex flex-col mr-2">-->
<!--          <label for="hs-select-label" class="block text-left text-sm font-medium mb-2 dark:text-white">По ролям</label>-->
<!--          <select v-model="disciplineFilterParams.role" @change="getDisciplines" id="hs-select-label" class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">-->
<!--            <option value="All">Все</option>-->
<!--            <option value="Admin">Администратор</option>-->
<!--            <option value="Teacher">Преподаватель</option>-->
<!--            <option value="Student">Студент</option>-->
<!--          </select>-->
<!--        </div>-->

        <div class="relative max-w-xs self-end mr-3 ">
          <label for="hs-table-with-pagination-search" class="sr-only">Поиск</label>
          <input type="text" name="hs-table-with-pagination-search" id="hs-table-with-pagination-search" class="p-3 pl-10 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" placeholder="Поиск" :value="search" @input="updateSearch">
          <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none pl-4">
            <svg class="h-3.5 w-3.5 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
            </svg>
          </div>
        </div>

        <div class="hs-dropdown self-end relative inline-flex" v-if="disciplineFilterParams.checked.length > 0">
          <button id="hs-dropdown-with-icons" type="button" class="hs-dropdown-toggle py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-gray-800 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
            Выделено {{ disciplineFilterParams.checked.length }}
            <svg class="hs-dropdown-open:rotate-180 w-2.5 h-2.5 text-gray-600" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
          </button>

          <div class="hs-dropdown-menu z-50 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden mt-2 min-w-[15rem] bg-white shadow-md rounded-lg p-2 mt-2 divide-y divide-gray-200 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700" aria-labelledby="hs-dropdown-with-icons">
            <div class="py-2 first:pt-0 last:pb-0">
              <a @click.prevent="deleteDisciplines(disciplineFilterParams.checked)" data-hs-overlay="#group-delete-modal"  class="flex items-center gap-x-3 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
                Удалить
              </a>
            </div>
          </div>
        </div>

      </div>


        <div class="hs-tooltip inline-block [--placement:left]">
          <router-link to="/admin/disciplines/create"><button type="button" class="hs-tooltip-toggle py-2 px-2 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-indigo-500 text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all text-xs dark:focus:ring-offset-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-md shadow-sm dark:bg-slate-700" role="tooltip">
            Добавить дисциплину
          </span>
          </button>
          </router-link>
        </div>

      </div>
      <div class="w-full overflow-x-auto ">
        <table class="w-full whitespace-no-wrap">
          <thead>
          <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <th scope="col" class="py-3 px-4 pr-0">
              <div class="flex items-center h-5">

                <input v-model="disciplineFilterParams.selectPage" @change="selectPage(disciplines)" id="hs-table-pagination-checkbox-all" type="checkbox" class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                <label for="hs-table-pagination-checkbox-all" class="sr-only">Checkbox</label>
              </div>
            </th>
            <th scope="col" class="px-4 py-3 text-left">Дисциплина</th>
            <th scope="col" class="px-4 py-3 text-left">Преподаватель</th>
            <th scope="col" class="px-4 py-3 text-left">Группа</th>
            <th scope="col" class="px-4 py-3 text-left">Действие</th>
          </tr>
          </thead>

          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            <tr class="text-gray-700 dark:text-gray-400" v-if="disciplines" v-for="discipline in disciplines" :key="discipline.id">
              <td class="py-3  animate-fade-in-down pl-4">
                <div class="flex items-center h-5">
                  <input :id="discipline.id" :value="discipline.id" v-model="disciplineFilterParams.checked" type="checkbox" class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                  <label :for="discipline.id" class="sr-only">Checkbox</label>
                </div>
              </td>
              <td class="px-4  animate-fade-in-down py-3 text-xs font-semibold">
                {{ discipline.name}}
              </td>
              <td class="px-4  animate-fade-in-down py-3 text-xs font-semibold">
                {{ discipline.teacher }}
              </td>
              <td class="px-4  animate-fade-in-down py-3 text-xs font-semibold">
                {{ discipline.group }}
              </td>
              <td class="px-4 py-3 text-sm">
                <div class="hs-dropdown relative inline-flex">
                  <button id="hs-dropdown-custom-icon-trigger" type="button" class="hs-dropdown-toggle p-2 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-gray-800 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                  </button>
                  <div class="z-50 hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden mt-2 min-w-[15rem] bg-white shadow-md rounded-lg p-2 mt-2 dark:bg-gray-800 dark:border dark:border-gray-700" aria-labelledby="hs-dropdown-custom-icon-trigger">
                    <router-link :to="{name:'DisciplinesView', params:{ id:discipline.id }}">
                      <a class="flex items-center gap-x-3 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                        Отредактировать
                      </a>
                    </router-link>
                    <a @click.prevent="deleteDiscipline(discipline)" v-if="discipline.id" data-hs-overlay="#group-delete-modal"  class="flex items-center gap-x-3 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="#">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                      </svg>
                      Удалить
                    </a>
                  </div>
                </div>
              </td>
            </tr >

          </tbody>
        </table>

        <h2 v-if="!disciplines.length" class="p-5 ">По вашему запросу ничего не найдено</h2>
      </div>
      <div class="rounded-b-md flex flex-wrap items-center justify-between px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
        <div class="flex flex-wrap">
          <span class="flex items-center col-span-3" v-if="disciplinesMeta">
          Выведено {{ disciplines.length }} из {{ disciplinesMeta.total }}
        </span>
          <select @change="getDisciplines" v-model="disciplineFilterParams.limit" id="hs-select-label" class="ml-2 py-3 px-4 pr-9 block border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
            <option selected value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="30">30</option>
          </select>
        </div>

        <!-- Pagination -->
        <span class="flex col-span-4 sm:justify-end items-center" v-if="disciplinesMeta">
                  <nav aria-label="Table navigation">
                    <ul class="inline-flex items-center">

                      <li v-for="(link, i) of disciplinesMeta.links" :key="i" >
                        <button
                              @click="getForPage($event, link)"
                              :class="[
                              link.active
                                ? 'px-3 py-1 text-white transition-colors duration-150 bg-indigo-600 border border-r-0 border-indigo-600 rounded-md focus:outline-none focus:shadow-outline-purple'
                                : 'px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple',
                            ]">
                          <div v-if="disciplinesMeta.links[0].label === link.label">
                            <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                          </div>
                          <div v-else-if="disciplinesMeta.links[disciplinesMeta.links.length - 1].label === link.label">
                             <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                              <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                            </svg>
                          </div>
                          <div v-else>
                            {{  link.label }}
                          </div>
                        </button>
                      </li>
                      <li>
                        <button class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next">

                        </button>
                      </li>
                    </ul>
                  </nav>
                </span>
      </div>
    </div>
  </div>

</template>

<script setup>
import Preloader from "./../../../components/Preloader.vue";
import { useRouter } from 'vue-router';
import {computed, ref, watch} from "vue";
import {useStore} from "vuex";
const store = useStore();
const disciplines = computed(() => store.state.disciplines.disciplines.data);
const disciplinesMeta = computed(() => store.state.disciplines.disciplines.meta);
let disciplineFilterParams = ref({
  limit:"5",
  checked:[],
  selectPage:false,
});

function selectPage(disciplines){
  if (disciplineFilterParams.value.selectPage){
    disciplines.forEach(discipline => {
      if (!disciplineFilterParams.value.checked.includes(discipline.id)){
        disciplineFilterParams.value.checked.push(discipline.id);
      }
    })
  }else {
    disciplineFilterParams.value.checked = [];
  }
}
let search = computed(() => store.state.disciplines.disciplines.search);

function updateSearch (e) {
  store.commit('disciplinesSearch', e.target.value);
  getDisciplines(false);
}


// watch(
//   () => disciplineFilterParams.value.role,
//   (newVal, oldVal) => {
//     console.log(disciplineFilterParams.value.role)
//   }
// )

function getDisciplines(preloader = true, notifyMessage){
  store.dispatch("getDisciplines",{limit: disciplineFilterParams.value.limit,usePreloader:preloader})
  if (notifyMessage){
    store.dispatch("getDisciplines",{limit: disciplineFilterParams.value.limit,usePreloader:preloader})
      .then(() => {
        store.commit("notify", {
          type: "success",
          message: notifyMessage,
        },{root:true});
      });
  }
  store.dispatch("getDisciplines");
}
getDisciplines();

function deleteDiscipline(discipline) {
  if (
    confirm(
      `Вы уверены, что хотите безвозвратно удалить дисциплину ${discipline.name}?`
    )
  ) {
    store.dispatch("deleteDisciplines", discipline.id).then(() => {
      getDisciplines(true,"Предмет успешно удалён");
    });
  }
}

function deleteDisciplines(disciplines) {
  if (
    confirm(
      `Вы уверены, что хотите безвозвратно удалить предметы ?`
    )
  ) {
    store.dispatch("deleteDisciplines", disciplines).then(() => {
      getDisciplines(true,"Предметы успешно удалены")
    });
  }
  disciplineFilterParams.value.checked = []
}
function getForPage(ev, link) {
  ev.preventDefault();
  if (!link.url || link.active) {
    return;
  }
  let linkUrl = link.url;
  if (search.value !== ''){
    linkUrl += `&q=${search.value}`;
  }
  if (disciplineFilterParams.value.limit){
    linkUrl += `&limit=${disciplineFilterParams.value.limit}`;
  }
  store.dispatch("getDisciplines", { url:linkUrl});
}

</script>

<style scoped>

</style>
