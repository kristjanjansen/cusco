<template>

<div class="greeting">

    Hello, {{ variables.type }}!

</div>

</template>

<script>

    export default {

        props: ['variables'],

        data() {
            return {};
        },

        ready() {
            this.variables = JSON.parse(decodeURIComponent(this.variables))
        }

    }

</script>