import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        component: () => import("./pages/Home.vue"),
    },
    {
        path: "/artists",
        component: () => import("./pages/Artists.vue"),
    },
    {
        path: "/albums",
        component: () => import("./pages/Albums.vue"),
    },
    {
        path: "/info",
        component: () => import("./pages/Info.vue"),
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});