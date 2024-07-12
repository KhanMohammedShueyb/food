import { GetterTree } from "vuex";
import { RootState } from "../types";
import { CartStates } from "./types";

export const getters: GetterTree<CartStates,RootState> = {
    GetCartItems(state):Array<Object>{
      
        return state.cartData
    },
    GetTotalPrice(state):number{
       
        return state.totalPrice
    },
}