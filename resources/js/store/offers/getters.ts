import { GetterTree } from 'vuex';
import { RootState } from '../types';
import { OfferState } from './types';
import { Offers } from '@/entities/offers';
export const getters: GetterTree<OfferState, RootState> = {
  getOffer(state): Offers[] {
    debugger
    return state.offers
  },
}