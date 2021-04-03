<template>
  <el-menu
    default-active="2"
    class="el-menu-vertical"
    background-color="#4a289b"
    text-color="#efd9ce"
    active-text-color="#efd9ce"
    :router="true"
    @open="handleOpen"
    @close="handleClose"
    :collapse="isCollapse"
  >
    <el-radio-group v-model="isCollapse" text-color="#efd9ce" fill="#4a289b">
      <el-radio-button :label="false" v-if="isCollapse">
        <i class="el-icon-right"></i>
      </el-radio-button>
      <el-radio-button :label="true" v-else>
        <i class="el-icon-back"></i>
      </el-radio-button>
    </el-radio-group>

    <div class="mt-5">
      <el-menu-item index="1" route="/create-mission">
        <i class="el-icon-plus"></i>
        <span slot="title"> Quick Create</span>
      </el-menu-item>
      <div class="mt-5">
        <el-menu-item index="2" route="/dashboard">
          <i class="el-icon-s-home"></i>
          <span slot="title"> Mission Source</span>
        </el-menu-item>
        <el-menu-item index="3">
          <i class="el-icon-menu"></i>
          <span slot="title">Dashboard</span>
        </el-menu-item>
        <el-menu-item index="4" route="/inbox">
          <i class="el-icon-chat-line-round"></i>
          <span slot="title">Messages</span>
        </el-menu-item>
        <el-menu-item index="5" route="/liked-missions">
          <i class="el-icon-star-off"></i>
          <span slot="title">Liked Missions</span>
        </el-menu-item>
        <el-menu-item index="6" @click="logout()" v-if="isLogged">
          <i class="el-icon-remove-outline"></i>
          <span slot="title">Log Out</span>
        </el-menu-item>
      </div>
    </div>
  </el-menu>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  name: 'SideNavigation',
  data () {
    return { isCollapse: true }
  },
  activeLink: null,
  computed: {
    ...mapGetters([
      'isLogged'
    ])
  },
  methods: {
    mounted: function () {
      this.activeLink = this.$route.path
    },
    handleOpen (key, keyPath) {
      console.log(key, keyPath)
    },
    handleClose (key, keyPath) {
      console.log(key, keyPath)
    },
    logout () {
      this.$store.dispatch('logout')
    }

  },
  watch: {
    $route (to, from) {
      this.activeLink = to.path
    }
  }
}
</script>

<style>
.el-menu-vertical:not(.el-menu--collapse) {
  width: 200px;
  min-height: 400px;
}
</style>
