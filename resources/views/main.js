import Vue from 'vue';
import VueResource from 'vue-resource';
import { mixin as Clickaway } from 'vue-clickaway';

import Alert from './components/Alert/Alert.vue';
import Promo from './components/Promo/Promo.vue';
import Navbar from './components/Navbar/Navbar.vue';
import NavbarMobile from './components/NavbarMobile/NavbarMobile.vue';

Vue.use(VueResource);

new Vue({
    el: 'body',

    components: {
        Alert, Promo, Navbar, NavbarMobile
    },

});