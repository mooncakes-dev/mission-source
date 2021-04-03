<template>
  <el-card class="mb-2 mt-4 mission-card" style="max-width: 50rem">
    <div slot="header" class="clearfix">
      <router-link :to="{ name: 'Mission', params: { id: id } }" :key="id">
        <span> {{ title }}</span>
      </router-link>
      <el-button
        icon="el-icon-message"
        circle
        size="small"
        style="float: right"
        class="ml-3"
      ></el-button>
      <el-button
        icon="el-icon-star-off"
        circle
        size="small"
        style="float: right"
        class="ml-3"
      ></el-button>
    </div>
    <div>
      {{ description }}
      <div class="--tags-section mt-2">
        <b-form-tag
          v-for="tag in tags"
          :key="tag"
          no-remove="true"
          variant="purple-two"
          class="mr-2"
          >{{ tag }}
        </b-form-tag>
      </div>
    </div>
  </el-card>
</template>

<script>

export default {
  name: 'MissionCard',
  props: {
    id: Number,
    title: String,
    description: String,
    tags: Array
  }
}
</script>
