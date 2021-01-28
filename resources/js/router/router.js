import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);
import ListComponent from "../components/SalesOrder/ListComponent";
const routes = [
    { path: "/", component: ListComponent },
];

const router = new VueRouter({
    routes, // short for `routes: routes`
    hashbank: false,
    mode: "history"
});

export default router;
