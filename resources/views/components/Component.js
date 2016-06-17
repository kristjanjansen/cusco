import Vue from 'vue';

export default Vue.extend({

    props: ['vars', 'isclasses'],

    ready() {

        this.vars = JSON.parse(decodeURIComponent(this.vars))
    
    }

})