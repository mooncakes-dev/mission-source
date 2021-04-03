import axios from 'axios'

const state = {
  reviews: []
}

const getters = {
  getReviews: state => {
    return state.reviews
  }
}
const mutations = {
  setReviews (state, data) {
    state.reviews = data
  },
  addReview: (state, newReview) => state.reviews.unshift(newReview)
}
const actions = {
  async fetchReviews ({ commit }) {
    const response = await axios.get('/reviews')
    commit('setReviews', response.data)
  },

  async createReview ({ commit }, review) {
    const response = await axios.post('/reviews', review)
    commit('addReview', response.data)
  }
}

export default {
  state,
  getters,
  mutations,
  actions
}
