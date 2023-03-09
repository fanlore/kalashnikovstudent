<template>
  <div>

    <div class="flex justify-center items-center w-full"  v-bind="getRootProps()">
      <div class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
        <div class="flex flex-col justify-center items-center pt-5 pb-6">
          <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
          <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Кликните</span> или перетащите, чтобы загрузить</p>
          <p class="text-xs text-gray-500 dark:text-gray-400">ZIP, RAR (Макс. 50МБ)</p>
        </div>
        <input v-bind="getInputProps()">
      </div>
    </div>
  </div>
</template>
<script setup>
import { useDropzone } from "vue3-dropzone";
import axiosClient from "../axios";
import store from "../store";
import { ref, defineProps} from "vue";

function onDrop(acceptFiles, rejectReasons) {
  console.log(acceptFiles);
  console.log(rejectReasons);
}
function onDropAccepted(acceptFiles){
  store.commit("notify", {
    type: "warning",
    message: "Загружаем",
  });

  const formData = new FormData();
  formData.append('homework_media',acceptFiles[0])
  axiosClient.post(`/student/homework/store?homework_id=${props.homeworkId}`,formData).then((res)=> {
    store.dispatch("getStudentHomework",{id:props.homeworkId, usePreloader:true})
  }).then(()=> {
    store.commit("notify", {
      type: "success",
      message: "Отправили",
    });
  })

}

const { getRootProps, getInputProps, ...rest } = useDropzone({ onDrop,onDropAccepted,maxFiles:1,maxSize:52428800,accept:['.rar','.zip']});

const props = defineProps({
  homeworkId: Object
})

</script>

<!--<template>-->
<!--  <div>-->

<!--    <div ref="dropzone" class="dropzone custom-dropzone">-->

<!--    </div>-->
<!--    <div class="py-2 text-left"><button @click.prevent="store" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-xs font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Добавить</button></div>-->
<!--  </div>-->
<!--</template>-->

<!--<script>-->
<!--import { Dropzone } from 'dropzone'-->
<!--import axiosClient from "../axios";-->
<!--export default {-->
<!--  name: 'Dropzone',-->
<!--  data() {-->
<!--    return {-->
<!--      dropzone: null,-->
<!--    }-->
<!--  },-->
<!--  methods: {-->
<!--    store(){-->
<!--      console.log(this.dropzone.getAcceptedFiles())-->
<!--      const formData = new FormData();-->
<!--      formData.append('file',this.dropzone.getAcceptedFiles()[0])-->
<!--      axiosClient.post('/teacher/lesson/storeFiles',formData)-->
<!--    }-->
<!--  },-->
<!--  mounted() {-->
<!--    this.dropzone = new Dropzone(this.$refs.dropzone, {-->
<!--      url: 'dfa',-->
<!--      autoProcessQueue: false,-->
<!--      maxFiles:1-->

<!--    })-->
<!--  }-->

<!--}-->
<!--</script>-->

<!--<style scoped>-->
<!--.custom-dropzone {-->
<!--  border-style: dashed;-->
<!--  border-width: 3px;-->
<!--  padding: 20px;-->
<!--}-->

<!--.preview-container {-->
<!--  border: none;-->
<!--}-->

<!--</style>-->
