import '@mdi/font/css/materialdesignicons.css'
import Vue from 'vue'
import Vuetify from 'vuetify/lib'

Vue.use(Vuetify)

const options = {
   theme: {
      default: 'light',
      themes: {
         light: {
            primary: '#660066',
            secondary: '#673ab7',
            accent: '#9c27b0',
            error: '#f44336',
            warning: '#ff5722',
            info: '#3f51b5',
            success: '#4caf50'
         }
      },
   },
   icons: {
      iconfont: 'mdi', // default - only for display purposes
   },
}

export default new Vuetify(options)
