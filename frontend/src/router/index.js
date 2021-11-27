import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

const routes = [
    {
        path: "/",
        redirect: "/dashboard",
    },
    {
        path: "/login",
        name: "Login",
        component: () =>
            import(/* webpackChunkName: "about" */ "../views/Login.vue"),
    },
    {
        path: "/dashboard",
        name: "Dashboard",
        component: () =>
            import(
                /* webpackChunkName: "dashboard" */ "../views/Dashboard.vue"
            ),
        // children: [
        //     {
        //         path: "customers",
        //         component: () =>
        //         import(/* webpackChunkName: "customers" */ "../views/Customers.vue"),
        //     },
        // ]
    },
];

const router = new VueRouter({
    mode: "history",
    base: process.env.BASE_URL,
    routes,
});

export default router;
