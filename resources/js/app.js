import { createApp, h } from 'vue'
import { createInertiaApp, Link, Head } from '@inertiajs/inertia-vue3'
import { ZiggyVue } from '/vendor/tightenco/ziggy/dist/vue.es.js';
import { Ziggy } from './ziggy.js';
import { InertiaProgress } from '@inertiajs/progress'

createInertiaApp({
  resolve: name => import(`./Pages/${name}.vue`),
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue, Ziggy)
      .component("Link", Link)
      .component("Head", Head);

    app.config.globalProperties.$filters = {
        toIDR(value) {
            return 'Rp. ' + new Intl.NumberFormat('en-US').format(value)
        },
    }

    app.mount(el);
  },

  title: title => `E-Resto: ${title}`
})

InertiaProgress.init({
    // The color of the progress bar.
  color: '#29d',
});
