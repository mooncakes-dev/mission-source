<template>
  <div>
    <h3>Create Mission</h3>
    <el-steps :active="active" finish-status="success" class="mt-5 mb-5">
      <el-step title="Stage 1" description="Basic information"></el-step>
      <el-step title="Stage 2" description="Extra details"></el-step>
      <el-step title="Stage 3" description="Finalize"></el-step>
    </el-steps>

    <div class="step-one" v-if="active == 0">
      <p>
        Create a basic mission for now. Give it an exciting name (but don't put
        the description in the title!).
      </p>
      <p>
        Write up a good description, explaining what you want to do in detail to
        avoid further questions.
      </p>
      <b-form :model="form" class="mission-form mt-5">
        <b-form-group
          id="input-group-1"
          label="Mission Name"
          label-for="input-1"
        >
          <b-form-input
            id="input-1"
            v-model="form.title"
            type="text"
            placeholder="Mission Name"
            required
            class="mt-3"
          >
          </b-form-input>
        </b-form-group>

        <b-form-group
          id="input-group-2"
          label="Mission Description"
          label-for="input-2"
          class="mt-4"
        >
          <b-form-textarea
            id="input-2"
            v-model="form.description"
            placeholder="You should be as detailed as possible, to avoid repeating questions"
            rows="3"
            max-rows="10"
            required
            class="mt-3"
          >
          </b-form-textarea>
        </b-form-group>
        <b-form-group
          id="input-group-3"
          label="Mission Tags"
          label-for="input-3"
          class="mt-4"
          description="Enter tags separated by comma or semicolon or by pressing enter"
        >
          <b-form-tags
            class="mt-3"
            input-id="input-3"
            v-model="form.tags"
            placeholder="Enter up to 5 tags"
            separator=",;"
            remove-on-delete
            :limit="limit"
            :tag-validator="validator"
            @tag-state="onTagState"
            tag-variant="purple-two"
          ></b-form-tags>
        </b-form-group>
      </b-form>
      <b-button variant="outline-peach" class="submitBtn mt-4" @click="next()">
        Next Step
      </b-button>
    </div>

    <div class="step-two" v-else-if="active == 1">
      <p>Okay, let's add some extra details to avoid repeated questions</p>
      <b-form :model="form" class="mission-form mt-5">
        <b-form-group
          id="input-group-4"
          label="Estimated Duration"
          label-for="input-4"
        >
          <b-form-input
            id="input-4"
            v-model="form.estimated_time"
            type="text"
            placeholder="Eg. 2 months, 2 days"
            required
            class="mt-3"
          >
          </b-form-input>
        </b-form-group>

        <b-form-group
          id="input-group-5"
          label="Specific Skills"
          label-for="input-5"
          class="mt-4"
          description="Try to be as specific as you can. You can enter up to 5 skills"
        >
          <b-form-tags
            class="mt-3"
            input-id="input-5"
            v-model="form.needed_skills"
            placeholder="Eg. Vue, Graphic Design"
            separator=",;"
            remove-on-delete
            :limit="limit"
            :tag-validator="validator"
            @tag-state="onTagState"
            tag-variant="purple-two"
          ></b-form-tags>
        </b-form-group>

        <b-form-group
          id="input-group-6"
          label="Roles"
          label-for="input-6"
          class="mt-4"
          description="If you are looking for a number of special roles enter them here"
        >
          <b-form-tags
            class="mt-3"
            input-id="input-6"
            v-model="form.needed_roles"
            placeholder="Eg. Designer, Client-Side Developer, Server-Side Developer"
            separator=",;"
            remove-on-delete
            :limit="limit"
            :tag-validator="validator"
            @tag-state="onTagState"
            tag-variant="purple-two"
          ></b-form-tags>
        </b-form-group>
      </b-form>
      <b-button variant="outline-peach" class="submitBtn mt-4" @click="next()">
        Finalize
      </b-button>
    </div>
    <div class="step-three" v-else-if="active == 2">
      <p class="mb-4">
        Make sure that everything is correct and then submit your mission
      </p>

      <el-row :gutter="10">
        <el-col :span="14">
          <el-card class="box-card mission-card">
            <div slot="header" class="clearfix">
              <span>Mission Details</span>
            </div>
            <div>Name: {{ form.title }}</div>
            <div class="mt-3">Description: {{ form.description }}</div>
            <div class="mt-3">
              <p>Estimated Duration: {{ form.estimated_time }}</p>
            </div>
          </el-card>
          <el-card class="box-card mission-card mt-4">
            <div slot="header" class="clearfix">
              <span>Skills Needed</span>
            </div>
            <div>
              <b-form-tag
                v-for="skill in form.needed_skills"
                @remove="removeTag(skill)"
                :key="skill"
                :title="skill"
                variant="purple-two"
                class="mr-1"
                >{{ skill }}
              </b-form-tag>
            </div>
          </el-card>
        </el-col>

        <el-col :span="6" :offset="4">
          <el-card class="box-card mission-card">
            <div slot="header" class="clearfix">
              <span>Roles Needed</span>
            </div>
            <div>
              <b-form-tag
                v-for="role in form.needed_roles"
                @remove="removeTag(role)"
                :key="role"
                :title="role"
                variant="purple-two"
                class="mr-1"
                >{{ role }}
              </b-form-tag>
            </div>
          </el-card>
        </el-col>
        <el-col :span="6" :offset="4">
          <el-card class="box-card mission-card mt-4">
            <div slot="header" class="clearfix">
              <span>Tags</span>
            </div>
            <div>
              <b-form-tag
                v-for="tag in form.tags"
                @remove="removeTag(tag)"
                :key="tag"
                :title="tag"
                variant="purple-two"
                class="mr-1"
                >{{ tag }}
              </b-form-tag>
            </div>
          </el-card>
        </el-col>
      </el-row>
      <b-button
        variant="purple-two"
        class="submitBtn mt-4"
        @click="submitMission()"
      >
        Submit
      </b-button>
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
  name: 'CreateMissionView',
  data () {
    return {
      active: 0,
      limit: 5,
      duplicateTags: [],
      form: {
        user_id: 0,
        title: '',
        description: '',
        tags: [],
        estimated_time: '',
        needed_skills: [],
        needed_roles: []
      }
    }
  },
  computed: {
    ...mapGetters({ user: 'getUserInfo' })
  },
  created () {
    this.form.user_id = this.user.user.id
  },
  methods: {
    ...mapActions(['createMission']),
    submitMission: function () {
      this.createMission(this.form)
        .then(() => {
          this.$notify({
            title: 'Mission Received',
            message: 'Mission was successfully created',
            type: 'success'
          })
          this.$router.push({ name: 'Dashboard' })
        })
        .catch(err => {
          console.log(err)
          this.$notify({
            title: 'Oops, something went wrong! ',
            message: 'Please try again',
            type: 'error'
          })
        })
    },
    onTagState (valid, invalid, duplicate) {
      this.validTags = valid
      this.invalidTags = invalid
      this.duplicateTags = duplicate
    },
    next () {
      if (this.active++ > 2) this.active = 0
    }
  }
}

</script>
