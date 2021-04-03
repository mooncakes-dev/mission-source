import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import SignIn from '../views/Sign-In.vue'
import SignUp from '../views/Sign-Up.vue'
import Dashboard from '../views/Dashboard.vue'
import CreateMission from '../views/CreateMission.vue'
import ProfilePage from '../views/ProfilePage.vue'
import LikedMissions from '../views/LikedMissions.vue'
import MissionDetails from '../views/MissionDetails.vue'
import Inbox from '../views/Inbox.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    redirect: '/dashboard',
    name: 'Landing Page',
    component: Home
  },
  {
    path: '/sign-up',
    name: 'Sign Up',
    component: SignUp
  },
  {
    path: '/sign-in',
    name: 'Sign In',
    component: SignIn
  },
  {
    path: '/dashboard',
    name: 'Dashboard',
    component: Dashboard,
    meta: {
      auth: true
    }
  },
  {
    path: '/mission/:id',
    name: 'Mission',
    component: MissionDetails,
    meta: {
      auth: true
    }
  },
  {
    path: '/create-mission',
    name: 'Create Mission',
    component: CreateMission,
    meta: {
      auth: true
    }
  },
  {
    path: '/profile/:id',
    name: 'Profile',
    component: ProfilePage,
    meta: {
      auth: true
    }
  },
  {
    path: '/liked-missions',
    name: 'Liked Misisons',
    component: LikedMissions,
    meta: {
      auth: true
    }
  },
  {
    path: '/inbox',
    name: 'Your Inbox',
    component: Inbox,
    meta: {
      auth: true
    }
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

router.beforeEach((to, from, next) => {
  // eslint-disable-next-line no-undef
  const loggedIn = localStorage.getItem('user')

  if (to.matched.some(record => record.meta.auth) && !loggedIn) {
    next('/sign-in')
    return
  }
  next()
})

export default router
