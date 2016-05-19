var Vue = require('vue');

import Alert from './components/Alert/Alert.vue';
import DynamicDisplay from './components/DynamicDisplay/DynamicDisplay.vue';

new Vue({
    el: 'body',

    components: {
        Alert, DynamicDisplay
    },

});