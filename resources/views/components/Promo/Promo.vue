<template>

<div class="Promo" :style="style" >

    <div class="Promo__title">

        {{ promo.title }}

    </div>

</div>

</template>

<script>

    import Component from '../Component';

    export default Component.extend({

        computed: {
            style: function() {
                return { backgroundImage: `
                    linear-gradient(
                        rgba(0, 0, 0, 0.5),
                        rgba(0, 0, 0, 0.5)
                    ), url(${ this.promo.image })
                `}
            }
        },

        data: function() {
            return {
                promo: {}
            }
        },

        ready() {
            this.$http.get('/promo').then(function(res) {
                this.promo = res.data
            });
        }

    })

</script>