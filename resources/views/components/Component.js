import Vue from 'vue';

export default Vue.extend({

    props: ['variables', 'modifiers'],

    ready() {
        this.variables = JSON.parse(decodeURIComponent(this.variables))
    }

})