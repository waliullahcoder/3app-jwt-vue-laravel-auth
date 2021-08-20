<template>
<div class="container" style="padding:50px;">
   <Menubar></Menubar>
    <div class="row">

       
        <router-view></router-view>

    </div>
</div>
</template>

<script>
import Menubar from './frontend/includes/Menubar';

export default {

    mounted() {
        console.log('Component mounted.')
    },

    components: {
        Menubar,

    },
}
</script>
