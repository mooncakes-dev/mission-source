<template>
  <div class="dashboard-navbar mt-2">
    <b-nav>
      <b-nav-item>
        <!-- TODO: replace this autocomplete with this solution when the time comes
        to work on it
        https://vuejsexamples.com/a-simple-tags-input-with-typeahead-built-with-vue-js-2/ -->
        <el-autocomplete
          size="large"
          placeholder="Search for tags"
          :fetch-suggestions="querySearch"
          :trigger-on-focus="false"
          @select="handleSelect"
          v-model="input"
          clearable
        >
          <i class="el-icon-search el-input__icon" slot="suffix"> </i>
        </el-autocomplete>
      </b-nav-item>
      <div class="ml-auto">
        <b-nav-item right>
          <router-link
            :to="{ name: 'Profile', params: { id: user.user.id } }"
            :key="user.user.id"
          >
            <el-avatar icon="el-icon-user-solid"> </el-avatar>
          </router-link>
        </b-nav-item>
      </div>
    </b-nav>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  name: 'DashboardNavbar',
  input: '',
  computed: {
    ...mapGetters({ user: 'getUserInfo' })
  },

  created () {
    this.getUserInfo()
  }
}
</script>
