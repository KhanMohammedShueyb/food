import { Module } from "vuex";
import { RootState } from "../types";
import { SubcategoryState } from './types';
import { getters } from './getters'
import { mutations } from './mutations'
import { actions } from './actions'

const state: SubcategoryState = {
  subcategories: []
}

export const subcategories: Module<SubcategoryState, RootState> = {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
}