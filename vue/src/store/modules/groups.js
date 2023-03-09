import axiosClient from "../../axios";
import store from "../index";

export default {
  state: {
    groups:{
      data:{},
      meta:{},
      search:''
    },
    faculties:{

    },
    years:{

    },
    currentGroup: {
      data:{},
    },
  },
  mutations: {
    setCurrentGroup: (state, group) => {
      state.currentGroup.data = group.group;
    },
    setGroups: (state, groups) => {
      state.groups.meta = groups.meta;
      state.groups.data = groups.data;
    },
    groupsSearch (state, search) {
      state.groups.search = search;
    },
    setFaculties(state, faculties) {
      state.faculties = faculties;
    },
    setYears(state, years) {
      state.years = years;
    }
  },
  actions: {
    getGroupEdit({ commit }, id) {
      commit("setLoading", true);
      return axiosClient
        .get(`/groups/${id}`)
        .then((res) => {
          commit("setCurrentGroup", res.data);
          commit("setLoading", false);
          return res;
        })
        .catch((err) => {
          commit("setLoading", false);
          throw err;
        });
    },
    saveGroup({ commit, dispatch, rootState }, group) {
      const formData = new FormData();
      formData.append('group_number', group.group_number);
      formData.append('faculty_id', group.faculty_id);
      formData.append('year_id', group.year_id);

      const config = { headers: { "content-type": "multipart/form-data" }}

      let response;
      if (group.id) {
        response = axiosClient
          .post(`/groups/${group.id}`, formData, config)
          .then((res) => {
            commit('setCurrentGroup', res.data)
            return res;
          });
      } else {
        response = axiosClient.post("/groups", formData, config).then((res) => {
          commit('setCurrentGroup', res.data)
          return res;
        });
      }

      return response;
    },
    getGroups({ commit,state }, {url = null, limit = '', usePreloader} = {}) {
      if (usePreloader){
        commit('setLoading', true)
      }
      url = url || `/groups?${'&limit=' + limit}${'&q=' + state.groups.search}`;
      return axiosClient.get(url).then((res) => {
        if (usePreloader){
          commit('setLoading', false)
        }
        commit("setGroups", res.data);
        return res;
      });
    },
    getFaculties({ commit,state }, {url = null, limit = '', usePreloader} = {}) {
      if (usePreloader){
        commit('setLoading', true)
      }
      url = url || `/faculties`;
      return axiosClient.get(url).then((res) => {
        if (usePreloader){
          commit('setLoading', false)
        }
        commit("setFaculties", res.data);
        return res;
      });
    },
    getYears({ commit,state }, {url = null, limit = '', usePreloader} = {}) {
      if (usePreloader){
        commit('setLoading', true)
      }
      url = url || `/years`;
      return axiosClient.get(url).then((res) => {
        if (usePreloader){
          commit('setLoading', false)
        }
        commit("setYears", res.data);
        return res;
      });
    },
    deleteGroup({ commit, dispatch }, id) {
      return axiosClient.delete(`/groups/${id}`);
    },
    deleteGroups({ commit, dispatch }, groups) {
      return axiosClient.delete(`/groups/massDestroy/${groups}`);
    }
  },
  getters: {

  },
}
