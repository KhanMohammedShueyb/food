import { ActionTree } from "vuex"
import { RootState } from "../types"
import { OrderStates } from "./types"
import { OrderMutations } from "./mutation-types"
import axios from 'axios';
export const actions:ActionTree<OrderStates,RootState> ={
    // GetOrders({commit},payload){
    //       commit(OrderMutations.GET_ORDERS,payload)
    // }
    async createOrder({commit}, payload): Promise<Array<object>> { // promise which return type of array of objects
        try {
          return await axios.post('/api/order/createOrder', payload).then((res:any) => {
            if (res.data.success == true) {
              alert("Created Successfully")
              payload.Items.forEach((element: any) => {
                  const obj = element['item'];
                  const orderdetail = Object.keys(obj).reduce((acc, key) => {
                      acc[key.toLowerCase()] = obj[key];
                      return acc;
                  }, {}); 
                  orderdetail['order_id'] = res.data.Order.id;
                  orderdetail['quantity'] = element.qty;
                  console.log("created order successfully is:: ", res.data.Order.id, orderdetail);
                  axios.post("/api/orderDetail/create", orderdetail).then(response => {
                      if (response.data.success == true) {
                          alert("Orders details created successfully");
                      }
                      
                  })
              });
          }
          else {
            alert("error")
        }
          // commit(OrderMutations.GET_ORDERS,payload)
          return res
          })
        } catch (error : any) {
          return error.response.data;
        }
      },
    
      async showOrder({commit},payload): Promise<Array<Object>>{
        debugger
      try{
        return await axios.post("/api/order/showOrder",payload).then((Response:any)=>{
          if(Response.data.success == true){
            debugger
            commit(OrderMutations.GET_ORDERS,Response.data.Order);
            
          }
          else{
            alert("error");
          }
          return Response;
      });
      }
      catch (error : any) {
        return error.response.data;
      }
    },
    async showOrderDetail({commit},payload): Promise<Array<Object>>{
        debugger
      try{
        return await axios.post("/api/orderDetail/show",payload).then((Response:any)=>{
          if(Response.data.success == true){
            debugger
            commit(OrderMutations.GET_ORDERS_DETAILS,Response.data.Order);
          }
          else{
            alert("error");
          }
          return Response;
      });
      }
      catch (error : any) {
        return error.response.data;
      }
    }
}