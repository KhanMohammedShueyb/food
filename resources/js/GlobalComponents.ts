import ConfirmPassword from './components/public/auth/ConfirmPassword.vue'

/**
 * You can register global components here and use them as a plugin in your main Vue instance
 */

const GlobalComponents = {
  install (Vue : any) {
    Vue.component('confirm-password', ConfirmPassword)
  }
}

export default GlobalComponents
 