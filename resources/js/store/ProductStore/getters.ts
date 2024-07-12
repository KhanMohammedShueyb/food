import { GetterTree } from "vuex";
import { RootState } from "../types";
import { ProductStates } from "./types";

export const getters: GetterTree<ProductStates,RootState> = {
    ProductsGet(state):Array<Object>{
        return state.products
    }
}