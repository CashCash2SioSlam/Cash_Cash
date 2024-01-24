import { createApp } from 'vue'
import App from './App.vue'
import '@fortawesome/fontawesome-free/css/all.css';


// add this
import './index.css'

import router from './router'

createApp(App).use(router).mount('#app');