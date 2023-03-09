<template>
  <div class="z-10 sticky relative top-[20px] ml-8 mt-5 mr-8 after:content-[''] after:absolute after:w-full after:top-[-20px] after:-z-10 after:bg-[#f4f5f9] after:opacity-90 after:h-[25px]">
    <header class="rounded-md inset-x-0 flex flex-wrap sm:justify-start sm:flex-nowrap bg-white text-sm py-2.5 sm:py-4 lg:pl-64 dark:bg-gray-800 shadow-md overflow-hidden">
    <nav class="flex basis-full items-center w-full mx-auto px-4 sm:px-6 md:px-8" aria-label="Global">
      <div class="w-full flex items-center justify-between md:justify-end ml-auto ">
        <button class="p-1 -ml-1 mr-5 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple" @click="toggleSidebarOnSize" aria-label="Menu">
          <svg class="w-6 h-6 " aria-hidden="true" fill="#6366f1" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
          </svg>
        </button>
        <div class="flex flex-row items-center justify-end gap-2">
          <div>
            <button @click="toggleTheme" class="rounded-md focus:outline-none focus:shadow-outline-purple">
              <svg class="w-5 h-5" aria-hidden="true" fill="#6366f1" viewBox="0 0 20 20" v-if="theme.theme === 'light'">
                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
              </svg>
              <svg class="w-5 h-5" aria-hidden="true" fill="#6366f1" viewBox="0 0 20 20" v-if="theme.theme === 'dark'">
                <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
              </svg>
            </button>
          </div>
          <div class="flex flex-col pl-3">
            <div class="text-sm font-bold whitespace-nowrap text-gray-500" v-if="userData">{{ userData.name + ' ' + userData.surname }}</div>
            <span class="text-indigo-500 text-center rounded-full text-[10px] self-end font-semibold" v-if="userData && userData.role === 'Student'">Студент</span>
            <span class="text-red-400 text-center rounded-full text-xs self-end font-semibold" v-if="userData && userData.role === 'Admin'">Администратор</span>
            <span class="text-purple-500 text-left rounded-full text-xs self-end font-semibold" v-if="userData && userData.role === 'Teacher'">Преподаватель</span>
          </div>
          <div class="hs-dropdown relative inline-flex" data-hs-dropdown-placement="bottom-right">
            <button id="hs-dropdown-with-header" type="button" class="hs-dropdown-toggle inline-flex flex-shrink-0 justify-center items-center gap-2 h-[2.375rem] w-[2.375rem] rounded-full font-medium bg-white text-gray-700 align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-xs dark:bg-gray-800 dark:hover:bg-slate-800 dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800 relative">
                <img
                  class="rounded-full w-full h-full object-cover"
                  :src="userData.avatar ? userData.avatar :`https://eu.ui-avatars.com/api/?name=${userData.name}+${userData.surname}` "
                  alt="Аватар"
                  v-if="userData"
                />
              <span class="flex h-2.5 w-2.5 absolute left-[28px] bottom-0">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-green-500"></span>
              </span>
            </button>

            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-[15rem] bg-white shadow-md rounded-lg p-2 dark:bg-gray-800 dark:border dark:border-gray-400" aria-labelledby="hs-dropdown-with-header">
              <div class="py-3 px-5 -m-2 bg-gray-100 rounded-t-lg dark:bg-gray-700">
                <p class="text-sm text-gray-500 dark:text-gray-400">Авторизован</p>
                <p class="text-sm font-medium text-gray-800 dark:text-gray-300" v-if="userData">{{ userData.email }}</p>
              </div>
              <div class="mt-2 py-2 first:pt-0 last:pb-0">
               <router-link to="/profile">
                 <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-indigo-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="#">
                   <svg class="w-4 h-4" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                     <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                     <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                   </svg>
                   Настройки
                 </a>
               </router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>
  </div>
</template>

<script>
import { collapsed, toggleSidebar, sidebarWidth, toggleSidebarMobile } from '../sidebar/state'
import { useRouter } from 'vue-router';
import {useStore} from "vuex";
import {computed} from "vue";

export default {

  name: "Header",
  props: {
    userData:Object,
  },
  data(){
    return {
    }
  },

  methods: {
    toggleSidebarOnSize() {
      if (window.innerWidth > 768) {
        toggleSidebar();
        toggleSidebarMobile();
      } else {
        toggleSidebar();
        toggleSidebarMobile();
      }
    },
    toggleTheme() {
      this.$store.dispatch("toggleTheme");
    },
  },
  setup(){
      const store = useStore();

      return {
        collapsed,
        toggleSidebar,
        sidebarWidth,
        toggleSidebarMobile,
        theme: computed(() => store.state.theme)
      }
  }

}
</script>

<style scoped>

</style>
