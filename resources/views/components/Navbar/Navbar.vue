<template>

    <nav class="Navbar {{ isclasses }} ">

        <div class="Navbar__links">

            <div
                class="Navbar__link"
                v-for="link in vars.links"
                @click="toggleSubmenu($index)"
                @mouseover="toggleSubmenu($index)"
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

            <div class="Navbar__sublink" v-for="sublink in vars.sublinks">

                {{ sublink }}

            </div>
          
        </div>

        </div>

    </nav>

</template>

<script>

    import Component from '../Component';
    import { mixin as VueClickaway } from 'vue-clickaway';

    export default Component.extend({

        mixins: [ VueClickaway ],

        methods: {
            
            toggleSubmenu: function(index) {
                if ((index == this.vars.links.length - 1) || index == null) {
                    this.submenuOpen = ! this.submenuOpen;
                }
            }
        
        },

        data() {

            return {
                submenuOpen: false
            }

        }

    })

</script>