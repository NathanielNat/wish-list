import Vue from 'vue'
import VueRouter from 'vue-router'
import ExampleComponent from './components/ExampleComponent'
import WishesCreate from './views/WishesCreate'


Vue.use(VueRouter)

export default new VueRouter({
    routes: [
        {path:"/", component: ExampleComponent},
        {path:"/wishes/create", component: WishesCreate},
    ],
    mode:'history'
})