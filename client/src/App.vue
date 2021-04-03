<template>
  <div id="app">
    <div v-if="(isLogged = false)">
      <SignIn></SignIn>
    </div>
    <div v-else>
      <el-container>
        <el-aside><SideNavigation /></el-aside>
        <el-container>
          <el-header><DashboardNavbar /></el-header>
          <el-main>
            <router-view class="mt-4 ml-3"></router-view>
          </el-main>
          <el-footer></el-footer>
        </el-container>
      </el-container>
    </div>
  </div>
</template>

<script>
import SignIn from './views/Sign-In'
import SideNavigation from './components/core/SideNavigation'
import DashboardNavbar from './components/core/DashboardNavbar'
import { mapGetters } from 'vuex'

export default {
  name: 'app',
  isLogged: false,
  components: {
    SignIn,
    SideNavigation,
    DashboardNavbar
  },
  computed: {
    ...mapGetters([
      'isLogged'
    ])
  },
  methods: {
    logout () {
      this.$store.dispatch('logout')
    }
  }
}
</script>
<style lang="scss">
@import "assets/scss/main.scss";
</style>
