<template>

    <div class="FormSelect {{ isclasses }}">
    
        <component
            is="Multiselect"
            :selected.sync="selected"
            :options="options"
            :show-labels="false"
            :searchable="searchable"
            key="id"
            label="name"
        ></component>

        <input type="hidden" :name="vars.name || name" :value="selected.id" />

    </div>

</template>

<script>

    import { Multiselect } from 'vue-multiselect'
    import Component from '../Component';

    export default Component.extend({

        components: { Multiselect },

        data () {
            return {
                selected: null,
                options: [{id: 1, name: 'One'}, {id: 2, name: 'Two'}]
            }
        }

    })

</script>