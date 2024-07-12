import { pusherClient } from '../../helpers/pusher.client';
import _ from 'lodash'

export const insertEvents = (store: any) => {
	const client = pusherClient();
	const channel = client.subscribe("model");

	channel.bind("created", ({
		model,
		modelName
	}: any) => {
		switch (modelName) {
            case 'Questionare':{
				let data = store.getters['questionaires/questionaires']
				let if_exists = _.filter(data, (o: object) => o['id'] == model.id)

				if (if_exists.length == 0) {
					data.unshift(model)
					store.commit('questionaires/GET_QUESTIONAIRES_SUCCESS', data)
				}
			}
            break;

			case 'Categories':{
				let data = store.getters['categories/categories']
				let if_exists = _.filter(data, (o: object) => o['id'] == model.id)

				if (if_exists.length == 0) {
					data.unshift(model)
					store.commit('categories/GET_CATEGORIES_INFO', data)
				}
			}
            break;

            case 'CustomerAddress':{
                // for customer table
				let data = store.getters['customers/allCustomers']
                let payload = data.map((c: object) => {
					if (c['id'] == model.customer_id) {
                        let index = c['customer_addresses'].findIndex((a: object) => a['id'] == model.id)
						if(index<0)
							c['customer_addresses'].unshift(model)
						else
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