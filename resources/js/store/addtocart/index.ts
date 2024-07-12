import { Module } from "vuex";
import { RootState } from "../types";
import { CartStates } from "./types";
import { getters } from "./getters";
import { actions } from "./actions";
import { mutations } from "./mutations";

const state : CartStates = {
    cartData: [],
    totalPrice: 0,
  
} 

export const Cart:Module<CartStates,RootState> = {
    state,
    getters,
    actions,
    mutations
}