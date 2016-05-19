<template>

<div class="DynamicDisplay" :style="style" >

    <div class="DynamicDisplay__title">

        {{ variables.title }}

    </div>

</div>
    
    {{ style | json }}

</template>

<script>

    export default {

        props: ['variables', 'modifiers'],

        computed: {
            style: function() {
                return { backgroundImage: 'url(' + this.variables.image + ')' }
            }
        },

        ready() {
            this.variables = JSON.parse(decodeURIComponent(this.variables))
        }

    }

</script>