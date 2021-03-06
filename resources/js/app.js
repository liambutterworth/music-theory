import Axios from 'axios';
import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import routes from 'routes';
import modules from 'modules';

Vue.use(VueRouter);
Vue.use(Vuex);

Vue.prototype.$api = Axios.create({
    baseURL: 'http://localhost:8080/api/',

    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
    },
});

export const router = new VueRouter({
    routes,
});

export const store = new Vuex.Store({
    modules,
});

export const app = new Vue({
    router,
    store,
}).$mount('#app');
