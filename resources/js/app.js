require('./bootstrap');

import { createApp, h } from 'vue';
import { createInertiaApp, InertiaLink } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import VueClipboard from 'vue-clipboard2'
import VueSmoothScroll from 'vue3-smooth-scroll'


const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(VueClipboard)
            .use(VueSmoothScroll)
            .component('inertia-link', InertiaLink)
            .mixin({ methods: { route } })
            .mount(el);
    },
});

InertiaProgress.init({ color: '#0DB3E9' });
