<template>

   <div class="Editor {{ isclasses }}">
    <pre>
        {{ $data | json }}
    </pre>
        
        <div v-el:writer class="Editor__writer">

        </div>

   </div>

</template>

<script>

    import brace from 'brace';
 
    import 'brace/theme/chrome';
    import 'brace/mode/markdown';

    import Component from '../Component';

    //var editor = brace.edit("writer");

    export default Component.extend({

        data() {

           return {

               test: 'from Vue'

           }

       },

       ready: function() {

            var editor = brace.edit(this.$els.writer);
            editor.setTheme("ace/theme/chrome");
            editor.getSession().setMode("ace/mode/markdown");
            editor.renderer.setShowGutter(false);
            editor.setHighlightActiveLine(false);
            editor.setOption("wrap", 60);
            editor.setValue(this.test);
            editor.focus()

            editor.getSession().on('change', function(e) {
                this.test = editor.getValue();
            }.bind(this));
       }

   })

</script>