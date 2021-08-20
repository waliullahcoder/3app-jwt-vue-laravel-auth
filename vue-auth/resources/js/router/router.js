import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Home from '../components/frontend/pages/Home';

import Login from '../components/frontend/pages/Login';
import Register from '../components/frontend/pages/Register';

import UserDashboard from '../components/frontend/users/UserDashboard';
const router = new VueRouter({
    mode:'history',
  routes:[
      { path:'/', component: Home, name:'Home' },
      { path:'/user-register', component: Register, name:'Register' },
      {
          path:'/user-login', component: Login, name:'Login',
          beforeEnter: (to, from, next) => {
              const isAuthenticated = localStorage.getItem('userLoggedIn') ? true: false;
              if(to.name == 'Login' && isAuthenticated) next({name: 'UserDashboard'})
              else next()
          }
          },
      {
          path:'/dashboard', component: UserDashboard, name:'UserDashboard',
          beforeEnter: (to, from, next) => {
              const isAuthenticated = localStorage.getItem('userLoggedIn') ? true: false;
              if(to.name !== 'Login' && !isAuthenticated) next({name: 'Login'})
              else next()
          }
      },
  ]
})

export default router;
