// import './bootstrap';
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { ZiggyVue } from '../../vendor/tightenco/ziggy/src/js'
import '../css/app.css'
import 'flowbite';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import axios from 'axios';
import MainLayout from './Pages/Layouts/MainLayout.vue';





createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
        const page = pages[`./Pages/${name}.vue`];

        // Automatically apply MainLayout globally unless overridden
        // page.default.layout = page.default.layout || MainLayout;

        if (page.default) {
            page.default.layout = page.default.layout || MainLayout;  //for able to show the mainlayout in all vue files
          }

        return page;
      },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue)
      .use(VueSweetalert2)
      .mount(el)
  },
})
