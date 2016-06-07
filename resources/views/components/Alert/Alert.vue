<template>

<div class="Alert {{ isclasses }}" v-if="show" transition="fadeUp">

    <div class="Alert__title">
        {{ vars.title }}
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