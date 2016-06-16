import Vue from 'vue';
import VueResource from 'vue-resource';
import { mixin as Clickaway } from 'vue-clickaway';

import Alert from './components/Alert/Alert.vue';
import Editor from './components/Editor/Editor.vue';
import Navbar from './components/Navbar/Navbar.vue';
import NavbarMobile from './components/NavbarMobile/NavbarMobile.vue';
import Promo from './components/Promo/Promo.vue';

Vue.use(VueResource);

new Vue({
    el: 'body',

    components: {
        Alert,
        Editor,
        Navbar,
        NavbarMobile,
        Promo
    },

});