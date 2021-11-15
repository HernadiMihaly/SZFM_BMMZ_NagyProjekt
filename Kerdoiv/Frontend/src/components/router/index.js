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
    path: '/about',
    name: 'About',
    component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
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
    component: () => KerdoivSzerkesztes
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
