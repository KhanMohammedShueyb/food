import { GetterTree } from 'vuex';
import { RootState } from '../types';
import { CategoriesState } from './types';
import _ from 'lodash'
import { Category } from '@/entities/category';
export const getters: GetterTree<CategoriesState, RootState> = {
  getCategories(state): Category[] {
    return state.categories
  },
categories(state): Category[] {
 
  return state.categories

  },
}