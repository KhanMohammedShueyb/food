import { GetterTree } from 'vuex';
import { RootState } from '../types';
import { SubcategoryState } from './types';
import _ from 'lodash'
import { Subcategory } from '@/entities/subcategory';
export const getters: GetterTree<SubcategoryState, RootState> = {
  getSubcategory(state): Subcategory[] {
    return state.subcategories
  },
  Subcategory(state): Subcategory[] {
    return state.subcategories
  },
}