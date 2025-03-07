import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp, Link } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import VueClipboard from 'vue-clipboard2'
import VueSmoothScroll from 'vue3-smooth-scroll'

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(VueClipboard)
            .use(VueSmoothScroll)
            .component('Link', Link);
        
        // DevTools aktivieren, wenn nicht im Produktionsmodus
        if (import.meta.env.MODE !== 'production') {
            app.config.devtools = true;
        }

        return app.mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
