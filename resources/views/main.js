import Vue from 'vue';
import VueResource from 'vue-resource';

import Alert from './components/Alert/Alert.vue';
import Promo from './components/Promo/Promo.vue';

Vue.use(VueResource);

new Vue({
    el: 'body',

    components: {
        Alert, Promo
    },

});