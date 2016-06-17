<template>

<div class="Alert {{ isclasses }}" v-if="show" transition="fadeCollapse">

    <div class="Alert__title">
        {{ alert || vars.title }}
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
                show: false,
                alert: ''
            };
        },

        events: {
          
            'alert': function (alert) {
                
                this.alert = alert
                this.show = true
            
            }

        }

    })

</script>