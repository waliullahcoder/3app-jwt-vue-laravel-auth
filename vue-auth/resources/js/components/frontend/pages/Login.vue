<template>

        <form method="post" @submit.prevent="userLogin()">

            <h3 class="head-title">Login</h3>

            <p class="form-row">
                <label for="-email">Email <span class="required">*</span></label>
                <input type="email" name="email" v-model="form.email">
                <span class="text-danger" v-if="errors['email']">
                    {{errors['email'][0]}}
                </span>
            </p>
            <p class="form-row">
                <label for="-password">Password <span class="required">*</span></label>
                <input type="password" name="password" v-model="form.password">
                <span class="text-danger" v-if="errors['password']">
                    {{errors['password'][0]}}
                </span>
            </p>
            <input type="submit" value="Login" class="button button_primary w__100 tu js_add_ld">
            <br>
            <p class="mb__10 mt__20">New customer?
                <router-link to="/register" data-id="#RegisterForm" class="link_acc">Create your account</router-link>
            </p>

        </form>
  
</template>

<script>
export default {
    name: 'Login',
    data() {
        return {
            form: {},
            errors: {}
        }
    },
    methods: {
        userLogin: function () {
            axios.post('/login', this.form)
                .then((result) => {
                    //console.log(result)
                    //For page reload
                    Render.$emit('PageReload');
                    localStorage.setItem('userLoggedIn', true)
                    this.$router.push({
                        name: 'UserDashboard'
                    })

                }).catch((err) => {
                    this.errors = err.response.data.errors
                });
        }
    },
    created() {

        //For page reload
        Render.$on('PageReload', () => {
            this.$store.dispatch('getUser');
        })
        //For page reload
    },
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
