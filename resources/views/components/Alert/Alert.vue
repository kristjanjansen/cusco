<template>

<div v-if="show" class="Alert {{ modifiers }}">

    <div class="Alert__title">
        {{ variables.title }}
    </div>

    <div class="Alert__close" @click="show = false">
        ×
    </div>

</div>

</template>

<script>

    export default {

        props: ['variables', 'modifiers'],

        data() {
            return { show: true };
        },

        ready() {
            this.variables = JSON.parse(decodeURIComponent(this.variables))
        }

    }

</script>