import { pusherClient } from '../../helpers/pusher.client';
import _ from 'lodash'

export const updateEvents = (store: any) => {
	const client = pusherClient();
	const channel = client.subscribe("model");

	channel.bind("updated", ({
		model,
		modelName
	}: any) => {
		switch (modelName) {
            case 'Questionare':{
				let data = store.getters['questionaires/questionaires']
				let payload = data.map((o: object) => {
					if (o['id'] == model.id) {
						return Object.assign(o, model)
					} else
						return o
				})
				store.commit('questionaires/GET_QUESTIONAIRES_SUCCESS', payload)
			}
            break;

			case 'Categories':{
				let data = store.getters['categories/categories']
				let payload = data.map((o: object) => {
					if (o['id'] == model.id) {
						return Object.assign(o, model)
					} else
						return o
				})
				store.commit('categories/GET_CATEGORIES_INFO', payload)
			}
            break;

            case 'CustomerAddress':{
                // for customer table
				let data = store.getters['customers/allCustomers']
                let payload = data.map((c: object) => {
					if (c['id'] == model.customer_id) {
                        let index = c['customer_addresses'].findIndex((a: object) => a['id'] == model.id)
                        c['customer_addresses'][index] = model
                        return c
                    } else {
                        return c
                    }
				})
                store.commit('customers/GET_CUSTOMERS_SUCCESS', payload)
			}
            break;

			case 'UserBankInfo':{
                // for customer table
				let data = store.getters['auth/authenticatedUser']
				if(data.id == model.user_id){
					store.commit('auth/GET_AUTHENTICATED_USER_SUCCESS', {
						...data,
						user_bank_infos_id: model.id,
						routing_number: model.routing_number,
						account_number: model.account_number,
						account_name: model.account_name
					})
				}
                
			}
            break;
            
        }
	})
}