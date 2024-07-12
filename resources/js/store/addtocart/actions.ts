import { ActionTree } from "vuex";
import { RootState } from "../types";
import { CartMutation } from "./mutations-types";
import { CartStates } from "./types";

export const actions: ActionTree<CartStates, RootState> = { 
    getData({commit},payload){
        commit(CartMutation.PUT_DATA,payload)
    },
    TotalPrice({commit},payload){
        commit(CartMutation.TOTAL_PRICE,payload)
    }
    }
