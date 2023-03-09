import axiosClient from "../../axios";
import store from "../index";

export default {
  state: {
    disciplines:{
      data:{},
      meta:{},
      search:''
    },
    currentDiscipline: {
      data:{},
    },
    teachers: {
    },
  },
  mutations: {
    setCurrentDiscipline: (state, discipline) => {
      state.currentDiscipline.data = discipline.discipline;
    },
    setDisciplines: (state, disciplines) => {
      state.disciplines.meta = disciplines.meta;
      state.disciplines.data = disciplines.data;
    },
    disciplinesSearch (state, search) {
      state.disciplines.search = search;
    },
    setTeachers(state, teachers) {
      state.teachers = teachers;
    }
  },
  actions: {
    getDisciplineEdit({ commit }, id) {
      commit("setLoading", true);
      return axiosClient
        .get(`/disciplines/${id}`)
        .then((res) => {
          commit("setCurrentDiscipline", res.data);
          console.log(res.data)
          commit("setLoading", false);
          return res;
        })
        .catch((err) => {
          commit("setLoading", false);
          throw err;
        });
    },
    saveDiscipline({ commit, dispatch, rootState }, discipline) {
      const formData = new FormData();
      formData.append('name', discipline.name);
      formData.append('slug', discipline.slug);
      formData.append('teacher_id', discipline.teacher_id);
      formData.append('group_for', discipline.group_for);
      formData.append('description', discipline.description);

      const config = { headers: { "content-type": "multipart/form-data" }}

      let response;
      if (discipline.id) {
        response = axiosClient
          .post(`/disciplines/${discipline.id}`, formData, config)
          .then((res) => {
            commit('setCurrentDiscipline', res.data)
            return res;
          });
      } else {
        response = axiosClient.post("/disciplines", formData, config).then((res) => {
          commit('setCurrentDiscipline', res.data)
          return res;
        });
      }

      return response;
    },
    getDisciplines({ commit,state }, {url = null, limit = '', usePreloader} = {}) {
      if (usePreloader){
        commit('setLoading', true)
      }
      url = url || `/disciplines?${'&limit=' + limit}${'&q=' + state.disciplines.search}`;
      console.log(url)
      return axiosClient.get(url).then((res) => {
        if (usePreloader){
          commit('setLoading', false)
        }
        commit("setDisciplines", res.data);
        return res;
      });
    },
    deleteDiscipline({ commit, dispatch }, id) {
      return axiosClient.delete(`/disciplines/${id}`);
    },
    deleteDisciplines({ commit, dispatch }, disciplines) {
      return axiosClient.delete(`/disciplines/massDestroy/${disciplines}`);
    },
    getTeachers({ commit,state }, {url = null, limit = '', usePreloader} = {}) {
      if (usePreloader){
        commit('setLoading', true)
      }
      url = url || `/users/teachers`;
      return axiosClient.get(url).then((res) => {
        if (usePreloader){
          commit('setLoading', false)
        }
        commit("setTeachers", res.data.data);
        return res;
      });
    },
  },
  getters: {

  },
}
