<template>

    <svg
        :style="{
            width: vars.size || 48,
            height: vars.height || 48 
        }"
        class="Icon {{ isclasses }}">

        <use xlink:href="#{{ vars.name || name }}"></use>

    </svg>

</template>

<script>

    import Component from '../Component';

    export default Component.extend({

        props: ['name']

    })

</script>