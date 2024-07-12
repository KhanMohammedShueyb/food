import { Module } from "vuex";
import { RootState } from "../types";
import { ProductStates } from "./types";
import { getters } from "./getters";
import { mutations } from "./mutations";
import { actions } from "./actions";

const state: ProductStates = {
    products : []
}

export const product: Module<ProductStates,RootState> = {
    state,
    getters,
    actions,
    mutations,

}