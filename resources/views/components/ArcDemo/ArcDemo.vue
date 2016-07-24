<template>

    <component is="Arc" :size="size" :border="border" :endangle="endangle"></component>

    <div style="font-family: monospace; color: #ccc; padding: 0.5em 0;">size: {{ size }}</div>
    <input type="range" v-model="size" min="16" max="256">
   
    <div style="font-family: monospace; color: #ccc; padding: 0.5em 0;">border: {{ border }}</div>
    <input type="range" v-model="border" min="1" max="50">
    
    <div style="font-family: monospace; color: #ccc; padding: 0.5em 0;">endangle: {{ endangle }}</div>
    <input type="range" v-model="endangle" min="1" max="360">

</template>

<script>

    import Arc from '../Arc/Arc.vue'

    export default {

        components: {
            Arc
        },

        data() {
            return {
                size: 64,
                border: 5,
                endangle: 180
            }
        }

    }

</script>