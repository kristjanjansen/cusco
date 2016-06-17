<template>

    <div v-el:dropzone class="ImageUpload {{ isclasses }} dropzone">

    </div>

    <img :src="image" v-if="image">

</template>

<script>

    import Dropzone from 'dropzone';

    import Component from '../Component';

    export default Component.extend({

        data() {

            return {
                image: ''
            }

        },

        ready: function() {

            Dropzone.autoDiscover = false;

            new Dropzone(this.$els.dropzone, {
                url: "/upload",
                maxFilesize: 10,
                uploadMultiple: false,
                acceptedFiles: 'image/*',
                maxFiles: 1,
                headers: {'X-CSRF-TOKEN' : document
                    .querySelector('#token')
                    .getAttribute('content')
                },
                success: function(file, res) {
                    console.log(res)
                    this.image = res.file
                }.bind(this)
            
            })
        }

    })

</script>