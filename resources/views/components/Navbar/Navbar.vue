<template>

    <nav class="Navbar" :class="isclasses">

        <div class="Navbar__links">

            <div
                class="Navbar__link"
                v-for="link in links"
                @click="toggleSubmenu($index)"
                @mouseover="toggleSubmenu($index)"
                track-by="$index"
            >

                {{ link }}

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
                    class="Navbar__sublink"
                    v-for="sublink in sublinks"
                    track-by="$index"
                >

                    {{ sublink }}

                </div>
              
            </div>

        </div>

    </nav>

</template>

<script>

    import { mixin as VueClickaway } from 'vue-clickaway';

    export default {

        mixins: { VueClickaway },

        props: {
            isclasses: { default: ''},
            links: { default: '' },
            sublinks: { default: '' },
        },

        methods: {
            toggleSubmenu: function(index) {
                if ((index == this.links.length - 1) || index == null) {
                    this.submenuOpen = ! this.submenuOpen;
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