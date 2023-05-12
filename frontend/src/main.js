import './assets/main.css'

import {createApp} from 'vue'
import App from './App.vue'
import router from './router'
import {createPinia} from 'pinia'

import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'

const app = createApp(App)

app
  .use(router)
  .use(createPinia())

app
  .component('font-awesome-icon', FontAwesomeIcon)
  .mount('#app')
