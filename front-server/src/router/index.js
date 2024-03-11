import { createRouter, createWebHistory } from 'vue-router'
import ClientView from '../views/ClientView.vue';
import StatistiqueView from '../views/StatistiqueView.vue';
import InterventionView from '../views/InterventionView.vue';
import TechnicienView from '../views/TechnicienView.vue';
import ConnexionView from '../views/ConnexionView';
import Detail_Inter from '../views/Detail_Inter';
import ClientDetailsView from '../views/ClientDetailsView'

const routes = [
  { 
    path: '/client', 
    name: 'client', 
    component: ClientView 
  },

  { 
    path: '/client/:numeroClient',
    name: 'ClientDetails', 
    component: ClientDetailsView
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
    path: '/Detail_Inter',
    name: 'detail_inter',
    component: Detail_Inter
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
