<template>

    <div class="Navbar2 {{ isclasses }}">

        <div
            class="Navbar2__hamburger"
            v-if="menuClosed"
            @click="toggle()"
        >
            ≡
        </div>

        <div
            class="Navbar2__menu"
            v-else
            transition="zoom"
        >

            <div class="Navbar2__close" @click="toggle()">×</div>

            <div class="Navbar2__links">

                <div class="Navbar2__link" v-for="link in vars.links">
                    
                    {{ link }}
                    
                </div>

            </div>

       </div>

   </div>

</template>

<script>

    import Component from '../Component';

    export default Component.extend({
        
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