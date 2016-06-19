<template>

    <svg>

        <use xlink:href="/svg/main.svg#{{ vars.name || name }}"></use>

    </svg>

</template>

<script>

    import Component from '../Component';

    export default Component.extend({

        props: ['name']

    })

</script>