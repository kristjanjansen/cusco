<template>

    <div class="FormSelect" :class="isclasses">
    
        <component
            is="Multiselect"
            :selected.sync="selected"
            :options="options"
            :show-labels="false"
            :searchable="searchable"
            key="id"
            label="name"
        ></component>

        <input type="hidden" :name="name" :value="selected" />

    </div>

</template>

<script>

    import { Multiselect } from 'vue-multiselect'

    export default {

        components: { Multiselect },

        props: {
            isclasses: { default: '' },
            name: { default: 'select' }
        },

        data() {
            return {
                selected: null,
                options: [{id: 1, name: 'One'}, {id: 2, name: 'Two'}]
            }
        }

    }

</script>