import { MutationTree } from 'vuex';
import { CategoriesMutations } from './mutation-types';
import { CategoriesState } from './types';
import { Category } from '@/entities/category';


export const mutations: MutationTree<CategoriesState> = {
    
  [CategoriesMutations.GET_CATEGORIES_INFO](state, payload: Category) {
    state.categories.push(payload)
  }
  
}