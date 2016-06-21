<template>

<div class="Alert {{ isclasses }}" v-if="show" transition="fadeCollapse">

    <div class="Alert__title">
        {{ alert }}
    </div>

    <div class="Alert__close" @click="show = false">
        ×
    </div>

</div>

</template>

<script>

    import Component from '../Component';

    export default Component.extend({

        data() {
            
            return {
                alert: '',
                show: false,
            };
        
        },

        events: {
          
            'alert': function (alert) {
                this.alert = alert
                this.show = true
                this.hide()
            }

        },

        methods: {

            'hide': function() { setTimeout(() => this.show = false, 2000) }
        
        }

    })

</script>