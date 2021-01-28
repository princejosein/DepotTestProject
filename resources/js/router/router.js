import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);
import ListComponent from "../components/SalesOrder/ListComponent";
import DetailsComponent from "../components/SalesOrder/DetailsComponent";
const routes = [
    { path: "/", component: ListComponent },
    { path: "/salesorder/:ref", name: "details", component: DetailsComponent, props: true },
];

const router = new VueRouter({
    routes, // short for `routes: routes`
    hashbank: false,
    mode: "history"
});

export default router;
