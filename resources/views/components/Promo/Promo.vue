<template>

    <div class="Promo" :class="isclasses" :style="style" >

        <div class="Promo__title">

            {{ promo.title }}

        </div>

    </div>

</template>

<script>

    export default {

        props: {
            isclasses: { default: ''},
            route: { default: '' }
        },

        computed: {
            style: function() {
                return { backgroundImage: `
                    linear-gradient(
                        rgba(255, 128, 0, 0.5),
                        rgba(255, 128, 0, 0.5)
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
            this.$http.get(this.route).then(function(res) {
                this.promo = res.data
            });
        }

    }

</script>