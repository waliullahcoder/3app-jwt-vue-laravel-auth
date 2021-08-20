
require('./bootstrap');

window.Vue = require('vue').default;


Vue.component('front-master-component', require('./components/App.vue').default);

import router from './router/router'
import store from './store'
import ElementUI from 'element-ui'
import locale from 'element-ui/lib/locale/lang/en'
import 'element-ui/lib/theme-chalk/index.css';

import moment from 'moment';

Vue.filter('formatDate', function(value) {
    if (value) {
        //return moment(String(value)).format('MM/DD/YYYY hh:mm')
         return moment(String(value)).format('MMM-d, yyy')
    }
});

Vue.use(ElementUI, { locale })
//page reload
window.Render = new Vue();

const app = new Vue({
    el: '#app',
    router,
    store,
    data: {
        test: 'Test Data'
    }
});
