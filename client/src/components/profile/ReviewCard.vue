<template>
  <el-card class="box-card mb-2 mt-4 mission-card" style="max-width: 35rem">
    <div slot="header" class="clearfix">
      <span> {{ title }}</span>
      <el-rate v-model="rating" text-color="#f78477"> </el-rate>
    </div>
    <div>
      {{ body }}
      <div class="--posted-date-section">
        <p class="text-muted mt-2">Posted on {{ created_at | formatDate }}</p>
      </div>
    </div>
  </el-card>
</template>

<script>
export default {
  name: 'ReviewCard',
  props: {
    id: Number,
    title: String,
    body: String,
    rating: Number,
    created_at: String
  }
}
</script>
