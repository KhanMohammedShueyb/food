import { toInteger } from "lodash";
import { find } from "lodash";
import { isEmpty } from "lodash";
import { MutationTree } from "vuex";
import { CartMutation } from "./mutations-types";
import { CartStates } from "./types";
var result: Boolean
var x: any = []
export const mutations: MutationTree<CartStates> = {
    
    [CartMutation.PUT_DATA](state, payload) {

        if (isEmpty(state.cartData)) {
            state.cartData.push(payload)
        }
        else {
          
            const id1:Number = payload['id']
            const data:any = state.cartData
            result = data.find((element:any) => element.id == id1)?true:false         
            if (result == true) {
                alert("Already added in cart")
            }
            else{
                state.cartData.push(payload)
            }
        }
    },

    [CartMutation.TOTAL_PRICE](state,payload){
        state.cartData['qty'] = payload.qty;
        state.totalPrice = state.cartData.reduce((a , b) => a + b.qty * b.item.Price,0);
    }
}