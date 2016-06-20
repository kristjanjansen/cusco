<template>

    <svg
        class="Icon {{ isclasses }}"
        :style="{
            width: vars.width,
            height: vars.height 
        }"
    >
        <use xlink:href="#{{ vars.name || name }}"></use>

    </svg>

</template>

<script>

    import Component from '../Component';

    export default Component.extend({

        props: ['name', 'width', 'height']

    })

</script>