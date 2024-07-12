import { Module } from "vuex";
import { RootState } from "../types";
import { ScoreState } from './types';
import { getters } from './getters'
import { mutations } from './mutations'
import { actions } from './actions'

const state: ScoreState = {
  user_group_permission: {},
  scores: [],
}

export const scores: Module<ScoreState, RootState> = {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
}