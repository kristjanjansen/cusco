<template>

    <div
        v-el:dropzone
        class="ImageUpload dropzone"
        :class="isclasses"
    >
    </div>

</template>

<script>

    import Dropzone from 'dropzone';

    export default {

        ready: function() {

            Dropzone.autoDiscover = false;

            new Dropzone(this.$els.dropzone, {
                url: "/image/store",
                paramName: 'image',
                maxFilesize: 10,
                uploadMultiple: false,
                acceptedFiles: 'image/*',
                maxFiles: 1,
                headers: {'X-CSRF-TOKEN' : document
                    .querySelector('#token')
                    .getAttribute('content')
                },
                success: function(file, res) {
                    this.$dispatch('imageUploaded')
                }.bind(this)
            
            }).on("complete", function(file) {
                this.removeFile(file);
            });

        }

    }

</script>