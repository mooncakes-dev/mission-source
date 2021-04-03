<template>
  <b-modal id="rate-modal" title="Rate user">
    <b-form @submit.prevent="submit" :model="review">
      <b-form-group id="title-group" label="Title" label-for="title-input">
        <b-form-input
          id="title-input"
          v-model="review.title"
          type="text"
          required
          placeholder=""
        ></b-form-input>
      </b-form-group>

      <b-form-group
        id="body-group"
        label="Review Description"
        label-for="body-input"
      >
        <b-form-textarea
          id="body-input"
          v-model="review.body"
          required
          placeholder=""
          rows="3"
          max-rows="6"
        ></b-form-textarea>
      </b-form-group>

      <b-form-group
        id="rating-group"
        label="Star Rating"
        label-for="rating-input"
      >
        <b-form-rating v-model="review.rating" required></b-form-rating>
      </b-form-group>
    </b-form>
    <template #modal-footer>
      <b-button
        type="submit"
        @click="submitReview(), $bvModal.hide('rate-modal')"
        variant="purple-one"
      >
        Submit Review
      </b-button>
    </template>
  </b-modal>
</template>

<script>
import { mapActions } from 'vuex'

export default {
  name: 'RateModal',
  data () {
    return {
      review: {
        title: '',
        body: '',
        rating: ''
      }
    }
  },

  methods: {
    ...mapActions(['createReview']),
    submitReview: function () {
      this.createReview(this.review)
        .then(() => {
          this.$notify({
            title: 'Review Submitted',
            message: 'Your review has been submitted',
            type: 'success'
          })
        })
        .catch(err => {
          console.log(err)
          this.$notify({
            title: 'Oops, something went wrong! ',
            message: 'Please try again',
            type: 'error'
          })
        })
    }
  }
}
</script>
