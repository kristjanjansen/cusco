<template>

    <div @click="showAlert()" class="Button">

        <div class="Button__title">
            
            Show alerts

        </div>

    </div>

</template>

<script>

    import Component from '../Component';

    export default Component.extend({

        methods: {

            'showAlert': function() {
                this.$dispatch('alert', 'Hello from JS')
            }
        
        }

    })

</script>