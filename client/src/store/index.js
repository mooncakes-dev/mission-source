import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
import userModule from './user-module'
import missionModule from './mission-module'
import reviewModule from './review-module'

Vue.use(Vuex)

axios.defaults.baseURL = 'http://127.0.0.1:8000/api'

export default new Vuex.Store({
  state: {
    user: null
  },

  getters: {
    isLogged: state => !!state.user,

    getUserInfo: state => {
      return state.user
    }
  },

  mutations: {
    setUserData (state, userData) {
      state.user = userData
      // eslint-disable-next-line no-undef
      localStorage.setItem('user', JSON.stringify(userData))
      axios.defaults.headers.common.Authorization = `Bearer ${userData.token}`
    },

    clearUserData () {
      // eslint-disable-next-line no-undef
      localStorage.removeItem('user')
      // eslint-disable-next-line no-undef
      location.reload()
    }
  },

  actions: {
    login ({ commit }, credentials) {
      return axios
        .post('/login', credentials)
        .then(({ data }) => {
          commit('setUserData', data)
        })
    },

    register ({ commit }, data) {
      return axios
        .post('/register', data)
        .then(response => {
          commit('setUserData', response.data.user)
        })
    },

    logout ({ commit }) {
      commit('clearUserData')
    }
  },

  modules: {
    userModule,
    missionModule,
    reviewModule
  }
})
