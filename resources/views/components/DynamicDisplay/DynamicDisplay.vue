<template>

<div :style="style" >

    <div class="DynamicDisplay__title">

        {{ variables.title }}

    </div>

</div>

</template>

<script>

    import Component from '../Component';

    export default Component.extend({

        data() {
            return { 
                style: {
                    backgroundImage: 'url(http://www.writecamp.org/writecamp//files/copy_images/Vd3MJo.jpg)' 
                }
            }
        }
    
    })

</script>