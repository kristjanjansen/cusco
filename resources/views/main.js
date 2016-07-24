import Vue from 'vue'
import VueResource from 'vue-resource'

import Alert from './components/Alert/Alert.vue'
import AlertDemo from './components/AlertDemo/AlertDemo.vue'
import Arc from './components/Arc/Arc.vue'
import ArcDemo from './components/ArcDemo/ArcDemo.vue'
import Editor from './components/Editor/Editor.vue'
import FormSelect from './components/FormSelect/FormSelect.vue'
import Icon from './components/Icon/Icon.vue'
import IconLoader from './components/IconLoader/IconLoader.vue'
import ImageUpload from './components/ImageUpload/ImageUpload.vue'
import Map from './components/Map/Map.vue'
import Navbar from './components/Navbar/Navbar.vue'
import NavbarMobile from './components/NavbarMobile/NavbarMobile.vue'
import Promo from './components/Promo/Promo.vue'

const globalProps = JSON.parse(decodeURIComponent(
    document.querySelector('#globalprops').getAttribute('content')
))

Vue.use(VueResource)
Vue.http.headers.common['X-CSRF-TOKEN'] = globalProps.token

new Vue({
    el: 'body',

    components: {
        Alert,
        AlertDemo,
        Arc,
        ArcDemo,
        Editor,
        FormSelect,
        Icon,
        IconLoader,
        ImageUpload,
        Map,
        Navbar,
        NavbarMobile,
        Promo
    },



    events: {

        'showAlert': function(alert) { this.$broadcast('showAlert', alert) },
        'ImageUploaded': function() { this.$broadcast('ImageUploaded') }

    },

    ready() {
        if (globalProps.alert) {
            this.$emit('showAlert', globalProps.alert)
        }
    }

})
