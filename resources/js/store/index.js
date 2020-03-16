import Vue from 'vue';
import Vuex from 'VueX';

Vue.use(Vuex)


export default new Vuex.Store({
  state: {
    item: {
    }
  },
  mutations: {
    setItem(state, payload) {
      state.item = payload;
    }
  }
});