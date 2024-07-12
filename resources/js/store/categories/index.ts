import { Module } from "vuex";
import { RootState } from "../types";
import { CategoriesState } from './types';
import { getters } from './getters'
import { mutations } from './mutations'
import { actions } from './actions'

const state: CategoriesState = {
  categories: []
}

export const categories: Module<CategoriesState, RootState> = {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
}