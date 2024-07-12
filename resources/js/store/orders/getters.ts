import { GetterTree } from "vuex";
import { RootState } from "../types";
import { OrderStates } from "./types";

export const getters: GetterTree<OrderStates,RootState> = {
    getOrders(state):Array<Object>{
        return state.orders
    },
    getOrdersDetails(state):Array<Object>{
        debugger
        return state.ordersDetail
    }
    
}
