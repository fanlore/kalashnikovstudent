import axiosClient from "../../axios";
import store from "../index";

export default {
  state: {
    lessons:{
      data:{},
      meta:{},
      search:''
    },
    currentLesson:{
      data:{}
    },
    disciplinesTeacher:{
    },
    homeworks:{
      data:{},
      meta:{},
      search:''
    },
    currentHomework:{
      data:{}
    }
  },
  mutations: {
    setLessons: (state, lessons) => {
      state.lessons.data = lessons.data;
      state.lessons.meta = lessons.meta;
    },
    setHomeworks: (state, homeworks) => {
      state.homeworks.data = homeworks.data;
      // state.homeworks.meta = homeworks.meta;
    },
    setDisciplinesTeacher: (state, disciplines) => {
      state.disciplinesTeacher = disciplines;
    },
    updateLessonSearch (state, search) {
      state.lessons.search = search
    },
    setCurrentLesson(state, lesson){
      state.currentLesson.data = lesson.lesson;
    },
    setCurrentHomework(state, homework){
      state.currentHomework.data = homework;
    }
  },
  actions: {
    getLessonEdit({ commit }, id) {
      commit("setLoading", true);
      return axiosClient
        .get(`/teacher/lessons/${id}`)
        .then((res) => {
          commit("setCurrentLesson", res.data);
          commit("setLoading", false);
          return res;
        })
        .catch((err) => {
          commit("setLoading", false);
          throw err;
        });
    },
    saveLesson({ commit, dispatch, rootState }, lesson) {
      console.log(lesson)
      const formData = new FormData();
      formData.append('title', lesson.title);
      formData.append('discipline_id', lesson.discipline_id);
      formData.append('order_number', lesson.order_number);
      formData.append('content', lesson.content);
      formData.append('is_available', lesson.is_available);
      formData.append('destination', lesson.destination);
      if (!(typeof lesson.homework_media === 'string')){
        formData.append('homework_media', lesson.homework_media);
      }else if(lesson.homework_media === ''){
        formData.append('delete_homework',true)
        formData.append('homework_media', lesson.homework_media);
      }

      const config = { headers: { "content-type": "multipart/form-data" }}

      let response;
      if (lesson.id) {
        response = axiosClient
          .post(`/teacher/lessons/${lesson.id}`, formData, config)
          .then((res) => {
            commit('setCurrentLesson', res.data)
            return res;
          });
      } else {
        console.log('else')
        response = axiosClient.post("/teacher/lessons", formData, config).then((res) => {
          commit('setCurrentLesson', res.data)
          return res;
        });
      }

      return response;
    },
    getDisciplinesTeacher({ commit,state }){
      return axiosClient.get('/teacher/disciplines').then((res) => {
        commit("setDisciplinesTeacher", res.data.data);
        return res;
      });
    },
    getLessons({ commit,state },{url = null, disciplineId,limit = 5,usePreloader} = {}) {
      url = url || `/teacher/lessons?discipline_id=${disciplineId}&limit=${limit}${'&q=' + state.lessons.search}`;
      return axiosClient.get(url).then((res) => {
        commit("setLessons", res.data);
        if (usePreloader){
          commit("setLoading", false);
        }
        return res;
      });
    },
    getHomeworks({ commit,state },{url = null, lessonId,limit = 5,usePreloader} = {}) {
      if (usePreloader){
        commit("setLoading", true);
      }
      url = url || `/teacher/lessons/homeworks/${lessonId}`;
      return axiosClient.get(url).then((res) => {
        commit("setHomeworks", res.data);
        if (usePreloader){
          commit("setLoading", false);
        }
        return res;
      });
    },
    deleteLesson({ commit, dispatch }, id) {
      return axiosClient.delete(`/teacher/lessons/${id}`).then((res) => {
        return res;
      });
    },
    deleteLessons({ commit, dispatch }, lessons) {
      return axiosClient.delete(`/teacher/lessons/massDestroy/${lessons}`);
    }
  },
  getters: {

  },
}
