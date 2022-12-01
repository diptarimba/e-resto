import { createApp, h } from 'vue'
import { createInertiaApp, Link, Head } from '@inertiajs/inertia-vue3'
import { ZiggyVue } from '/vendor/tightenco/ziggy/dist/vue.es.js';
import { Ziggy } from './ziggy.js';
import { InertiaProgress } from '@inertiajs/progress'
import VueSweetalert2 from 'vue-sweetalert2';
import {
    Swiper,
    SwiperSlide
} from 'swiper/vue';

createInertiaApp({
  resolve: name => import(`./Pages/${name}.vue`),
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(VueSweetalert2)
      .use(ZiggyVue, Ziggy)
      .component("Swiper", Swiper)
      .component("SwiperSlide", SwiperSlide)
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
