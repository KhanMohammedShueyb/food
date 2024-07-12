/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from "axios"
import Echo from 'laravel-echo';
import Pusher from 'pusher-js'

//  window.Pusher = require('pusher-js');

Pusher.logToConsole = true;
var pusher = new Pusher('e98960bc40de62b0ca27', {
    cluster: 'mt1',
    forceTLS: true
});

new Echo({
    broadcaster: 'pusher',
    key: 'e98960bc40de62b0ca27',
    cluster: 'mt1',
    encrypted: true
    
});

 axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
 
 /**
  * Next we will register the CSRF Token as a common header with Axios so that
  * all outgoing HTTP requests automatically have it attached. This is just
  * a simple convenience so we don't have to attach every token manually.
  */
 
 let token: HTMLMetaElement | null = document.head.querySelector('meta[name="csrf-token"]');
 
 if (token) {
     axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
 } else {
     console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
 }