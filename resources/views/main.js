import Vue from 'vue';
import VueResource from 'vue-resource';

import Alert from './components/Alert/Alert.vue';
import DynamicDisplay from './components/DynamicDisplay/DynamicDisplay.vue';
import Ahaa2 from './components/Ahaa2/Ahaa2.vue';

Vue.use(VueResource);

new Vue({
    el: 'body',

    components: {
        Alert, DynamicDisplay, Ahaa2
    },

});