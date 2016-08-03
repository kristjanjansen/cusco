<template>

    <div class="Flag" :class="isclasses">

    <a href="{{ good_route }}" @click ="{{ good_value++ }}">

        <component is="Icon" name="icon-thumb-up"></component>

    </a>

    <div class="value">{{ good_value }}</div>
    
    <a href="{{ bad_route }}" @click ="{{ bad_value++ }}>
        <component is="Icon" name="icon-thumb-down"></component>
    </a>

    <div class="value">{{ bad_value }}</div>
    
    </div>

</template>

<script>

    export default {

        props: {
            isclasses: { default: '' },
            title: { default: 'Flag' },
            good_route: { default: '#' },
            bad_route: { default: '#' },
            good_value: { default: 0 },
            bad_value: { default: 0 },
        },

        data() {
            return {
                message: 'from Vue'
            }
        }

    }

</script>
