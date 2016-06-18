import Vue from 'vue';
import VueResource from 'vue-resource';
import { mixin as Clickaway } from 'vue-clickaway';

import Alert from './components/Alert/Alert.vue';
import AlertDemo from './components/AlertDemo/AlertDemo.vue';
import Arc from './components/Arc/Arc.vue';
import Editor from './components/Editor/Editor.vue';
import ImageUpload from './components/ImageUpload/ImageUpload.vue';
import Navbar from './components/Navbar/Navbar.vue';
import NavbarMobile from './components/NavbarMobile/NavbarMobile.vue';
import Promo from './components/Promo/Promo.vue';

const globalVars = JSON.parse(decodeURIComponent(
    document.querySelector('#globalvars').getAttribute('content')
));

Vue.use(VueResource);
Vue.http.headers.common['X-CSRF-TOKEN'] = globalVars.token;

new Vue({
    el: 'body',

    components: {
        Alert,
        AlertDemo,
        Arc,
        Editor,
        ImageUpload,
        Navbar,
        NavbarMobile,
        Promo,
    },

    events: {
      
        'alert': function (alert) { this.$broadcast('alert', alert) },
        'ImageUploaded': function () { this.$broadcast('ImageUploaded') }

    }, 

    ready() {
        this.$emit('alert', globalVars.alert)
    }

});