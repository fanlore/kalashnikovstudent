import axiosClient from "../../axios";
import store from "../index";

export default {
  state: {
    disciplines:{
      data:{},
      meta:{},
      search:''
    }
  },
  mutations: {
    setDisciplines: (state, disciplines) => {
      state.disciplines.data = disciplines.data;
    },
    disciplinesSearch (state, search) {
      state.disciplines.search = search;
    },
  },
  actions: {
    getStudentDisciplines({ commit,state,rootState }, {url = null, limit = '', usePreloader,userData} = {}) {
      if (true){
        if (usePreloader){
          commit('setLoading', true)
        }
        url = url || `/student/disciplines`;
        console.log(url)
        return axiosClient.get(url).then((res) => {
          if (usePreloader){
            commit('setLoading', false)
          }
          commit("setDisciplines", res.data);
          return res;
        });
      }
    },
  },
  getters: {

  },
}
