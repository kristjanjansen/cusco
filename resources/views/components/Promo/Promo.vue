<template>

    <div
        class="Promo"
        :class="isclasses"
        :style="{ backgroundImage: 'url(' + image + ')'}"
    >

        <div class="Promo__title">

            {{ title }}

        </div>

    </div>

</template>

<script>

    export default {

        props: {
            isclasses: { default: ''},
            route: { default: '/promo' }
        },

        data: function() {
            return {
                title: '',
                image: ''
            }
        },

        ready() {
            this.$http.get(this.route).then(function(res) {
                this.title = res.data.title
                this.image = res.data.image
            });
        }

    }

</script>