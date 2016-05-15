<template>

<div class="Alert {{ modifiers }}">

    Hello, {{ variables.type }}!!

</div>

</template>

<script>

    export default {

        props: ['variables', 'modifiers'],

        data() {
            return {};
        },

        ready() {
            this.variables = JSON.parse(decodeURIComponent(this.variables))
        }

    }

</script>