import 'babel-polyfill'

import Vue from 'vue'
import VueMeta from 'vue-meta'
import PortalVue from 'portal-vue'
import { App, plugin } from '@inertiajs/inertia-vue'
import { InertiaProgress } from '@inertiajs/progress/src'
import vuetify from './plugins/vuetify'
import axios from './plugins/axios'

require('./plugins/registerComponents')

Vue.config.productionTip = false
Vue.config.devtools = true

Vue.mixin({ methods: { route: window.route } })
Vue.use(plugin)
Vue.use(PortalVue)
Vue.use(VueMeta)
Vue.use(axios)

InertiaProgress.init()

const app = document.getElementById('app')
const page = JSON.parse(app.dataset.page)

// window.Pusher = Pusher
// Vue.use(VueEcho, {
//   broadcaster: 'pusher',
//   key: page.props.config.pusherKey,
//   cluster: 'us3',
//   auth: {
//     headers: {
//       'X-CSRF-TOKEN': page.props.config.csrfToken,
//     },
//   }
// })

const eventBus = new Vue()
window.eventBus = eventBus

Vue.mixin({
   computed: {
      pageHasErrors: () => {
         return (Object.keys(Vue.prototype.$page.props.errors).length !== 0)
      },
   },
   methods: {
      pageHasError: (name) => {
         if (Object.keys(Vue.prototype.$page.props.errors).length === 0) return false
         return name in Vue.prototype.$page.props.errors
      },
      getPageError: (name) => {
         if (Object.keys(Vue.prototype.$page.props.errors).length === 0) return null
         return Vue.prototype.$page.props.errors[name]
      }
   }
})

<<<<<<< HEAD
// WAS SOLL ICH MACHEN?????????????????????!?!?!?!?!!?!?!?!?!?!?!?!?

=======
window.App = new Vue({
   vuetify,
   metaInfo: {
      title: 'Loading...',
      titleTemplate: '%s • GigaVereinsverwaltung',
      changed (info) {
         window.App.goBack = info.goBack
         window.App.appTitle = info.titleChunk
      }
   },

   data: vm => ({
      appTitle: 'Loading...',
      goBack: null,
      sideDrawer: null,
      flashSnackbar: false,
      flashMessage: '',
   }),

   mounted () {
      // eventBus.$on('flashMessage', (value) => {
      //    this.flashMessage = value
      //    this.flashSnackbar = true
      // })
   },

   render: h => h(App, {
      props: {
         initialPage: page,
         resolveComponent: name => import(`@/Pages/${name}`).then(module => module.default),
         transformProps: props => {
            // if (props.jetstream.flash.success) {
            //    eventBus.$emit('flashMessage', props.jetstream.flash.success)
            // }
            return props
         },
      },
   }),
}).$mount(app)

>>>>>>> b640c1004eda45d42b0ad1c449bd03c73cd0dcff