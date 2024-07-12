import { Module } from "vuex";
import { RootState } from "../types";
import { OrderStates } from "./types";
import { getters } from "./getters";
import { mutations } from "./mutations";
import { actions } from "./actions";

const state: OrderStates = {
    orders: [],
    ordersDetail: []
}

export const orders: Module<OrderStates,RootState> = {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
}