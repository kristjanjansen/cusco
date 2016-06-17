<template>

   <div class="Editor {{ isclasses }}">

        <div v-el:writer class="Editor__writer"></div>
        
        <div class="Editor__preview">

            <div class="Body">
            
            {{{ body }}}

            </div>

        </div>

   </div>

   <div class="Editor__imagebrowser">

       <div v-for="image in images">
       
           <img :src="image" width="20%">

       </div>

   </div>

</template>

<script>

    import brace from 'brace';
    import _ from 'lodash';
 
    import 'brace/theme/chrome';
    import 'brace/mode/markdown';

    import Component from '../Component';

    //var editor = brace.edit("writer");

    export default Component.extend({

        data() {

           return {
              body: '',
              images: []
           }

       },

       ready: function() {
            var editor = brace.edit(this.$els.writer);
            editor.setTheme("ace/theme/chrome");
            editor.getSession().setMode("ace/mode/markdown");
            editor.renderer.setShowGutter(false);
            editor.setHighlightActiveLine(false);
            editor.setOption("wrap", 60);
            editor.setValue(this.body);
            editor.focus()

            editor.getSession().on('change', _.throttle(function(e) {
                this.$http.post('render', {body: editor.getValue()}).then(function(res) {
                    this.body = res.data.body
                });
            }.bind(this), 200));

            this.$http.get('image/index').then(function(res) {
                this.images = res.data
            });
       }

   })

</script>