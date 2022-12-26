import { createWebHistory, createRouter } from "vue-router";
import CompanyApp from "../Company-App/index.vue";

const routes = [
    {
        path: "/admin/companies",
        name: "Admin-Companies",
        component: CompanyApp,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;