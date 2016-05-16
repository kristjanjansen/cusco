<template>

<div class="Alert {{ modifiers }}">

    {{ variables.title }}

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