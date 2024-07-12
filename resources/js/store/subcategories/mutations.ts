import { MutationTree } from 'vuex';
import { SubcategoryMutations } from './mutation-types';
import { Subcategory } from '@/entities/subcategory';
import { SubcategoryState } from './types';


export const mutations: MutationTree<SubcategoryState> = {
    
  [SubcategoryMutations.GET_SUBCATEGORIES_INFO](state, payload: Subcategory) {
    state.subcategories.push(payload)
  }
  
}