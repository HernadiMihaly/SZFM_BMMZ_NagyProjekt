import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'
import ThankYou from '../views/ThankYou.vue'
import KerdoivKitoltes from '../views/KerdoivKitoltes.vue'
import KerdoivSzerkesztes from '../views/KerdoivSzerkesztes.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/login',
    name: 'Login',
    component: () => import(/* webpackChunkName: "login" */ '../views/Login.vue')
  },
  {
    path: '/register',
    name: 'Register',
    component: () => import(/* webpackChunkName: "login" */ '../views/Register.vue')
  },
  {
    path: '/listanswers',
    name: 'ListAnswers',
    component: () => import(/* webpackChunkName: "login" */ '../views/ListAnswers.vue')
  },
  {
    path: '/thankyou',
    name: 'ThankYou',
    component: ThankYou
  },
  {
    path: '/kerdoiv/:kerdoiv_id',
	name: 'kerdoiv',
    component: () => KerdoivKitoltes
  },
  {
    path: '/kerdoiv_szerkesztes/:kerdoiv_id',
	name: 'kerdoiv_szerkesztes',
    component: () => KerdoivSzerkesztes,
    meta:{is_admin_page:true}
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
