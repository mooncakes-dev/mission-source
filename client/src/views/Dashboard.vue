<template>
  <div>
    <el-tabs v-model="activeName" @tab-click="handleClick">
      <el-tab-pane label="Newly Added" name="first">Newly Added</el-tab-pane>
      <el-tab-pane label="All Posts" name="second">All Posts</el-tab-pane>
      <el-tab-pane label="Custom Filter" name="third">
        Custom Filter
      </el-tab-pane>
    </el-tabs>
    <MissionCard
      v-for="mission in missionList"
      :key="mission.id"
      :id="mission.id"
      :title="mission.title"
      :description="mission.description"
      :tags="mission.tags"
    ></MissionCard>
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

import MissionCard from '../components/core/MissionCard'

export default {
  components: {
    MissionCard
  },
  mission: {
    id: '',
    title: '',
    description: ''
  },
  methods: {
    ...mapActions(['fetchMissions'])
  },
  computed: {
    ...mapGetters({ missionList: 'getMissions' })
  },
  created () {
    this.fetchMissions()
  }

}

</script>
