window.Vue = require('vue').default;
import Vuex from 'vuex'
Vue.use(Vuex)
const store = new Vuex.Store({
    state: {
        user: {}
    },
    getters:{
        getAuthUser(state){
            return state.user;
        }
    },
    actions:{
        getUser(context){
            axios.get('/user')
                .then((result)=>{
                    context.commit('getUser', result.data)
                })
        },
        userLogout(context){
            axios.post('/logout')
                .then(res=>{
                    context.commit('getUser', res.data)
                })
        }

    },
    mutations: {
        getUser(state, payload){
            return state.user= payload
        }
    }

})

export default store;
