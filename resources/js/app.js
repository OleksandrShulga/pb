import './bootstrap';
import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import { createPinia } from "pinia";
import "./../css/app.css";
import Logic from './Logic.vue';

const app = createApp(App);
app.use(createPinia());
app.use(router);
app.mount("#app");
