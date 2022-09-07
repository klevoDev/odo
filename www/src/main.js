import { createApp } from 'vue'
import App from './App.vue'
import router from './router'

import './assets/style.css'
import './../node_modules/toastr/build/toastr.min.css'

const app = createApp(App)

app.use(router)

app.mount('#app')
