<template>
<div>
    <h3>User Dashboard </h3>

    <h1>Users</h1>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
        <tr v-for="us in allusers" :key="us.id">
            <td>{{us.id}}</td>
            <td>{{us.name}}</td>
        </tr>
    </table>
</div>
</template>

<script>
export default {

    data() {
        return {
            allusers: {},
            orders: {},
        }
    },

    methods: {

        userLoader() {
            //console.log()
            axios.get("/user/list")
                .then(({
                    data
                }) => (this.allusers = data));
        },


    },
    created() {
        this.userLoader();
        this.orderLoader();
    },

    mounted() {
        console.log('Component mounted.')
    },
}
</script>
