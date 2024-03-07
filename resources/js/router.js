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
        path: "/album-create",
        component: () => import("./pages/Album-Create.vue"),
    },
    {
        path: "/album-edit/:id",
        component: () => import("./pages/Album-Edit.vue"),
        props: true
    }
];

export default createRouter({
    history: createWebHistory(),
    routes,
});