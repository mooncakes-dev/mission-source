<template>
  <el-row :gutter="20">
    <el-col :span="3" class="user-icon">
      <el-avatar> </el-avatar>
    </el-col>
    <el-col :span="6" class="user-bio">
      <h3>{{ name }}</h3>
      <p>{{ college }} - {{ major }}</p>
      <el-rate v-model="average_rating" text-color="#f78477" disabled>
      </el-rate>
      <el-button type="text" v-b-modal="'rate-modal'">Rate</el-button>
      <RateModal></RateModal>
    </el-col>
    <el-col :span="4">
      <StatsCard :value="review_length" :name="`Reviews`"></StatsCard>
    </el-col>
    <el-col :span="4">
      <StatsCard :value="mission_length" :name="`Missions Posted`"></StatsCard>
    </el-col>
    <el-col :span="4">
      <StatsCard :value="0" :name="`Achievements`"></StatsCard>
    </el-col>
  </el-row>
</template>

<script>
import RateModal from '../../components/profile/Modal'
import StatsCard from '../../components/profile/StatsCard'

export default {
  name: 'ProfileHeader',
  components: {
    RateModal,
    StatsCard
  },
  props: {
    name: String,
    college: String,
    major: String,
    average_rating: Number,
    mission_length: Number,
    review_length: Number
  }
}
</script>
