import { createRouter, createWebHistory } from 'vue-router'
import ClientView from '../views/ClientView.vue';
import StatistiqueView from '../views/StatistiqueView.vue';
import InterventionView from '../views/InterventionView.vue';
import TechnicienView from '../views/TechnicienView.vue';
import ConnexionView from '../views/ConnexionView';

const routes = [
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
  {
    path: '/connexion',
    name: 'connexion',
    component: ConnexionView

  },

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
