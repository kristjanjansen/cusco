<template>

    <nav class="Navbar3 {{ isclasses }} ">

        <div class="Navbar3__links">

            <div
                class="Navbar3__link"
                v-for="link in vars.links"
                @click="toggleSubmenu($index)"
                @mouseover="toggleSubmenu($index)"
            >

                {{ link }}

            </div>
          
        </div>

        <div class="Navbar3__popover" v-if="submenuOpen">
        <div class="Navbar3__arrowWrapper">            
        <div class="Navbar3__arrow"></div>
        </div>

        <div class="Navbar3__sublinks">

            <div class="Navbar3__sublink" v-for="sublink in vars.sublinks">

                {{ sublink }}

            </div>
          
        </div>

        </div>

    </nav>

</template>

<script>

   import Component from '../Component';

   export default Component.extend({

        methods: {
            
            toggleSubmenu: function(index) {
                if (index == this.vars.links.length - 1) {
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