<template>

<div class="DynamicDisplay" :style="style" >

    <div class="DynamicDisplay__title">

        {{ variables.title }}

    </div>

</div>
    
</template>

<script>

    import Component from '../Component';

    export default Component.extend({

        computed: {
            style: function() {
                return { backgroundImage: 'url(' + this.variables.image + ')' }
            }
        }

    })

</script>