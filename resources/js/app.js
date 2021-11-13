require('./bootstrap');

import { createApp, h, Vue } from 'vue'
import { createInertiaApp, Head, Link } from '@inertiajs/inertia-vue3'
import { ZiggyVue } from 'ziggy';
import { Ziggy } from './ziggy';
import route from 'ziggy-js';
import { InertiaProgress } from '@inertiajs/progress'

InertiaProgress.init()

const el = document.getElementById('app');

createInertiaApp({
  resolve: name => require(`./Pages/${name}`),
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .mixin({ methods: { route } })
      .use(plugin)
      .use(ZiggyVue, Ziggy)
      .component('inertia-link', Link)
      .component('inertia-head', Head)
      .mount(el)
  },
})

const appTheme = localStorage.getItem('theme');

// Check what is the active theme
if (
  appTheme === 'dark' &&
  document.querySelector('body').classList.contains('app-theme')
) {
  document.querySelector('body').classList.add('bg-primary-dark');
} else {
  document.querySelector('body').classList.add('bg-secondary-light');
}

