
<template>
  <div class="w-full overflow-hidden shadow-xs">

    <!--    &lt;!&ndash;Modal&ndash;&gt;-->
<!--    <div id="user-delete-modal" class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">-->
<!--      <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">-->
<!--        <div class="flex flex-col bg-white px-8 border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">-->
<!--          <div class="flex justify-between items-center py-3 px-4  dark:border-gray-700">-->
<!--            <button type="button" class="hs-dropdown-toggle inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-sm dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800" data-hs-overlay="#user-delete-modal">-->
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
<!--            <a  @click.prevent="deleteUser(user)" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-indigo-500 text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800" href="#">-->
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
        Уроки
      </li>
    </ol>
    <div class="shadow-md ">
      <div class="py-3 px-4 bg-white rounded-t-md flex justify-between items-center dark:bg-gray-800">
      <div class="flex flex-wrap">
        <div class="flex flex-col mr-2">
          <label for="hs-select-label" class="block text-left text-sm font-medium mb-2 dark:text-white">Дисциплина</label>
          <select  v-model="lessonsParams.disciplineId" @change="getDisciplinesLessons(lessonsParams.disciplineId)" id="hs-select-label" class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
            <option v-for="discipline in disciplinesTeacher" :key="discipline.id" :value="discipline.id">{{ discipline.name }}</option>
          </select>
        </div>

        <div class="relative max-w-xs self-end mr-3 ">
          <label for="hs-table-with-pagination-search" class="sr-only">Поиск</label>
          <input type="text" name="hs-table-with-pagination-search" id="hs-table-with-pagination-search" class="p-3 pl-10 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" placeholder="Поиск" :value="search" @input="updateSearch">
          <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none pl-4">
            <svg class="h-3.5 w-3.5 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
            </svg>
          </div>
        </div>

        <div class="hs-dropdown self-end relative inline-flex" v-if="lessonsParams.checked.length > 0">
          <button id="hs-dropdown-with-icons" type="button" class="hs-dropdown-toggle py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-gray-800 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
            Выделено {{ lessonsParams.checked.length }}
            <svg class="hs-dropdown-open:rotate-180 w-2.5 h-2.5 text-gray-600" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
          </button>

          <div class="hs-dropdown-menu z-50 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden mt-2 min-w-[15rem] bg-white shadow-md rounded-lg p-2 mt-2 divide-y divide-gray-200 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700" aria-labelledby="hs-dropdown-with-icons">
            <div class="py-2 first:pt-0 last:pb-0">
              <a @click.prevent="deleteLessons(lessonsParams.checked)" data-hs-overlay="#user-delete-modal"  class="flex items-center gap-x-3 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="#">
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
          <router-link :to="`/teacher/lessons/create/${lessonsParams.disciplineId}`"><button type="button" class="hs-tooltip-toggle py-2 px-2 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-indigo-500 text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all text-xs dark:focus:ring-offset-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-md shadow-sm dark:bg-slate-700" role="tooltip">
            Добавить урок
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
                <input id="hs-table-pagination-checkbox-all" type="checkbox" class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                <label for="hs-table-pagination-checkbox-all" class="sr-only">Checkbox</label>
              </div>
            </th>
            <th scope="col" class="px-4 py-3 text-left">#</th>
            <th scope="col" class="px-4 py-3 text-left">Тема</th>
            <th scope="col" class="px-4 py-3 text-left">Группа</th>
            <th scope="col" class="px-4 py-3 text-left">Тип урока</th>
            <th scope="col" class="px-4 py-3 text-left">Статус</th>
            <th scope="col" class="px-4 py-3 text-left">Действие</th>
          </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            <tr class="text-gray-700 dark:text-gray-400" v-for="lesson in lessons" v-if="lessons">
              <td class="py-3  animate-fade-in-down pl-4">
                <div class="flex items-center h-5">
                  <input :id="lesson.id" :value="lesson.id" v-model="lessonsParams.checked" type="checkbox" class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                  <label :for="lessons.id" class="sr-only">Checkbox</label>
                </div>
              </td>
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                  <div>
                    <p class="font-semibold">{{lesson.order_number}} </p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-sm font-semibold">
                {{lesson.title}}
              </td>

              <td class="px-4 py-3">
                <div class="flex items-center text-xs">
                  <div>
                    <p class="font-semibold">{{lesson.group}} </p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3">
                <div class="flex items-center text-xs">
                  <div>
                      <span class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full dark:bg-green-700 dark:text-green-100" v-if="lesson.destination === 'lection'">
                          Лекция
                      </span>
                      <span class="px-2 py-1 font-semibold leading-tight text-teal-700 bg-teal-100 rounded-full dark:bg-green-700 dark:text-green-100" v-if="lesson.destination === 'practice'">
                            Практика
                        </span>
                      <span class="px-2 py-1 font-semibold leading-tight text-pink-700 bg-pink-100 rounded-full dark:bg-green-700 dark:text-green-100" v-if="lesson.destination === 'test'">
                            Тест
                        </span>
                      <span class="px-2 py-1 font-semibold leading-tight text-rose-700 bg-rose-100 rounded-full dark:bg-green-700 dark:text-green-100" v-if="lesson.destination === 'exam'">
                            Экзамен
                        </span>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-xs">
                  <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100" v-if="lesson.is_available">
                    Доступен
                  </span>
                  <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-green-700 dark:text-green-100" v-else>
                    Недоступен
                  </span>
              </td>
              <td class="px-4 py-3 text-sm">
                <div class="hs-dropdown relative inline-flex">
                  <button id="hs-dropdown-custom-icon-trigger" type="button" class="hs-dropdown-toggle p-2 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-gray-800 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                  </button>

                  <div class="z-50 hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden mt-2 min-w-[15rem] bg-white shadow-md rounded-lg p-2 mt-2 dark:bg-gray-800 dark:border dark:border-gray-700" aria-labelledby="hs-dropdown-custom-icon-trigger">
                    <router-link :to="{name:'LessonHomeworks', params:{ id:lesson.id}}">
                      <a class="flex items-center gap-x-3 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                        </svg>
                        Домашние задания
                      </a>
                    </router-link>
                    <router-link :to="{name:'LessonsView', params:{ id:lesson.id}}">
                      <a class="flex items-center gap-x-3 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                        Отредактировать
                      </a>
                    </router-link>
                    <a @click.prevent="deleteLesson(lesson)"  data-hs-overlay="#user-delete-modal"  class="flex items-center gap-x-3 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="#">
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
        <h2 class="p-5" v-if="!lessons.length">По вашему запросу ничего не найдено</h2>
      </div>
      <div class="rounded-b-md flex flex-wrap items-center justify-between px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
        <div class="flex flex-wrap">
          <span class="flex items-center col-span-3">
          Выведено {{ lessons.length }} из {{ lessonsMeta.total }}
        </span>
          <select v-model="lessonsParams.limit" @change="getLessons" id="hs-select-label" class="ml-2 py-3 px-4 pr-9 block border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
            <option selected value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="30">30</option>
          </select>
        </div>
        <!-- Pagination -->
        <span class="flex col-span-4 sm:justify-end items-center">
                  <nav aria-label="Table navigation">
                    <ul class="inline-flex items-center">

                      <li v-for="(link, i) of lessonsMeta.links" :key="i" >
                        <button
                              @click="getForPage($event, link)"
                              :class="[
                              link.active
                                ? 'px-3 py-1 text-white transition-colors duration-150 bg-indigo-600 border border-r-0 border-indigo-600 rounded-md focus:outline-none focus:shadow-outline-purple'
                                : 'px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple',
                            ]">
                          <div v-if="lessonsMeta.links[0].label === link.label">
                            <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                          </div>
                          <div v-else-if="lessonsMeta.links[lessonsMeta.links.length - 1].label === link.label">
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
const lessons = computed(() => store.state.teacherLessons.lessons.data);
const lessonsMeta = computed(() => store.state.teacherLessons.lessons.meta);
const disciplinesTeacher = computed(() => store.state.teacherLessons.disciplinesTeacher);

let lessonsParams = ref({
  limit:"5",
  disciplineId:"",
  checked:[],
});
function getLessons(){
  store.dispatch("getLessons",{disciplineId:lessonsParams.value.disciplineId,limit: lessonsParams.value.limit});
}
let search = computed(() => store.state.teacherLessons.lessons.search);

function updateSearch (e) {
  store.commit('updateLessonSearch', e.target.value);
  getDisciplinesLessons(null,false);
}
//
// watch(
//   () => userFilterParams.value.role,
//   (newVal, oldVal) => {
//     console.log(userFilterParams.value.role)
//   }
// )
getDisciplinesLessons();
async function getDisciplinesLessons(disciplineId = null, preloader = true){
  if (preloader){
    store.commit("setLoading", true);
  }
  let response;
    try {
      response = await store.dispatch("getDisciplinesTeacher");
    }catch (e){
      return
    }
    if (disciplineId === null){
        disciplineId = response.data.data[0].id;
        lessonsParams.value.disciplineId = `${disciplineId}`
    }
    store.dispatch("getLessons",{disciplineId:disciplineId,usePreloader:preloader});
}
// function getUsers(preloader = true){
//   store.dispatch("getUsers",{limit: userFilterParams.value.limit,role:userFilterParams.value.role,usePreloader:preloader});
// }
// getUsers();
function deleteLesson(lesson) {
  if (
    confirm(
      `Вы уверены, что хотите безвозвратно удалить урок ${lesson.title}?`
    )
  ) {
    store.dispatch("deleteLesson", lesson.id).then(() => {
      getDisciplinesLessons();
      store.commit("notify", {
        type: "success",
        message: "Урок успешно удалён" ,
      },{root:true});
    });
  }
}
function deleteLessons(lessons) {
  if (
    confirm(
      `Вы уверены, что хотите безвозвратно удалить уроки ?`
    )
  ) {
    store.dispatch("deleteLessons", lessons).then(() => {
      getDisciplinesLessons();
      store.commit("notify", {
        type: "success",
        message: "Уроки успешно удалены" ,
      },{root:true});
    });
  }
  lessonsParams.value.checked = []

}
function getForPage(ev, link) {
  ev.preventDefault();
  if (!link.url || link.active) {
    return;
  }
  let linkUrl = link.url + `&discipline_id=${lessonsParams.value.disciplineId}`;
  // if (search.value !== ''){
  //   linkUrl += `&q=${search.value}`;
  // }
  if (lessonsParams.value.limit !== '5'){
    linkUrl += `&limit=${lessonsParams.value.limit}`;
  }
  store.dispatch("getLessons", { url:linkUrl});
}

</script>

<style scoped>

</style>
