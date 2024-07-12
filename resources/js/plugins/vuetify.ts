import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css';
import '@mdi/font/css/materialdesignicons.css'
import 'material-design-icons-iconfont/dist/material-design-icons.css' // Ensure you are using css-loader

Vue.use(Vuetify)

const opts: object = {
  icons: {
    iconfont: 'mdiSvg' || 'md' || 'mdi' || 'mdiSvg' || 'md' || 'fa' || 'fa4' || 'faSvg'
  },
  theme: {
    themes: {
      light: {
        greytoolbar: '#f6f6f6',
        dashboardBackground: '#f5f5f9',
        drawerBackground: '#19222E',
        btnIcon: '#000',
      },
      dark: {
        dashboardBackground: '#121212',
        drawerBackground: '#19222E',
        btnIcon: '#fff',
      },
    },
  },
}

export default new Vuetify({
  theme: { dark: true}
})