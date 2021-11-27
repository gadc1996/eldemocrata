import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

const routes = [
    {
        path: "/",
        name: "Home",
        component: () =>
            import(/* webpackChunkName: "home" */ "../views/Home.vue"),
        children: [
            {
                path: "dashboard",
                name: "Dashboard",
                component: () =>
                    import(
                        /* webpackChunkName: "dashboard" */ "../views/Dashboard.vue"
                    ),
            },
            {
                path: "articles",
                name: "Articles",
                component: () =>
                    import(
                        /* webpackChunkName: "articles" */ "../views/Articles.vue"
                    ),
            },
        ],
    },
    {
        path: "/login",
        name: "Login",
        component: () =>
            import(/* webpackChunkName: "about" */ "../views/Login.vue"),
    },
];

const router = new VueRouter({
    mode: "history",
    base: process.env.BASE_URL,
    routes,
});

export default router;
