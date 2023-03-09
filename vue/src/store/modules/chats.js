import axiosClient from "../../axios";
import store from "../index";

export default {
  state: {
    messages:{

    },
    currentMessages: {

    },
  },
  mutations: {
    // setCurrentGroup: (state, group) => {
    //   state.currentGroup.data = group.group;
    // },
    setMessages: (state, messages) => {
      state.messages = messages.data;
    },
  },
  actions: {
    sendMessage({ commit }, {homework_id, message}) {
      commit("setLoading", false);
      return axiosClient
        .post(`/chat/add/${homework_id}?message=${message}`)
        .then((res) => {
          store.dispatch("getMessages",{homework_id:homework_id, usePreloader:false})
          commit("setLoading", false);
          return res;
        })
        .catch((err) => {
          commit("setLoading", false);
          throw err;
        });
    },
    getMessages({ commit,state }, {homework_id, usePreloader} = {}) {
      if (usePreloader){
        commit('setLoading', true)
      }
      let url = `/chat/get/${homework_id}`;
      console.log(homework_id);
      return axiosClient.get(url).then((res) => {
        if (usePreloader){
          commit('setLoading', false)
        }
        console.log(res.data)
        commit("setMessages", res.data);
        return res;
      });
    },

  },
  getters: {

  },
}
