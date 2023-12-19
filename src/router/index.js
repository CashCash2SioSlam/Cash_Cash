import { createRouter, createWebHistory } from 'vue-router'

import HomeView from '../views/HomeView.vue'
import ClientView from '../views/ClientView.vue';
import StatistiqueView from '../views/StatistiqueView.vue';
import InterventionView from '../views/InterventionView.vue';
import TechnicienView from '../views/TechnicienView.vue';

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  { 
    path: '/client', 
    name: 'client', 
    component: ClientView 
  },
  { 
    path: '/statistique', 
    name: 'statistique',
    component: StatistiqueView 
  },
  { 
    path: '/intervention',
    name: 'intervention', 
    component: InterventionView 
  },
  { 
    path: '/technicien', 
    name: 'technicien', 
    component: TechnicienView 
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
