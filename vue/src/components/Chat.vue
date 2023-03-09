<template>
  <div>
    <div class="flex-1 p:2 sm:p-6 justify-between flex flex-col h-screen">
      <div id="messages" class="flex flex-col space-y-4 p-3 overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch">
        <div class="chat-message" v-if="messages" v-for="message in messages" id="scrollTarget">
          <div class="flex items-end justify-end" v-if="user_id === message.user_id">
            <div class="flex flex-col space-y-2 text-sm max-w-xs mx-2 order-1 items-end">
              <div><span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-blue-600 text-white">{{message.messsage}}<br><span class="text-white text-right rounded-full text-[10px] self-end">{{message.created_at}}</span></span></div>
            </div>
            <img src="https://images.unsplash.com/photo-1590031905470-a1a1feacbb0b?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-6 h-6 rounded-full order-2">
          </div>
          <div class="flex items-end" v-else>
            <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
              <div><span class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600">{{message.messsage}}<br><span class="text-white text-right rounded-full text-[10px] self-end">{{message.created_at}}</span></span></div>
            </div>
            <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-6 h-6 rounded-full order-1">
          </div>
        </div >

      </div>
      <div class="pt-4 mb-2 sm:mb-0">
        <div class="relative flex">
          <input v-model="homeworkModel.currentMessage" type="text" placeholder="Напишите своё сообщение!" class="border-0 w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 bg-gray-200 rounded-md py-3">
          <div class="absolute right-0 items-center inset-y-0 hidden sm:flex">
            <button type="button" class="inline-flex items-center justify-center rounded-lg px-4 py-3 transition duration-500 ease-in-out text-white bg-blue-500 hover:bg-blue-400 focus:outline-none">
              <span class="font-bold" @click="addMessage(false, homework_id, homeworkModel.currentMessage)">Отправить</span>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6 ml-2 transform rotate-90">
                <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

</template>

<script setup>
import dropzone from "./Dropzone.vue";
import Preloader from "./Preloader.vue";
import { useRouter } from 'vue-router';
import {computed, ref, watch} from "vue";
import {useStore} from "vuex";
const store = useStore();
const homework_id = computed(() => store.state.studentLessons.currentLesson.data.homework_id);
const messages = computed(() => store.state.chats.messages);
const user_id = computed(() => store.state.user.data.id);

const homeworkModel = ref({
  currentMessage:"",
});
const props = defineProps({
  homeworkId: String
})

// watch(
//   () => userFilterParams.value.role,
//   (newVal, oldVal) => {
//     console.log(userFilterParams.value.role)
//   }
// )
// function scrollToBottom() {
//   this.$nextTick(() => {
//     targetRef.scrollTo(
//       {
//         top: targetRef.scrollHeight,
//         left: 0,
//         behavior: "smooth"
//       }
//     );
//   });
// }

function addMessage(preloader = false, h_id, currentMessage){
  store.commit("notify", {
    type: "warning",
    message: "Отправляем",
  });
  store.dispatch("sendMessage",{homework_id:props.homeworkId ? props.homeworkId : h_id, message:currentMessage})
    .then(() => homeworkModel.value.currentMessage = '').then(() => {
      store.commit("notify", {
        type: "success",
        message: "Сообщение успешно отправлено",
      });
  })
}

function getMessages(preloader = false, h_id){
  store.dispatch("getMessages",{homework_id:h_id, usePreloader:preloader})
}

if (props.homeworkId){
  getMessages(false,props.homeworkId);
}else {
  getMessages(false,homework_id.value);
}

</script>
<style>



</style>
