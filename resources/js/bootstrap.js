import axios from 'axios';

// Configure Axios defaults
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Add CSRF token to requests
const token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found');
}

// Request interceptor for loading states
window.axios.interceptors.request.use(function (config) {
    // Show loading indicator
    document.body.classList.add('loading-request');
    return config;
}, function (error) {
    document.body.classList.remove('loading-request');
    return Promise.reject(error);
});

// Response interceptor for loading states
window.axios.interceptors.response.use(function (response) {
    // Hide loading indicator
    document.body.classList.remove('loading-request');
    return response;
}, function (error) {
    document.body.classList.remove('loading-request');
    
    // Handle common errors
    if (error.response) {
        switch (error.response.status) {
            case 401:
                console.error('Unauthorized access');
                break;
            case 403:
                console.error('Forbidden access');
                break;
            case 404:
                console.error('Resource not found');
                break;
            case 422:
                console.error('Validation error', error.response.data);
                break;
            case 500:
                console.error('Server error');
                break;
            default:
                console.error('Request failed', error.response.status);
        }
    }
    
    return Promise.reject(error);
});

// Alpine.js (if using)
// import Alpine from 'alpinejs'
// window.Alpine = Alpine
// Alpine.start()

// Echo for real-time features (if using)
// import Echo from 'laravel-echo'
// import Pusher from 'pusher-js'
// window.Pusher = Pusher

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
//     wsHost: import.meta.env.VITE_PUSHER_HOST ? import.meta.env.VITE_PUSHER_HOST : `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher-channels.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });

export default window.axios;