import Vue from 'vue'
import { Getter } from "vuex-class";
import Component from 'vue-class-component'

// You can declare mixins as the same style as components.
@Component
export class SalesOrderHelper extends Vue {
    public get createPurchaseOrderPayload(): object {
        return this.$store.getters['orders/order_products/createPurchaseOrder']
    }
    calculatePerGramAmt(metal: string, buying_price_payout_percent: any, purity_percentage: any){
        buying_price_payout_percent = (buying_price_payout_percent) ? parseFloat(buying_price_payout_percent): 0
        purity_percentage = (purity_percentage) ? parseFloat(purity_percentage) : 0
  
        if(metal == 'Gold')
          return (this.createPurchaseOrderPayload['rate']['au'] * (buying_price_payout_percent / 100) * purity_percentage / 100).toFixed(2)
        else if(metal == 'Silver')
          return (this.createPurchaseOrderPayload['rate']['ag'] * (buying_price_payout_percent / 100) * purity_percentage / 100).toFixed(2)
        else if(metal == 'Platinum')
          return (this.createPurchaseOrderPayload['rate']['pt'] * (buying_price_payout_percent / 100) * purity_percentage / 100).toFixed(2)
        else if(metal == 'Palladium')
          return (this.createPurchaseOrderPayload['rate']['pd'] * (buying_price_payout_percent / 100) * purity_percentage / 100).toFixed(2)
        else if(metal == 'Rhodium')
          return (this.createPurchaseOrderPayload['rate']['rh'] * (buying_price_payout_percent / 100) * purity_percentage / 100).toFixed(2)
        else if(metal == 'Other')
          return (this.createPurchaseOrderPayload['rate']['ot'] * (buying_price_payout_percent / 100) * purity_percentage / 100).toFixed(2)
  
      }
      calculateFineWeight(item_weight: any, purity_percent: any){
        item_weight = (item_weight) ? parseFloat(item_weight) : 0
        purity_percent = (purity_percent) ? parseFloat(purity_percent) : 0
        return (item_weight * (purity_percent / 100)).toFixed(2)
      }
      
}