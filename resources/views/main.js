import Vue from 'vue';
import VueResource from 'vue-resource';

import Alert from './components/Alert/Alert.vue';
import Promo from './components/Promo/Promo.vue';
import Navbar2 from './components/Navbar2/Navbar2.vue';
import Navbar3 from './components/Navbar3/Navbar3.vue';

Vue.use(VueResource);

new Vue({
    el: 'body',

    components: {
        Alert, Promo, Navbar2, Navbar3
    },

});