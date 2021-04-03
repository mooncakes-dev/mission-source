<template>
  <div>
    <b-col class="m-0 vh-100 bg-purple-one main">
      <HomeNavBar />
      <b-row class="w-50 m-0 float-right">
        <div id="introWrapper" class="text-purple-one w-100 float-right">
          <div class="content-container float-right mb-5 mt-5">
            <h1 class="display-2 text-center font-weight-bold text-beige mt-5">
              Mission Source
            </h1>
            <br /><br />
            <h1 class="text-center text-beige">
              Create a New Mission <br />
              in 3 Easy Steps!
            </h1>
            <br /><br />
            <ul class="list-unstyled w-100">
              <li class="text-purple-one home">Pick Your Supplies</li>
              <li class="text-purple-one home">Find Your Fuel</li>
              <li class="text-purple-one home">Commence Countdown</li>
            </ul>
            <br />
            <h1 class="text-center text-beige">
              View Our <br />
              Features Below!
            </h1>
          </div>
        </div>
      </b-row>
      <img
        v-rellax="{ speed: 14 }"
        src="../assets/icons/homepage/rocket.svg"
        class="rocket ml-5"
      />
    </b-col>
    <b-col class="wave w-100"></b-col>
    <b-col class="white-space w-100"></b-col>
    <div class="card-stack">
      <b-col class="bg-white text-purple-one cards pb-3">
        <h5 class="text-uppercase text-center">
          With features you need for your next project...
        </h5>
        <h2 class="text-uppercase text-center">
          See what Mission Source has to offer!
        </h2>
        <b-row class="mt-5">
          <b-col-sm-6 class="m-2 features">
            <div class="card border-white text-center">
              <div class="card-body">
                <img
                  src="../assets/icons/homepage/mission-creation.svg"
                  class="mb-4"
                />
                <h5 class="card-title">Mission Creation</h5>
                <p class="card-text">
                  Create new projects visible to other students at only your
                  university!
                </p>
              </div>
            </div>
          </b-col-sm-6>

          <b-col-sm-6 class="m-2 features">
            <div class="card border-white text-center">
              <div class="card-body">
                <img src="../assets/icons/homepage/verified.svg" class="mb-4" />
                <h5 class="card-title">Verified Userbase</h5>
                <p class="card-text">
                  With a location centered userbase, you can be sure that other
                  users are coming from your university.
                </p>
              </div>
            </div>
          </b-col-sm-6>

          <b-col-sm-6 class="m-2 features">
            <div class="card border-white text-center">
              <div class="card-body">
                <img src="../assets/icons/homepage/dm.svg" class="mb-4" />
                <h5 class="card-title">Direct Messaging</h5>
                <p class="card-text">
                  If you have questions, get in contact with other users in real
                  time with our messaging tool.
                </p>
              </div>
            </div>
          </b-col-sm-6>
        </b-row>

        <b-row class="mt-auto">
          <b-col-sm-6 class="m-2 features">
            <div class="card border-white text-center">
              <div class="card-body">
                <img src="../assets/icons/homepage/trophy.svg" class="mb-4" />
                <h5 class="card-title">Mission Accomplishments</h5>
                <p class="card-text">
                  Climb the rankings and reach new heights with our project
                  based points system!
                </p>
              </div>
            </div>
          </b-col-sm-6>

          <b-col-sm-6 class="m-2 features">
            <div class="card border-white text-center">
              <div class="card-body">
                <img
                  src="../assets/icons/homepage/portfolio.svg"
                  class="mb-4"
                />
                <h5 class="card-title">Build Your Portfolio</h5>
                <p class="card-text">
                  By completing missions, you are one step closer to having a
                  stronger portfolio to show off your hard work!
                </p>
              </div>
            </div>
          </b-col-sm-6>

          <b-col-sm-6 class="m-2 features">
            <div class="card border-white text-center">
              <div class="card-body">
                <img
                  src="../assets/icons/homepage/calculator.svg"
                  class="mb-4"
                />
                <h5 class="card-title">Ratings System</h5>
                <p class="card-text">
                  When done with a project, leave a rating to help other users
                  get a gauge on how that person works with a team!
                </p>
              </div>
            </div>
          </b-col-sm-6>
        </b-row>
      </b-col>
      <b-col class="white-space w-100"></b-col>
    </div>
    <footer id="footer"></footer>
  </div>
</template>

<script>
// @ is an alias to /src
import HomeNavBar from '@/components/core/HomeNavBar'
export default {
  name: 'Home',
  components: {
    HomeNavBar
  }
}
</script>
