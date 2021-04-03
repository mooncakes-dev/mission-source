<template>
  <div class="register-card">
    <div class="header text-center m-5">
      <h4 class="mr-3">Join The Crew</h4>
      <img src="../assets/icons/ufo.svg" />
    </div>
    <b-card title="" tag="article" style="max-width: 25rem" class="mx-auto">
      <b-form @submit.prevent="register">
        <b-form-group
          id="name-group"
          label="Pick a username:"
          label-for="name-input"
        >
          <b-form-input
            id="name-input"
            v-model="name"
            type="text"
            required
            placeholder="Enter a username"
          ></b-form-input>
        </b-form-group>

        <b-form-group
          id="email-group"
          label="Email address:"
          label-for="email-input"
          description="We'll never share your email with anyone else."
        >
          <b-form-input
            id="email-input"
            v-model="email"
            type="email"
            required
            placeholder="Enter email"
          ></b-form-input>
        </b-form-group>

        <b-form-group
          id="password-group"
          label="Create password"
          label-for="password-input"
        >
          <b-form-input
            id="password-input"
            v-model="password"
            required
            placeholder="Password"
            type="password"
          ></b-form-input>
        </b-form-group>
        <b-form-group
          id="repeat-password-group"
          label="Repeat password"
          label-for="repeat-password-input"
        >
          <b-form-input
            id="repeat-password-input"
            v-model="password_confirmation"
            required
            placeholder="Repeat Password"
            type="password"
          ></b-form-input>
        </b-form-group>
        <b-form-group
          id="collge-group"
          label="Your college"
          label-for="college-input"
        >
          <b-form-input
            id="college-input"
            v-model="college"
            required
            placeholder="Your college (eg. CECH, DAAP, etc)"
          ></b-form-input>
        </b-form-group>
        <b-form-group
          id="major-group"
          label="Your major"
          label-for="major-input"
        >
          <b-form-input
            id="major-input"
            v-model="major"
            required
            placeholder="Your major"
          ></b-form-input>
        </b-form-group>
        <b-button type="submit" variant="purple-one">Sign Up</b-button>
      </b-form>
    </b-card>
    <div class="text-center m-5">
      <b-button type="submit" variant="link" to="/sign-in">Sign In</b-button>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      components: {
      },
      name: '',
      email: '',
      password: '',
      password_confirmation: '',
      college: '',
      major: '',
      show: true
    }
  },
  methods: {
    register () {
      this.$store
        .dispatch('register', {
          name: this.name,
          email: this.email,
          password: this.password,
          password_confirmation: this.password_confirmation,
          college: this.college,
          major: this.major
        })
        .then(() => {
          this.$router.push({ name: 'Sign In' })
        })
        .catch(err => {
          console.log(err)
        })
    }
  }
}
</script>
