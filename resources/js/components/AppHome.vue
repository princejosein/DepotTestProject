<template>
    <div>
        <app-toolbar></app-toolbar>
        <router-view></router-view>
        <app-footer></app-footer>
    </div>
</template>

<script>
import AppToolbar from './AppToolbar.vue';
import AppFooter from './AppFooter.vue';
export default {
    components:{AppToolbar, AppFooter}
}
</script>

<style>

</style>
