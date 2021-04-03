<template>
  <div>
    <el-page-header
      @back="goBack"
      :content="mission.data.title"
      class="mb-4 custom-titles"
    >
    </el-page-header>
    <el-row :gutter="10">
      <el-col :span="14">
        <el-card class="mission-card">
          <div slot="header" class="clearfix">
            <span>Mission Details</span>
          </div>
          <div>
            {{ mission.data.description }}
          </div>
          <div class="mt-3">
            <p>Estimated Duration:</p>
          </div>
        </el-card>
      </el-col>
      <el-col :span="6" :offset="3">
        <el-card class="mission-card">
          <el-row>
            <el-button type="text" icon="el-icon-star-off">
              Add to Favorites
            </el-button>
          </el-row>
          <el-row>
            <el-button type="text" icon="el-icon-message"> Contact </el-button>
          </el-row>
          <el-row>
            <router-link
              :to="{ name: 'Profile', params: { id: mission.data.user.id } }"
              :key="mission.data.user.id"
            >
              <el-button type="text" icon="el-icon-user">
                {{ mission.data.user.name }}
              </el-button>
            </router-link>
          </el-row>
        </el-card>
      </el-col>
    </el-row>

    <el-row :gutter="10" class="mt-4">
      <el-col :span="14">
        <el-card class="mission-card">
          <div slot="header" class="clearfix">
            <span>Skills Needed</span>
          </div>
          <div>
            <b-form-tag
              v-for="skill in mission.data.needed_skills"
              :key="skill"
              no-remove="true"
              variant="purple-two"
              class="mr-2"
              >{{ skill }}
            </b-form-tag>
          </div>
        </el-card>
      </el-col>
      <el-col :span="6" :offset="3">
        <el-card class="mission-card">
          <div slot="header" class="clearfix">
            <span>Roles Needed</span>
          </div>
          <div>
            <b-form-tag
              v-for="role in mission.data.needed_roles"
              :key="role"
              no-remove="true"
              variant="purple-two"
              class="mr-2"
              >{{ role }}
            </b-form-tag>
          </div>
        </el-card>
      </el-col>
    </el-row>

    <el-row :gutter="10" class="mt-4">
      <el-col :span="14">
        <el-card class="mission-card">
          <div slot="header" class="clearfix">
            <span>Additional Documents</span>
          </div>
        </el-card>
      </el-col>
      <el-col :span="6" :offset="3">
        <el-card class="mission-card">
          <div slot="header" class="clearfix">
            <span>Tags</span>
          </div>
          <div>
            <b-form-tag
              v-for="tag in mission.data.tags"
              :key="tag"
              no-remove="true"
              variant="purple-two"
              class="mr-2"
              >{{ tag }}
            </b-form-tag>
          </div>
        </el-card>
      </el-col>
    </el-row>
  </div>
</template>

<script>
import axios from 'axios'
import router from '../router/index'

export default {
  data () {
    return {
      id: 0,
      mission: { }
    }
  },
  created () {
    this.id = this.$route.params.id
    this.getMission()
  },
  methods: {
    getMission () {
      axios
        // TODO: use base url var instead of full address
        .get('/missions/' + this.id)
        .then(data => (this.mission = data.data))
    },
    goBack () {
      router.go(-1)
    }
  }
}
</script>
