<template>
  <div class="w-full overflow-hidden shadow-xs" >

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
        <router-link to="/admin/groups">
          <a class="flex items-center hover:text-indigo-600" href="#">
            Группы
            <svg class="flex-shrink-0 h-5 w-5 text-gray-400 dark:text-gray-600 mx-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"/>
            </svg>
          </a>
        </router-link>
      </li>
      <li class="text-sm font-semibold text-gray-800 truncate dark:text-gray-200" aria-current="page">
        {{ route.params.id ? 'Редактирование группы ' + groupModel.group_number : "Создание группы" }}
      </li>
    </ol>
    <div class="">

<!--      <div class="hidden sm:block" aria-hidden="true">-->
<!--        <div class="py-5">-->
<!--          <div class="border-t border-gray-200" />-->
<!--        </div>-->
<!--      </div>-->

      <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
              <h3 class="text-lg font-medium leading-6 text-gray-900">Информация</h3>
              <p class="mt-1 text-sm text-gray-600">Данные о группе</p>
            </div>
          </div>
          <div class="mt-5 md:col-span-2 md:mt-0">
            <form @submit.prevent="submitWithValidate">
              <div class="overflow-hidden shadow sm:rounded-md">
                <div class="bg-white px-4 py-5 sm:p-6">
                  <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                      <label for="first-name" class="block text-sm font-medium text-gray-700">Группа</label>
                      <input v-model="groupModel.group_number"  type="text" name="first-name" id="first-name" autocomplete="given-name" :class="$v.group_number.$error ? 'transition ease-in-out delay-150 bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full dark:bg-red-100 dark:border-red-400 shadow-[4px_4px_0px_0px_#c7302b] border-none' : 'transition ease-in-out delay-150 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm'" />
                      <span class="text-red-600 text-xs font-bold" v-for="error in $v.group_number.$errors">
                      {{ error.$message}}
                      </span>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                      <label for="group" class="block text-sm font-medium text-gray-700">Факультет</label>
                      <select v-model="groupModel.faculty_id"  id="group" name="group" autocomplete="group" :class="$v.faculty_id.$error ? 'transition ease-in-out delay-150 bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full dark:bg-red-100 dark:border-red-400 shadow-[4px_4px_0px_0px_#c7302b] border-none' : 'transition ease-in-out delay-150 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm'">
                          <option disabled selected>Не выбрано</option>
                          <option :value="faculty.id" v-for="faculty in faculties" :key="faculty.id">{{ faculty.faculty_name }}</option>
                      </select>
                      <span class="text-red-600 text-xs font-bold" v-for="error in $v.faculty_id.$errors">
                      {{ error.$message}}
                      </span>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="user-role" class="block text-sm font-medium text-gray-700">Год поступления</label>
                      <select v-model="groupModel.year_id" id="user-role" name="user-role" autocomplete="user-role" :class="$v.year_id.$error ? 'transition ease-in-out delay-150 bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full dark:bg-red-100 dark:border-red-400 shadow-[4px_4px_0px_0px_#c7302b] border-none' : 'transition ease-in-out delay-150 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm'">
                        <option disabled selected>Не выбрано</option>
                        <option :value="year.id" v-for="year in years" :key="year.id">{{ year.year }}</option>
                      </select>
                      <span class="text-red-600 text-xs font-bold" v-for="error in $v.year_id.$errors">
                      {{ error.$message}}
                      </span>
                    </div>

                  </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                  <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Сохранить</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useRoute, useRouter } from 'vue-router';
import {computed, ref, watch} from "vue";
import {useStore} from "vuex";
import store from "../../../store";
import Preloader from "./../../../components/Preloader.vue";
import useVuelidate from "@vuelidate/core"
import {required, email,minLength, helpers} from "@vuelidate/validators"

const route = useRoute();
const router = useRouter();
const groupModel = ref({
  id:"",
  faculty_id:"",
  group_number:"",
  faculty:"",
  year_id: "",
  year:"",
});
store.dispatch("getFaculties");
store.dispatch("getYears");
const faculties = computed(() => store.state.groups.faculties);
const years = computed(() => store.state.groups.years);

const groups = computed(() => store.state.groups.groups);

let rules = {
  faculty_id: {
    required:helpers.withMessage('Данное поле обязательно', required)
  },
  group_number: {
    required:helpers.withMessage('Данное поле обязательно', required)
  },
  year_id: {
    required:helpers.withMessage('Данное поле обязательно', required),
  }
}
if (route.params.id){
  store.dispatch("getGroupEdit", route.params.id);
}

const $v = useVuelidate(rules, groupModel);
async function submitWithValidate(){
  const result = await $v.value.$validate();
  if (result){
    saveGroup();
  }else {
  }
}


const groupLoading = computed(() => store.state.groups.currentGroup.loading);

watch(
  () => store.state.groups.currentGroup.data,
  (newVal, oldVal) => {
    groupModel.value = {
      ...JSON.parse(JSON.stringify(newVal)),
    };
  }
)



function saveGroup() {
  let action = "создана";
  if (groupModel.value.id) {
    action = "обновлена";
  }
  store.dispatch("saveGroup", { ...groupModel.value }).then(({ data }) => {
    console.log(data)
    store.commit("notify", {
      type: "success",
      message: "Группа успешно " + action,
    });
  });
  store.dispatch("getGroups");
  router.push({ path: '/admin/groups' });
}

</script>

<style scoped>

</style>
