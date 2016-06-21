<template>

    <div class="NavbarMobile" :class="isclasses">

        <div
            class="NavbarMobile__hamburger"
            v-if="menuClosed"
            @click="toggle()"
        >
        
            <component is="Icon" name="icon-menu"></component>
        
        </div>

        <div
            v-else
            class="NavbarMobile__menu"
            transition="fadeZoom"
        >

            <div class="NavbarMobile__close" @click="toggle()">×</div>

            <div class="NavbarMobile__links">

                <div class="NavbarMobile__link" v-for="link in links">
                    
                    {{ link }}
                    
                </div>

                <div class="NavbarMobile__link" v-for="link in sublinks">
                    
                    {{ link }}
                    
                </div>

            </div>

       </div>

   </div>

</template>

<script>

    import Icon from '../Icon/Icon.vue';

    export default {
        
        components: {
            Icon
        },

        props: {
            isclasses: { default: ''},
            links: { type: Array, default: function() { return [] } },
            sublinks: { type: Array, default: function() { return [] } }
        },

        data() {
           return {
               menuClosed: true
           }
        },

        methods: {
           toggle: function() {
               this.menuClosed = ! this.menuClosed
           }
        },

        ready() {
            console.log(this.links)
        }

    }

</script>