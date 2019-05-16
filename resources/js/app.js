require("./bootstrap")

import Vue from "vue"

import VueRouter from "vue-router"
Vue.use(VueRouter)

import VueAxios from "vue-axios"
import axios from "axios"
Vue.use(VueAxios, axios)

import App from "./App.vue"
import DisplayProjects from "./components/DisplayProjects.vue"
import CreateProject from "./components/CreateProject.vue"
import ViewProject from "./components/ViewProject.vue"
import EditProject from "./components/EditProject.vue"
import DeleteProject from "./components/DeleteProject.vue"

import Contact from "./components/Contact.vue"
import About from "./components/About.vue"

import Register from "./components/Register.vue"
import Login from "./components/Login.vue"

axios.defaults.baseURL = "https://austins.page/"

const routes = [
    {
        name: "DisplayProjects",
        path: "/",
        component: DisplayProjects
    },
    {
        name: "CreateProject",
        path: "/projects/create",
        component: CreateProject,
        meta: {
            auth: true
        }
    },
    {
        name: "ViewProject",
        path: "/project/:id",
        component: ViewProject
    },
    {
        name: "EditProject",
        path: "/edit/:id",
        component: EditProject,
        meta: {
            auth: true
        }
    },
    {
        name: "DeleteProject",
        path: "/delete",
        component: DeleteProject,
        meta: {
            auth: true
        }
    },
    {
        name: "Contact",
        path: "/contact",
        component: Contact
    },
    {
        name: "About",
        path: "/about",
        component: About
    },
    {
        name: "Login",
        path: "/login",
        component: Login,
        meta: {
            auth: false
        }
    },
    {
        name: "Register",
        path: "/register",
        component: Register,
        meta: {
            auth: false
        }
    }
]

const router = new VueRouter({
    scrollBehavior(to, from) {
        return { x: 0, y: 0 }
    },
    mode: "history",
    routes: routes
})

Vue.router = router

Vue.use(require("@websanova/vue-auth"), {
    auth: require("@websanova/vue-auth/drivers/auth/bearer.js"),
    http: require("@websanova/vue-auth/drivers/http/axios.1.x.js"),
    router: require("@websanova/vue-auth/drivers/router/vue-router.2.x.js")
})

App.router = Vue.router

new Vue(Vue.util.extend({ router }, App)).$mount("#app")