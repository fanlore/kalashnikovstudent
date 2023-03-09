<template>
    <div :class="'relative grid grid-cols-[1fr_1fr] md:grid-cols-[min-content_1fr_1fr] grid-rows-[80px_1fr] h-full w-full'">
      <Sidebar :userData="user" :class="'md:row-start-1 md:row-end-3 z-10'"></Sidebar>
      <Header :userData="user" :class="'col-start-1 col-end-3 md:col-start-2 md:col-end-4'"></Header>
      <router-view :userData="user" class="p-8 sm:pt-6 md:pt-8 " :class="'col-start-1 col-end-3 md:col-start-2 md:col-end-4 md:row-start-2 md:row-end-3'">

      </router-view>
    </div>

</template>
<script>
    import Sidebar from './sidebar/Sidebar.vue';
    import Preloader from './Preloader.vue';
    import Header from './header/Header.vue';
    import {useStore} from 'vuex';
    import {computed} from 'vue';
    // import {useDark, useToggle} from '@vueuse/core';
    import { mapGetters } from "vuex";
    export default {
        name: "DefaultLayout",
        components:{
          Sidebar,
          Preloader,
          Header
        },
        data(){
          return {
            // isDark: useDark(),
          }
        },
        setup() {
            const store = useStore();
            store.dispatch("getUser");

            return {
                user: computed(() => store.state.user.data)
            }
        },
        beforeMount() {
          this.$store.dispatch("initTheme");
        },
        computed: {
          ...mapGetters({ theme: "getTheme" }),
        },
        watch: {
          theme(newTheme, oldTheme) {
            newTheme === "light"
              ? document.querySelector("html").classList.remove("dark")
              : document.querySelector("html").classList.add("dark");
          }
        }
    }

</script>


