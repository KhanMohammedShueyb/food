import { ActionTree } from "vuex"
import { RootState } from "../types"
import { ProductStates } from "./types"
import axios from "axios"
import { ProductMutations } from "./mutation-types"
export const actions:ActionTree<ProductStates,RootState> ={
    async GetProducts({commit}):Promise<Array<object>>{
       return await axios.get("http://127.0.0.1:8000/api/Product/show").then((Response)=>{
       debugger
          commit(ProductMutations.GET_PRODUCTS,Response.data)
          return Response.data.Product;
        })
    }
    // async GetProducts({commit}, payload): Promise<Array<object>> { // promise which return type of array of objects
    //     debugger
    //     try {
    //       return await axios.get('/api/Product/show').then(res => {
    //         debugger
    //         commit(ProductMutations.GET_PRODUCTS, res.data)
    //         return res.data
    //       })
    //     } catch (error : any) {
    //       return error.response.data;
    //     }
    //   },
}