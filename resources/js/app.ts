import '../css/app.css';

import { createApp, DefineComponent, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import '../css/app.css'
import { initializeTheme } from '@/composables/useAppearance';

void createInertiaApp({
    resolve: (name) =>
        resolvePageComponent(
            `./pages/${name}.vue`,
            import.meta.glob<DefineComponent>('./pages/**/*.vue'),
        ),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) }).use(plugin).mount(el)
    },
})


// This will set light / dark mode on page load...
initializeTheme();
