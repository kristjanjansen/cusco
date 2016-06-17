<template>

    <div class="Editor {{ isclasses }}">

        <div class="Editor__toolbar">

            <div @click="insertMarkdownLink()">Link</div>

        </div>

        <div class="Editor__wrapper">

            <div v-el:writer class="Editor__writer"></div>
            
            <div class="Editor__preview">

                <div class="Body">
                
                {{{ body }}}

                </div>

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

    export default Component.extend({

        data() {

           return {
              body: '',
              images: [],
              editor: {}
           }

       },

       ready: function() {
            this.editor = brace.edit(this.$els.writer);
            this.editor.setTheme("ace/theme/chrome");
            this.editor.getSession().setMode("ace/mode/markdown");
            this.editor.renderer.setShowGutter(false);
            this.editor.setHighlightActiveLine(false);
            this.editor.setOption("wrap", 60);
            this.editor.setValue(this.body);

            this.editor.getSession().on('change', function() {
                this.updatePreview()
            }.bind(this));

       },

        methods: {

            updatePreview: function() {
                this.$http.post('./render', {body: this.editor.getValue()})
                    .then(function(res) {
                        this.body = res.data.body
                    });
            },

            insertMarkdownLink: function() {
                var link = prompt("Link URL", "http://");
                this.editor.getSession().replace(
                    this.editor.selection.getRange(),
                    '[' + this.editor.getSelectedText() + '](' +  link + ')'
                )
                this.editor.focus()
            },

        }

   })

</script>