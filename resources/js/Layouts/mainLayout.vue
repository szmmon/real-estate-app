<template>
    <Link href="/hello">show page</Link>
    <Link href="/">Main page</Link>
    <Link href="/listing">Listings</Link>
    <Link href="/listing/create">Create listing</Link>
    <div v-if="flashSuccess" class="success">
        {{ flashSuccess }}
    </div>
    <slot>default</slot>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { ref, computed } from "vue";
const page = usePage();
const flashSuccess = computed(() => page.props.flash.success);
</script>

<style scoped>
.success {
    background-color: green;
    color: white;
}
</style>
