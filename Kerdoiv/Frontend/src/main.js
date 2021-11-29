import { createApp } from 'vue'
import App from './App.vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import router from './router'
import PrimeVue from 'primevue/config';
import 'primevue/resources/primevue.min.css'
import 'primevue/resources/themes/bootstrap4-light-blue/theme.css'
import 'primeicons/primeicons.css'
import Vuex from 'vuex'
import createPersistedState from 'vuex-persistedstate'



const store = new Vuex.Store({
  plugins: [createPersistedState({
        storage: window.sessionStorage,
  })],
  state: {
    user: null,
    is_admin: false,
    access_token: ""
  },
  
  mutations: {
    setUserData (state, userData) {
      state.user = userData;
      state.is_admin = userData.user.is_admin == 1;
      state.access_token = userData.token;
      //localStorage.setItem('user', JSON.stringify(userData))
      //axios.defaults.headers.common.Authorization = `Bearer ${userData.token}`;
    },
    setAccessToken (state, accessToken) {
      state.access_token = accessToken;
    },

    clearUserData (state) {
      //localStorage.removeItem('user')
      //sessionStorage.clear();
      state.user = null;
      state.is_admin = false;
      state.access_token = null;
      location.reload();
    }
  },

  actions: {
    /*login ({ commit }, credentials) {
      return axios
        .post('/login', credentials)
        .then(({ data }) => {
          commit('setUserData', data)
        })
    },*/

    logout ({ commit }) {
      commit('clearUserData')
    }
  },

  getters : {
    isLogged: state => !!state.user,
    access_token: state => state.access_token
  }
})

router.beforeEach((to, from, next) => { 
    if (to.matched.some(record => record.meta.is_admin_page)) { 
        // this route requires condition to be accessed
        // if not, redirect to home page. 
        if (!store.state.is_admin) { 
            //check codition is false
            next({ path: '/'}) 
        } else { 
            //check codition is true
            next() 
        } 
    } else { 
        next() // make sure to always call next()! 
    } 
}) 

export default function axiosSetUp() {
  axios.defaults.baseURL = "<http://127.0.0.1:8000/api/>";
  axios.interceptors.request.use(
    function(config) {
      const token = store.getters.access_token;
      if (token) {
        config.headers.Authorization = `Bearer ${token}`;
      } else {
        config.headers.Authorization = `Bearer`;
      }
      return config;
    },
    function(error) {
      alert(error);
      return Promise.reject(error);
    }
  );
}

axiosSetUp();

const app = createApp(App).use(router)
app.use(VueAxios, axios)
app.use(Vuex)
app.use(store)
app.use(PrimeVue);
app.config.globalProperties.axios=axios

//var access_token = store.state.access_token;
//alert(access_token);
//axios.defaults.headers.common.Authorization = `Bearer ${access_token}`;

//const app = createApp(App).use(router)
//app.use(VueAxios, axios)
//app.use(store)
//app.use(PrimeVue);
//app.config.globalProperties.axios=axios
app.mount('#app')

