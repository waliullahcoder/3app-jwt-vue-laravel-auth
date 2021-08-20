<template>
<div>
    <router-link to="/">Home </router-link><br>
    <a href="/"><i class="iccl iccl-user"></i></a> {{ user.name }} (Birth: {{ user.created_at | formatDate }})</a><br>

    <div v-if="user && user.id">
        <router-link to="/dashboard">Dashboard</router-link><br>
        <a @click.prevent="userLogout()">Logout</a><br>
    </div>
    <div v-else>
        <router-link to="/user-login">Login</router-link><br>
        <router-link to="/user-register">Register</router-link><br>
    </div>

</div>
</template>

<script>
export default {
    name: "Menubar",
    computed: {
        user() {
            return this.$store.getters["getAuthUser"];
        },
    },
    methods: {
        getUser() {
            this.$store.dispatch("getUser");
        },
        userLogout() {
            this.$store.dispatch("userLogout");
            localStorage.removeItem("userLoggedIn");
            this.$router.push({
                name: "Home"
            });
            this.$message({
                showClose: true,
                message: "Logout Successfully!",
            });
        },
    },

    created() {
        this.getUser();
    },
    mounted() {
        console.log("Component mounted.");
    },
};
</script>

<style>
</style>
