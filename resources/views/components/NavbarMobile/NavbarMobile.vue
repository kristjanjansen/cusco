<template>

    <div class="NavbarMobile" :class="isclasses">

        <div
            class="NavbarMobile__hamburger"
            v-if="! menuOpen"
            @click="toggle()"
        >
        
            <component is="Icon" name="icon-menu" color="white"></component>
        
        </div>

        <div
            v-else
            class="NavbarMobile__menu"
            transition="fadeZoom"
        >

            <div class="NavbarMobile__close" @click="toggle()">
                
                <component is="Icon" name="icon-close" color="white"></component>

            </div>

            <div class="NavbarMobile__links">
       
                <a
                    v-for="link in links"
                    :href="link.route"
                    track-by="$index"
                >

                    <div class="NavbarMobile__link">
                        
                        {{ link.title }}
                        
                    </div>

                </a>

                <a
                    v-for="link in sublinks"
                    :href="link.route"
                    track-by="$index"
                >

                    <div class="NavbarMobile__link">
                        
                        {{ link.title }}
                        
                    </div>

                </a>

            </div>

       </div>

   </div>

</template>

<script>

    import Icon from '../Icon/Icon.vue'

    export default {
    
        components: {
            Icon
        },

        props: {
            isclasses: { default: '' },
            links: { default: '' },
            sublinks: { default: '' }
        },

        data() {
            return {
                menuOpen: false
            }
        },

        methods: {
            toggle: function() {
                this.menuOpen = !this.menuOpen
            }
        },

        ready() {
            this.links = this.links ? JSON.parse(decodeURIComponent(this.links)) : ''
            this.sublinks = this.sublinks ? JSON.parse(decodeURIComponent(this.sublinks)) : ''
        }

    }

</script>