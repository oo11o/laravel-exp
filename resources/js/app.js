require('./bootstrap');

import { createApp } from 'vue';

import PostIndex from './components/Posts/Index';

const app = createApp({
    components: {
        PostIndex
    }
})

app.mount('#app');
