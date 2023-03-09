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

    },
    userId:'',
    currentHomework:{

    },
  },
  mutations: {
    setStudentLessons: (state, lessons) => {
      state.lessons.data = lessons.data;
    },
    setStudentLesson: (state, lesson) => {
      state.currentLesson.data = lesson.data;
    },
    setCurrentHomework(state, homework){
      state.currentHomework = homework;
    },
    studentLessonSearch (state, search) {
      state.lessons.search = search;
    },
    setStudentUserId(state, id) {
      state.userId = id;
    },
  },
  actions: {
    getStudentLessons({ commit,state }, {id,url = null, limit = '', usePreloader} = {}) {
      if (usePreloader){
        commit('setLoading', true)
      }
      url = url || `/student/${id}/lessons`;
      console.log(url)
      return axiosClient.get(url).then((res) => {
        if (usePreloader){
          commit('setLoading', false)
        }
        commit("setStudentLessons", res.data);
        return res;
      });
    },
    getStudentLesson({ commit,state,rootState }, {id,url = null, limit = '', usePreloader} = {}) {
      let userId = localStorage.userId;
      if (usePreloader){
        commit('setLoading', true)
      }
      url = url || `/student/lessons/${id}/${userId}`;
      return axiosClient.get(url).then((res) => {
        if (usePreloader){
          commit('setLoading', false)
        }
        commit("setStudentLesson", res.data);
        return res;
      });
    },
    getStudentHomework({ commit,state,rootState }, {id,url = null, limit = '', usePreloader} = {}) {
      if (usePreloader){
        commit('setLoading', true)
      }
      url = url || `/student/homework/${id}`;
      return axiosClient.get(url).then((res) => {
        if (usePreloader){
          commit('setLoading', false)
        }
        commit("setCurrentHomework", res.data);
        return res;
      });
    },

  },
  getters: {

  },
}
