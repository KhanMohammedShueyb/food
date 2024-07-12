import { ActionTree } from "vuex"
import { RootState } from "../types"
import { ProductStates } from "./types"
import axios from "axios"
import { ProductMutations } from "./mutation-types"
export const actions: ActionTree<ProductStates, RootState> = {
    async createProducts({ commit }, payload: Object) {
        try {
            return await axios
                .post("/api/Product/create", payload)
                .then(Response => {
                    commit(ProductMutations.GET_PRODUCTS, Response.data)
                    return Response;
                });
        }
        catch (error: any) {
            return error.response.data
        }
    },
    
    
    
    async ShowProducts({ commit }): Promise<Array<object>> {
        try {
            return await axios.get("/api/Product/show").then((Response) => {
                debugger
                if (Response.data.success == true) {
                    commit(ProductMutations.GET_PRODUCTS, Response.data)
                }
                else {
                    return Response.data.error
                }
                return Response.data;
            })
        } catch (error: any) {
            return error.response.data;
        }
    },

    async updateProducts({commit},payload): Promise<Array<Object>> { // promise which return type of array of objects
        debugger
        try {
          return await axios
          .put(
              "/api/Product/upd/" + payload.Id,
              payload.editedItem
          ).then(res => {
            res.data['Product'] = payload.editedItem
            debugger
            return res.data
          })
        } catch (error : any) {
          return error.response.data;
        }
      },
      async deleteProducts({commit}, payload): Promise<void> { 
        debugger
        // promise which return type of array of objects
        try {
          return await axios
          .delete("/api/Product/del/" + payload).then(res => {
            return res.data
          })
        } catch (error : any) {
          return error.response.data;
        }
      },
}
