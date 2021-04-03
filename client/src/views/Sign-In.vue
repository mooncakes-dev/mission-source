<template>
  <div class="register-card">
    <div class="header text-center m-5">
      <h4 class="mr-3">Welcome Back!</h4>
      <img src="../assets/icons/ufo.svg" />
    </div>
    <b-card title="" tag="article" style="max-width: 25rem" class="mx-auto">
      <b-form @submit.prevent="login">
        <b-form-group
          id="email-group"
          label="Email address:"
          label-for="email-input"
        >
          <b-form-input
            id="email-input"
            v-model="email"
            type="email"
            required
            placeholder=""
          ></b-form-input>
        </b-form-group>

        <b-form-group
          id="password-group"
          label="Password"
          label-for="password-input"
        >
          <b-form-input
            id="password-input"
            v-model="password"
            required
            placeholder=""
            type="password"
          ></b-form-input>
        </b-form-group>
        <b-button type="submit" variant="purple-one">Sign In</b-button>
      </b-form>
    </b-card>
    <div class="text-center m-5">
      <b-button to="/sign-up" variant="link">Sign Up</b-button>
    </div>
  </div>
</template>

<script>

export default {
  data () {
    return {
      email: '',
      password: ''
    }
  },
  methods: {
    login () {
      this.$store
        .dispatch('login', {
          email: this.email,
          password: this.password
        })
        .then(() => {
          this.$router.push({ name: 'Dashboard' })
        })
        .catch(err => {
          console.log(err)
        })
    }
  }
}
</script>
