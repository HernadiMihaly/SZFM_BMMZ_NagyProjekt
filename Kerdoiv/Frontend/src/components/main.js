import { createApp } from 'vue'
import App from './App.vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import router from './router'
import PrimeVue from 'primevue/config';
import 'primevue/resources/primevue.min.css'
import 'primevue/resources/themes/bootstrap4-light-blue/theme.css'
import 'primeicons/primeicons.css'

const app = createApp(App).use(router)
app.use(VueAxios, axios)
app.use(PrimeVue);
app.config.globalProperties.axios=axios
app.mount('#app')
