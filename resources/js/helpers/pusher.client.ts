import Pusher from 'pusher-js';
// import * as PusherTypes from 'pusher-js';
import {config} from "../config";

// var presenceChannel: PusherTypes.PresenceChannel;

let instance: any = null;

export const pusherClient = () => {
	if (!instance) {
		instance = new Pusher(config.PUSHER_APP_KEY, {

			// useTLS: true, // optional, defaults to false
			cluster: config.PUSHER_APP_CLUSTER // if `host` is present, it will override the `cluster` option.
			/*
	host: 'HOST', // optional, defaults to api.pusherapp.com
	port: PORT, // optional, defaults to 80 for non-TLS connections and 443 for TLS connections
	encryptionMasterKey: config.ENCRYPTION_MASTER_KEY, // a 32 character long key used to derive secrets for end to end
	// encryption (see below!)
	*/
		});
	}

	return instance;
};
