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

                <a v-for="link in links" :href="link.route">

                    <div class="NavbarMobile__link">
                        a
                        {{ link.title }}
                        
                    </div>

                </a>

                <a v-for="link in sublinks" :href="link.route">

                    <div class="NavbarMobile__link">
                        b
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
                menuClosed: true
            }
        },

        methods: {
            toggle: function() {
                this.menuClosed = !this.menuClosed
            }
        },

        ready() {
            this.links = this.links ? JSON.parse(decodeURIComponent(this.links)) : ''
            this.sublinks = this.sublinks ? JSON.parse(decodeURIComponent(this.sublinks)) : ''
        }

    }

</script>