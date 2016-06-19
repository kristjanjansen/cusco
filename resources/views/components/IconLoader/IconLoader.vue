<template>

    <div v-show="false">{{{ svg }}}</div>

</template>

<script>

    import Component from '../Component';

    export default Component.extend({

        data: function() {
            return {
                svg: {}
            }
        },

        ready() {
            this.$http.get('/svg/main.svg').then(function(res) {
                this.svg = res.data
            });
        }

    })

</script>