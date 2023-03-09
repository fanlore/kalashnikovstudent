

<template>
  <div v-click-outside="onClickOutside" class="z-20 h-screen -translate-x-[120%] md:translate-x-0 fixed md:sticky top-0 bg-white md:h-screen shadow-md flex flex-col transition-all duration-700"  :style="{width:sidebarWidth,  transform:`translateX(${isMoreWindowsWidth && firstWindowWidth > 768 ? 0 : sidebarTranslate})`}">
      <div>
       <div class="px-6 pt-8">
          <div class="flex items-center justify-between relative">
            <a
              href="#"
              class=""
            >
              <img src="../../assets/logo.svg" alt="Логотип образовательной платформы.">
            </a>
            <button
              class="flex items-center justify-center p-0.5 rounded bg-indigo-100 focus:outline-none focus:ring-1 focus:ring-indigo-500 w-6 h-6 absolute right-0 transition-all duration-500"
              :class="{ 'rotate-180	-right-9' : collapsed }"
              @click="toggleSidebarOnSize"
            >
              <svg
                class="w-3 h-3 text-indigo-500 stroke-current"
                fill="none"
                viewBox="0 0 24 24"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M10.25 6.75L4.75 12L10.25 17.25"
                ></path>
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M19.25 12H5"
                ></path>
              </svg>
            </button>
          </div>
        </div>
        <div class="px-6 pt-4">
          <hr class="border-gray-100" />
        </div>
        <div class="px-6 pt-4">
          <ul class="flex flex-col space-y-2">
             <li class="relative text-gray-500 hover:text-white focus-within:text-white ">
               <SidebarLink to="/dashboard" class="top-link">
                  <template v-slot:icon>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                    </svg>
                  </template>
                  <template v-slot:text>Главная</template>
              </SidebarLink>
            </li>

<!--            <li class="relative text-gray-500 hover:text-white focus-within:text-white">-->
<!--                <SidebarLink  to="/phe" class="top-link">-->
<!--                  <template v-slot:icon>-->
<!--                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">-->
<!--                      <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />-->
<!--                    </svg>-->
<!--                  </template>-->
<!--                  <template v-slot:text>Мой класс</template>-->
<!--              </SidebarLink>-->
<!--            </li>-->

<!--            <li class="relative text-gray-500 hover:text-white focus-within:text-white">-->
<!--              <SidebarLink to="/profile" class="top-link">-->
<!--                <template v-slot:icon>-->
<!--                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">-->
<!--                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />-->
<!--                  </svg>-->
<!--                </template>-->
<!--                <template v-slot:text>Мой профиль</template>-->
<!--              </SidebarLink>-->
<!--            </li>-->
          </ul>
        </div>

      <div v-if="userData && userData.role === 'Teacher' || userData && userData.role === 'Admin'">
        <div class="px-4 pt-6 overflow-hidden" >
          <hr v-if="collapsed" class="border-gray-100" />
          <p v-if="!collapsed" class="text-xs text-gray-300 font-bold uppercase whitespace-nowrap">Панель преподавателя</p>
        </div>
        <div class="px-6 pt-1">
          <ul>
            <li class="relative text-gray-500 hover:text-white focus-within:text-white mb-2">
              <SidebarLink to="/teacher/lessons" class="top-link">
                <template v-slot:icon>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                  </svg>
                </template>
                <template v-slot:text>Уроки</template>
              </SidebarLink>
            </li>
          </ul>
        </div>
      </div>

        <div class="px-4 pt-2 overflow-hidden" v-if="userData && userData.role === 'Admin'">
          <hr v-if="collapsed" class="border-gray-100" />
          <p v-if="!collapsed" class="text-xs text-gray-300 font-bold uppercase whitespace-nowrap">Админ-панель</p>
        </div>
        <div class="px-6 pt-1 pb-8">
          <ul>
            <li class="relative text-gray-500 hover:text-white focus-within:text-white mb-2" v-if="userData && userData.role === 'Admin'">
              <SidebarLink to="/admin/users" class="top-link">
                <template v-slot:icon>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                </svg>

                </template>
                <template v-slot:text>Пользователи</template>
              </SidebarLink>
            </li>
            <li class="relative text-gray-500 hover:text-white focus-within:text-white mb-2" v-if="userData && userData.role === 'Admin'">
              <SidebarLink to="/admin/disciplines" class="top-link">
                <template v-slot:icon>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                  </svg>
                </template>
                <template v-slot:text>Дисциплины</template>
              </SidebarLink>
            </li>
            <li class="relative text-gray-500 hover:text-white focus-within:text-white mb-2" v-if="userData && userData.role === 'Admin'">
              <SidebarLink to="/admin/groups" class="top-link">
                <template v-slot:icon>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6.878V6a2.25 2.25 0 012.25-2.25h7.5A2.25 2.25 0 0118 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 004.5 9v.878m13.5-3A2.25 2.25 0 0119.5 9v.878m0 0a2.246 2.246 0 00-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0121 12v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6c0-.98.626-1.813 1.5-2.122" />
                  </svg>
                </template>
                <template v-slot:text>Группы</template>
              </SidebarLink>
            </li>
            <li class="relative text-gray-500 hover:text-white focus-within:text-white group">
                <a
                href="#"
                class="flex items-center w-full py-2 pl-2 pr-2 text-sm font-bold  rounded bg-red-50 hover:bg-red-100 text-[#C7302B] focus:outline-none focus:ring-1 focus:ring-red-500 focus:bg-red-100 h-9 transition-all duration-500 overflow-hidden"
                :class="{'pl-[14px]': collapsed}"
                @click.prevent="logout"
                >
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                  </svg>
                </span>
                <span class="pl-2 whitespace-nowrap  transition-spacing" :class="{'pl-5' : collapsed}">
                  Выйти
                </span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>

</template>

<style>
  .top-link a:focus svg {
    stroke: #6366f1;
  }
  .top-link a:focus span {
    color: #6366f1;
  }
</style>

<script>
    import {collapsed, toggleSidebar, sidebarWidth, sidebarTranslate, toggleSidebarMobile} from './state'
    import SidebarLink from './SidebarLink.vue';
    import { useRouter } from 'vue-router';
    import store from '../../store';


    export default {
        name: "Sidebar",
        components:{SidebarLink},
        data(){
          return{
            isMoreWindowsWidth:true,
            firstWindowWidth:window.innerWidth,
          }
        },
        computed:{
            // styleTransform(){
            //   // this.isMoreWindowsWidth ? '' : transform:`translateX(${sidebarTranslate})`
            //
            // }
        },
        methods:{
          toggleSidebarOnSize(){
            console.log('asd')
            if (window.innerWidth > 768) {
              toggleSidebar();
              toggleSidebarMobile();
            } else {
              toggleSidebarMobile();
              toggleSidebar();
              console.log('els')
            }
          },
          onClickOutside (event) {

            console.log('Clicked outside. Event: ', event)
          },
          myEventHandler(e) {
            if (window.innerWidth > 768) {
              this.isMoreWindowsWidth = true;
              this.firstWindowWidth = 770;
            } else {
              this.isMoreWindowsWidth = false;
              this.firstWindowWidth = 700;
            }
          }
        },
        mounted() {
          window.addEventListener("resize", this.myEventHandler);
        },
        unmounted() {
          window.removeEventListener("resize", this.myEventHandler);
        },
        setup(){
          const router = useRouter();

          function logout(){
            store.dispatch('logout')
              .then(() => {
                router.push({
                name: 'Login'
              });
            });


          }

          return { collapsed, toggleSidebar, sidebarWidth, sidebarTranslate, toggleSidebarMobile, logout }
        },
        props: {
          userData:Object,
        },
    }
</script>
