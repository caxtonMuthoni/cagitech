import Home from '../components/Home.vue'
import Services from '../components/Services.vue'
import Technologies from '../components/Technologies.vue'
import Testimonies from '../components/Testimonies.vue'
import Users from '../components/Users.vue'
import Inbox from '../components/Inbox.vue'


const routes = [
    {
        path: '/home',
        component: Home
    },

    {
        path: '/svs',
        component: Services
    },

    {
        path: '/techs',
        component: Technologies
    },

    {
        path: '/users',
        component: Users
    },

    {
        path: '/testimonies',
        component: Testimonies
    },

    {
        path: '/inbox',
        component: Inbox
    }
]




export default routes;