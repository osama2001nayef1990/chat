import 'bootstrap';

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;
console.log('Hello form bootstrap file');
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
    wsHost: import.meta.env.VITE_PUSHER_HOST ?? `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
    wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
    wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
});
console.log('Hello form second bootstrap file');

window.Echo.channel('chat-room')
    .listen('UserLoginEvent', (e) => {
        console.log('User Login sucess!!')
    });

window.Echo.join('chat-room')
    .here((users) => {
        console.log('Here:')
        console.log(users);
        console.log(users[0].user.name);
    })
    .joining((user) => {
        console.log('Joining:')
        console.log(user);
    })
    .leaving((user) => {
        console.log('Leaving:')
        console.log(user);
    })
    .error((error) => {
        console.error(error);
    });
console.log('Hello form third bootstrap file');
