<template>

    <div @click="showAlert()" class="Button">

        <div class="Button__title">
            
            Show alerts

        </div>

    </div>

</template>

<script>

    export default {

        methods: {

            'showAlert': function() {
                this.$dispatch('showAlert', 'Hello from JS')
            }
        
        }

    }

</script>