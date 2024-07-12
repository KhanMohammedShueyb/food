import { Module } from "vuex";
import { RootState } from "../types";
import { QuestionairesState } from './types';
import { getters } from './getters'
import { mutations } from './mutations'
import { actions } from './actions'

const state: QuestionairesState = {
  questionaires: [],
  validQuestionaires: [],
}

export const questionaires: Module<QuestionairesState, RootState> = {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
}