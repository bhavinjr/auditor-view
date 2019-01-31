import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router);

export default new Router({
	routes: [
		{
            path: '/',
            redirect: '/dashboard',
        },
        {
            path: '/dashboard',
            component: require('./pages/Dashboard.vue'),
        },
        {
            path: '/detail',
            redirect: '/dashboard',
        },
        {
            path: '/detail/:logId',
            name: 'log.detail',
            component: require('./pages/Log/Details.vue'),
            props: true,
        },
	]
})