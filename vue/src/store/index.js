
import {createStore} from "vuex"
import axiosClient from "../axios";
import axios from "axios";
import theme from './modules/theme'
import users from './modules/users'
import groups from './modules/groups'
import disciplines from './modules/disciplines'
import teacherLessons from './modules/teacherLessons'
import studentDisciplines from "./modules/studentDisciplines";
import studentLessons from "./modules/studentLessons";
import chats from "./modules/chats";

const store = createStore({
  state:{
    isLoading:false,
    user: {
      data:{},
      token:sessionStorage.getItem('TOKEN'),
      loading:false,
    },
    notification: {
      show: false,
      type: 'success',
      message: ''
    }
  },
  getters:{

  },
  actions:{
    register({ commit }, user){
      return axiosClient.post('/register',user)
        .then(({data}) => {
          commit('setUser', data)
          commit('setToken', data.token)
          return data;
        });
    },
    login({ commit }, user){
      commit("setLoading", true);
      return axiosClient.post('/login',user)
        .then(({data}) => {
          commit('setUser', data);
          commit('setToken', data.token);
          localStorage.setItem('userId', data.user.id);
          localStorage.setItem('userRole', data.user.role);
          commit("setLoading", false);
          return data;
        });
    },
    logout({commit}){
      return axiosClient.post('/logout')
        .then(response => {
          commit('logout');
          return response;
        })
    },
    getUser({commit}) {
      commit("setLoading", true);
      return axiosClient.get('/user')
      .then(res => {
        commit('setUser', res.data)
        commit("setLoading", false);
      })
    }
  },
  mutations:{
    logout: (state) => {
      state.user.data = {};
      state.user.token = null;
      sessionStorage.removeItem('TOKEN');
      localStorage.clear();
    },
    setUser: (state, user) => {
      state.user.data = user.data; // костыль немношка
    },
    setToken: (state, token) => {
      state.user.token = token;
      sessionStorage.setItem('TOKEN', token);
    },
    notify: (state, {message, type}) => {
      state.notification.show = true;
      state.notification.type = type;
      state.notification.message = message;
      setTimeout(() => {
        state.notification.show = false;
      }, 3000)
    },
    setLoading: (state, loading) => {
      if (loading){
        state.isLoading = loading;
      }else{
        setTimeout(() => {
          state.isLoading = loading;
        }, 1500);
      }

    },
  },
  modules:{
    theme,
    users,
    groups,
    teacherLessons,
    disciplines,
    studentDisciplines,
    studentLessons,
    chats
  }
})

export default store;
