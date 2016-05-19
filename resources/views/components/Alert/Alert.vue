<template>

<div class="Alert {{ modifiers }}" v-if="show" transition="fadeUp">

    <div class="Alert__title">
        {{ variables.title }}
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
            return { show: true };
        },

    })

</script>