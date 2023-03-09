import axiosClient from "../../axios";
import store from "../index";

export default {
  state: {
    users: {
      data:{},
      meta:{},
      search:''
    },
    currentUser: {
      data:{},
    },
  },
  mutations: {
    setCurrentUser: (state, user) => {
      state.currentUser.data = user.user;
    },
    setUsers: (state, users) => {
      state.users.meta = users.meta;
      state.users.data = users.data;
    },
    updateSearch (state, search) {
      state.users.search = search
    }
  },
  actions: {
    getUserEdit({ commit }, id) {
      commit("setLoading", true);
      return axiosClient
        .get(`/users/${id}`)
        .then((res) => {
          commit("setCurrentUser", res.data);
          commit("setLoading", false);
          return res;
        })
        .catch((err) => {
          commit("setLoading", false);
          throw err;
        });
    },
    saveUser({ commit, dispatch, rootState }, user) {
      const formData = new FormData();
      formData.append('name', user.name);
      formData.append('surname', user.surname);
      formData.append('patronymic', user.patronymic);
      formData.append('group', user.group);
      formData.append('email', user.email);
      formData.append('role', user.role);
      if (!user.id){
        formData.append('password', user.password);
      }
      if (user.image){
        formData.append('image', user.image);
      }
      console.log(user)
      const config = { headers: { "content-type": "multipart/form-data" }}
      delete user.image_url;

      let response;
      if (user.id) {
        response = axiosClient
          .post(`/users/${user.id}`, formData, config)
          .then((res) => {
            commit('setCurrentUser', res.data)
            return res;
          });
      } else {
        response = axiosClient.post("/users", formData, config).then((res) => {
          commit('setCurrentUser', res.data)
          return res;
        });
      }

      return response;
    },
    getUsers({ commit,state }, {url = null,groupNumber, limit, role, usePreloader} = {}) {
      if (usePreloader){
        commit('setLoading', true)
      }
      url = url || `/users?${groupNumber !== 'All' ? 'group=' + groupNumber : ''}${'&limit=' + limit}${'&q=' + state.users.search}${role !== 'All' ? '&role=' + role : ''}`;
      return axiosClient.get(url).then((res) => {
        if (usePreloader){
          commit('setLoading', false)
        }
        commit("setUsers", res.data);
        return res;
      });
    },
    deleteUser({ commit, dispatch }, id) {
      return axiosClient.delete(`/users/${id}`);
    },
    deleteUsers({ commit, dispatch }, users) {
      return axiosClient.delete(`/users/massDestroy/${users}`);
    }

  },
  getters: {

  },
}
