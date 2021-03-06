import Vue from 'vue'
import VueRouter from 'vue-router'
import ExampleComponent from './components/ExampleComponent'
import Logout from './components/Logout'
import WishesCreate from './views/WishesCreate'
import WishesShow from './views/WishesShow'
import WishesEdit from './views/WishesEdit'
import WishesIndex from './views/WishesIndex'


Vue.use(VueRouter)

export default new VueRouter({
    routes: [
        {path:"/", component: ExampleComponent},
        {path:"/wishes", component: WishesIndex},
        {path:"/wishes/create", component: WishesCreate},
        {path:"/wishes/:id", component: WishesShow},
        {path:"/wishes/:id/edit", component: WishesEdit},
        {path:"/logout", component: Logout},
    ],
    mode:'history'
})