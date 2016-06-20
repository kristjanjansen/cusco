<template>

    <div class="NavbarMobile {{ isclasses }}">

        <div
            class="NavbarMobile__hamburger"
            v-if="menuClosed"
            @click="toggle()"
        >
        
            <component is="Icon" name="icon-menu" class="Icon Icon--white" vars="{}"></icon>
        
        </div>

        <div
            class="NavbarMobile__menu"
            v-else
            transition="fadeZoom"
        >

            <div class="NavbarMobile__close" @click="toggle()">×</div>

            <div class="NavbarMobile__links">

                <div class="NavbarMobile__link" v-for="link in vars.links">
                    
                    {{ link }}
                    
                </div>

                <div class="NavbarMobile__link" v-for="link in vars.sublinks">
                    
                    {{ link }}
                    
                </div>

            </div>

       </div>

   </div>

</template>

<script>

    import Component from '../Component';
    import Icon from '../Icon/Icon.vue';

    export default Component.extend({
        
        components: {
            Icon
        },

        methods: {
            
            toggle: function() {
                this.menuClosed = ! this.menuClosed
            }
        
        },

        data() {

           return {
               menuClosed: true
           }

       }

   })

</script>