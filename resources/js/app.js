require('./bootstrap');

import { createApp } from 'vue';
import router from './routes';
import App from './components/App';

const app = createApp({
    components: {
        App
    }
});

app.use(router);
app.mount('#app');
