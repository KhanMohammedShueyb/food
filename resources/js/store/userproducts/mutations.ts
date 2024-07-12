import { MutationTree } from "vuex";
import { ProductMutations } from "./mutation-types";
import { ProductStates } from "./types";

export const mutations: MutationTree<ProductStates> ={
    [ProductMutations.GET_PRODUCTS](state,payload:any){
        state.products = payload
        console.log("Products in mutation are: ",state.products)
    }
}