import Vue from 'vue';

export default Vue.extend({

    props: ['vars', 'isclasses'],

    ready() {

        this.vars = this.vars ? JSON.parse(decodeURIComponent(this.vars)) : {}

    }

})