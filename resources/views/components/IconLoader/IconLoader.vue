<template>

    <div v-show="false">{{{ svg }}}</div>

</template>

<script>

    import Component from '../Component';

    export default Component.extend({

        props: ['route'],

        data: function() {
            return {
                svg: {}
            }
        },

        ready() {
            this.$http.get(this.route).then(function(res) {
                this.svg = res.data
            });
        }

    })

</script>