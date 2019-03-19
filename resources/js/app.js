import Vue from 'vue'
import axios from 'axios'
import lodash from 'lodash'

import App from '@/views/app'
import Dashboard from '@/views/dashboard'
import Test from '@/views/test'
import Page from '@/components/page'

import {
    Button,
    Dialog,
    Input,
    MessageBox,
    Notification,
    Option,
    Pagination,
    RadioButton,
    RadioGroup,
    Select,
    Table,
    TableColumn,
    Upload
} from 'element-ui'

import PolarisVue from '@eastsideco/polaris-vue'

window.axios = axios
window._ = lodash

Vue.use(PolarisVue)

Vue.prototype.$ELEMENT = {size: 'medium'}
Vue.use(Button)
Vue.use(Dialog)
Vue.use(Input)
Vue.use(Option)
Vue.use(Pagination)
Vue.use(RadioButton)
Vue.use(RadioGroup)
Vue.use(Select)
Vue.use(Table)
Vue.use(TableColumn)
Vue.use(Upload)
Vue.prototype.$msgbox = MessageBox
Vue.prototype.$confirm = MessageBox.confirm
Vue.prototype.$notify = Notification

Vue.component('app', App)
Vue.component('dashboard', Dashboard)
Vue.component('test', Test)
Vue.component('page', Page)

window.axios.defaults.headers.common['X-CSRF-TOKEN'] = document.head.querySelector('meta[name="csrf-token"]').content
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

Vue.mixin({
    data()
    {
        return {
            turbo: Turbolinks
        }
    },
    
    methods: {
        route: route
    }
})

Vue.config.productionTip = false

// Start Turbolinks
require('turbolinks').start()

// Boot the Vue component
document.addEventListener('turbolinks:load', (event) => {
    const root = document.getElementById('app')

    if (window.vue) {
        window.vue.$destroy(true)
    }

    window.vue = new Vue({
        render: h => h(
            Vue.component('app'), {
                props: JSON.parse(root.dataset.props)
            }
        )
    }).$mount(root)
})
