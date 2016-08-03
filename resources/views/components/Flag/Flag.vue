<template>

    <div class="Flag" :class="isclasses">

        <component is="Icon" name="icon-thumb-up" @click="toggleFlag('good')" width="32px" height="32px"></component>

        <div class="Flag__value">{{ good }}</div>
        
        <component is="Icon" name="icon-thumb-down" @click="toggleFlag('bad')" width="32px" height="32px"></component>

        <div class="Flag__value">{{ bad }}</div>

    </div>

</template>

<script>

import Icon from '../Icon/Icon.vue'


 export default {

     components: {
        Icon
    },
    props: {
        isclasses: { default: '' },
        good_value: { default: 0 }, // Initial value from PHP
        bad_value: { default: 0 }, // Initial value from PHP
    },
    data: function() {
        return {
            good: 0, // Internal state
            bad: 0   // Internal state
        }
    },
    // When component is loaded, set the internal states from initial values
    ready() {
        this.good = this.good_value 
        this.bad = this.bad_value
    },
    methods: {
        toggleFlag: function(flagType) {
    
            // When flag is toggled, make an ajax request to PHP to submit a new value
            // When 'good' value is 0 When user click on 'good' icon, we send this JSON:
            //
            //     {value: 1}
            //
            // to this URL:
            //
            //    /flag/toggle/good
            //
            // and will get this back
            //
            //    {value: 2}
            this.$http.post('/flag/toggle/' + flagType, { value: this[flagType]})
                .then(function(res) {
                
                    // ..backend sends back the new value back and we assign it to
                    // internal state
                    // In out case
                    //
                    //    this.good = 2
                    this[flagType] = res.data.value
                })
        }
    }
}

</script>
