<template>

    <svg
        class="Icon"
        :class="isclasses"
        :style="{ width: width, height: height, fill: color }"
    >
        <use xlink:href="#{{ name }}"></use>

    </svg>

</template>

<script>

    export default {

        props: {
            isclasses: { default: ''},
            width: { default: 18},
            height: { default: 18},
            name: { default: ''},
            color: { default: 'red'}
        }

    }

</script>