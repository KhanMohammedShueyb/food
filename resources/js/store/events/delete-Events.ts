import { pusherClient } from '../../helpers/pusher.client';
import _ from 'lodash'

export const deletedEvents = (store: any) => {
	const client = pusherClient();
	const channel = client.subscribe("model");

	channel.bind("deleted", ({
		model,
		modelName
	}: any) => {

        switch (modelName) {
            case 'Questionare':{
				debugger
				let data = store.getters['questionaires/questionaires']
                data = _.filter(data, (res: object)=>res['id'] != model.id)
				debugger
                store.commit('questionaires/GET_QUESTIONAIRES_SUCCESS', data)
			}
            break;

			case 'User':{
				let data=store.getters['auth/allUser']
				debugger
				data=_.filter(data, (res: object)=>res['id'] != model.id)
				store.commit('auth/GET_USER_SUCCESS', data)
			}
			break;

			case 'Categories':{
				debugger
				let data = store.getters['categories/categories']
                data = _.filter(data, (res: object)=>res['id'] != model.id)
				debugger
                store.commit('categories/GET_CATEGORIES_INFO', data)
			}
            break;
        }
	})
}