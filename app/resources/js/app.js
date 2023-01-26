require('./bootstrap');
import vuetify from './vuetify';
import Vue from 'vue'
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
import { createInertiaApp } from '@inertiajs/inertia-vue'
import { InertiaProgress } from '@inertiajs/progress'
import axios from './axios';

InertiaProgress.init()

createInertiaApp({
  resolve: name => require(`./Pages/${name}`),
  setup({ el, App, props, plugin }) {
    Vue.mixin({ methods: { route: window.route } });
    Vue.use(plugin)
    Vue.use(vuetify)
    Vue.use(axios)
    new Vue({
      render: h => h(App, props),
    }).$mount(el)
  },
})
