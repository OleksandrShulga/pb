import { createRouter, createWebHistory } from "vue-router";
import HomeView from "@/views/HomeView.vue";
import Logic from "../Logic.vue";

const routes = [
    {
        // Адреса для сторінки бекенду та фронтенду
        path: "/",
        component: HomeView,
    },
    {
        // Сторінка логіки
        path: "/logic",
        component: Logic,
    }
];

const router = createRouter({
    // Ініціалізую роут зі сторони фронта
    history: createWebHistory(),
    routes,
});

export default router;
