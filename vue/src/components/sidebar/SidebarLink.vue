

<template>
  <div>
    <div v-if="isActive" class=" after:w-1 ml-3 after:bg-indigo-500 after:h-6 after:rounded-lg after:absolute after:contents-[] after:-left-2 after:top-2/4 after:-translate-y-2/4"></div>
      <router-link :to="to" class="flex items-center w-full py-2 pl-2 pr-2 text-sm font-bold rounded  hover:text-indigo-500 hover:bg-indigo-50 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:bg-indigo-100 transition-translate h-10 duration-500 overflow-hidden"
      :class="{'pl-[14px]':collapsed, 'bg-indigo-50 text-indigo-500 hover:bg-indigo-200' : isActive, 'text-gray-400' : !isActive }"
      >
        <span class="icon stroke-gray-500 group-hover:stroke-indigo-500 group-focus:stroke-indigo-500 ">
          <slot name="icon"></slot>
        </span>
        <span  class="pl-2 whitespace-nowrap  transition-spacing" :class="{'pl-5' : collapsed}">
          <slot name="text"></slot>
        </span>
      </router-link>
  </div>
</template>

<script>
    import { collapsed } from './state'
    import { useRoute } from 'vue-router'
    import { computed } from '@vue/runtime-core';
    export default {
        name: "SidebarLink",
        props:{
          to:{type:String, required:true}
        },
        setup(props){
          const route = useRoute();
          const isActive = computed(() => route.path === props.to);
          return {isActive, collapsed}
        },
        data(){
          return {
            // collapsed,
            // isIcon:''
          }
        },
        // watch:{
        //   collapsed(){
        //     console.log(this.doIcon());
        //   }
        // },
        // methods:{
        //   async doIcon(fn){
        //     let promise = new Promise((resolve, reject) => {
        //       setTimeout(() => resolve("mx-auto"), 2000)
        //     });

        //     let result = await promise; // будет ждать, пока промис не выполнится (*)
        //       this.isIcon = result;
        //   }
        // }

    }
</script>
