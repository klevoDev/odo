import { createApp } from 'vue'
import App from './App.vue'
import router from './router'

import './scss/style.scss'
import './../node_modules/toastr/build/toastr.min.css'

const app = createApp(App)

app.use(router)

app.mount('#app')
