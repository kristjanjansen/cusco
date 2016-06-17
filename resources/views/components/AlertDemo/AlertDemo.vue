<template>

    <div @click="showAlert()">

        Show alerts

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