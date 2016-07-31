<template>

    <nav class="Navbar" :class="isclasses">

        <div class="Navbar__links">


            <div
                v-for="link in links"
                @click="toggleSubmenu(link)"
                @mouseover="toggleSubmenu(link)"
                v-on-clickaway="toggleSubmenu(link)"
                track-by="$index"
                class="Navbar__link"
            >

                {{ link.title }}

            </div>
          
        </div>

        <div
            class="Navbar__popover"
            v-if="submenuOpen"
            transition="fadeZoom"
            v-on-clickaway="toggleSubmenu()"
        >

            <div class="Navbar__arrowWrapper">            
            
                <div class="Navbar__arrow"></div>
            
            </div>

            <div class="Navbar__sublinks">

                <div
                    v-for="sublink in sublinks"
                    track-by="$index"
                    class="Navbar__sublink"
                >

                    {{ sublink.title }}

                </div>
              
            </div>

        </div>

    </nav>

</template>

<script>

    import { mixin as VueClickaway } from 'vue-clickaway'

    export default {

        mixins: [ VueClickaway ],

        props: {
            isclasses: { default: '' },
            links: { default: '' },
            sublinks: { default: '' }
        },

        methods: {
            toggleSubmenu: function(link) {
                if (link.menu) {
                    this.submenuOpen = !this.submenuOpen
                }
            }
        },

        data() {
            return {
                submenuOpen: false
            }
        },

        ready() {
            this.links = this.links
                ? JSON.parse(decodeURIComponent(this.links))
                : ''
            this.sublinks = this.sublinks
                ? JSON.parse(decodeURIComponent(this.sublinks))
                : ''
        }

    }

</script>