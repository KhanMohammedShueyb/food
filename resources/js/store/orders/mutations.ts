import axios from 'axios'
import { object } from 'vue-types';
import { MutationTree } from "vuex";
import { OrderMutations } from "./mutation-types";
import { OrderStates } from "./types";

export const mutations: MutationTree<OrderStates> = {
    [OrderMutations.GET_ORDERS](state, payload: any) {
        state.orders = payload
        debugger;
        console.log("Orders in mutation are: ", state.orders)
    },
    [OrderMutations.GET_ORDERS_DETAILS](state, payload: any) {
        state.ordersDetail = payload
        debugger;
        console.log("OrderDetails in mutation are: ", state.ordersDetail)
    }
}