import Vue from 'vue';
import axios from 'axios'
import moment from 'moment';
import router from './router';
import App from './components/App.vue';

window.$ = window.jQuery = require('jquery');

require('bootstrap');

$('body').tooltip({
    selector: '[data-toggle=tooltip]'
});

Vue.prototype.$http = axios.create();

Vue.component('loader', require('./components/Loader.vue'));

Vue.config.errorHandler = function (err, vm, info) {
    console.error(err);
};

Vue.filter('truncate', function (text, stop, clamp) {
    return text.slice(0, stop) + (stop < text.length ? clamp || '...' : '')
})

new Vue({
    el: '#root',

    router,

    /**
     * The component's data.
     */
    data() {
        return {}
    },

    render: h => h(App),
});