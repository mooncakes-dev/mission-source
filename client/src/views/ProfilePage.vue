<template>
  <div>
    <Header
      :name="user.data.name"
      :college="user.data.college"
      :major="user.data.major"
      :average_rating="user.data.average_rating"
      :review_length="user.data.reviews.length"
      :mission_length="user.data.missions.length"
    >
    </Header>
    <el-row :gutter="20" class="mt-3">
      <el-tabs v-model="activeTab" @tab-click="handleClick">
        <el-tab-pane label="Reviews" name="reviews">
          <el-col
            :span="12"
            v-for="review in user.data.reviews"
            :key="review.id"
          >
            <ReviewCard
              :id="review.id"
              :title="review.title"
              :body="review.body"
              :rating="review.rating"
            >
            </ReviewCard>
          </el-col>
        </el-tab-pane>
        <el-tab-pane label="Posted Missions" name="posted-missions">
          <el-col
            :span="12"
            v-for="mission in user.data.missions"
            :key="mission.id"
          >
            <MissionCard
              :id="mission.id"
              :title="mission.title"
              :description="mission.description"
            >
            </MissionCard>
          </el-col>
        </el-tab-pane>
        <el-tab-pane label="Achievements" name="achievements">
          Achievements
        </el-tab-pane>
      </el-tabs>
    </el-row>
  </div>
</template>

<script>
import MissionCard from '../components/core/MissionCard'
import ReviewCard from '../components/profile/ReviewCard'
import Header from '../components/profile/ProfileHeader'

import { mapGetters } from 'vuex'
import axios from 'axios'

export default {
  data () {
    return {
      activeTab: 'reviews',
      currentUser: '',
      user: { }
    }
  },
  components: {
    MissionCard,
    ReviewCard,
    Header
  },
  computed: {
    ...mapGetters({ user: 'getUserInfo' })
  },

  created () {
    this.currentUser = this.$route.params.id
    this.fetchMoreDetails()
  },

  methods: {
    handleClick (tab, event) {
      console.log(tab, event)
    },
    fetchMoreDetails () {
      axios
        .get('/users/' + this.currentUser)
        .then(data => (this.user = data.data))
    }
  }
}
</script>
