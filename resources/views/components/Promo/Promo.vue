<template>

<div class="DynamicDisplay" :style="style" >

    <div class="DynamicDisplay__title">

        {{ images[0].title }}

    </div>

</div>

</template>

<script>

    import Component from '../Component';

    export default Component.extend({

        computed: {
            style: function() {
                return { backgroundImage: 'url(' + this.images[0].image + ')' }
            }
        },

        data: function() {
            return {
                images: []
            }
        },

        ready() {
            this.$http.get('/promo').then(function(res) {
                //this.images = res.data
            });
        }

    })

</script>