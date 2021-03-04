import Vue from 'vue';
import VueRouter from 'vue-router';
import Axios from 'axios';
import routes from 'js/routes';

Vue.prototype.$api = Axios.create({
    baseURL: 'http://localhost:8080/api/',

    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
    },
});

Vue.use(VueRouter);

export default new Vue({
    router: new VueRouter({
        mode: 'history',
        routes: routes,
    }),
}).$mount('#app');
