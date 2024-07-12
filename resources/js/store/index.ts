import Vue from 'vue';
import Vuex, { StoreOptions } from 'vuex';
import { RootState } from './types';
import { auth } from './auth/index';
import { scores } from './scores/index'
import { questionaires } from './questionaires/index'
import { notifications } from './notifications/index'
import { categories } from './categories/index'
import setup from '../interceptors/interceptors'
import createPersistedState from "vuex-persistedstate";
import { insertEvents } from './events/Insert-Events'
import { updateEvents } from './events/update-Events'
import { deletedEvents } from './events/delete-Events'
import { ProductStore } from './ProductStore/index'
import { Cart } from './addtocart/index'
import { orders } from './orders/index';
import { Authenticated } from './Authenticated/index';
import { usergroup } from './usergroup/index';
import { groupPermission } from './userGroupPermission/index';
import { offer } from './offers/index';
import { subcategories } from './subcategories/index';



Vue.use(Vuex)
const storeState: StoreOptions<RootState> = {
  modules: {
    auth,
    categories,
    ProductStore,
    Cart,
    orders,
    subcategories,
    Authenticated,
    usergroup,
    groupPermission,
    offer,
    scores
  },
  
  plugins: [
    createPersistedState({
      paths  : ['Authenticated','Cart','usergroup'],
      storage: window.sessionStorage
    })
  ]
}
const store = new Vuex.Store<RootState>(storeState)
setup(store)
store.dispatch("scores/initPlatform");
export default store