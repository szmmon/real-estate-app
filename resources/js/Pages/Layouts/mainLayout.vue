<template>
    <Link href="/hello">show page</Link>
    <Link href="/">Main page</Link>
    <div>Hello {{ counter }}</div>
    <slot>default</slot>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";
const counter = ref(0);
setInterval(() => counter.value++, 1000);
</script>
