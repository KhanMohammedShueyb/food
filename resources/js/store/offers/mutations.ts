import { Offers } from '@/entities/offers';
import { MutationTree } from 'vuex';
import { OfferMutations } from './mutation-types';
import {OfferState } from './types';



export const mutations: MutationTree<OfferState> = {
    
  [OfferMutations.SET_OFFER](state, payload: Offers) {
    debugger
    state.offers.push(payload);
    
  }
  
}