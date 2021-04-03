<template>
  <el-card class="stats-card"> {{ value }} {{ name }}</el-card>
</template>

<script>
export default {
  name: 'StatsCard',
  props: {
    value: Number,
    name: String
  }
}
</script>
