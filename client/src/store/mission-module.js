import axios from 'axios'

const state = {
  missions: []
}

const getters = {
  getMissions: state => {
    return state.missions
  }
}
const mutations = {
  setMissions (state, data) {
    state.missions = data
  },
  addMission: (state, newMission) => state.missions.unshift(newMission)
}
const actions = {
  async fetchMissions ({ commit }) {
    const response = await axios.get('/missions')
    commit('setMissions', response.data)
  },

  async createMission ({ commit }, mission) {
    const response = await axios.post('/missions', mission)
    commit('addMission', response.data)
  }
}

export default {
  state,
  getters,
  mutations,
  actions
}
