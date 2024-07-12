import { Module } from "vuex";
import { RootState } from "../types";
import { OfferState } from './types';
import { getters } from './getters'
import { mutations } from './mutations'
import { actions } from './actions'

const state: OfferState = {
  offers: []
}

export const offer: Module<OfferState, RootState> = {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
}