<script setup>
import {RouterLink, RouterView} from 'vue-router'
import uiNav from './components/ui/uiNav.vue'
import {onMounted} from "vue"
</script>

<template>

    <ui-nav/>

    <div class="container my-5 px-2 mx-auto">
        <RouterView/>
    </div>

</template>

<style scoped>

</style>
