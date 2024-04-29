<template>
    <div>Index</div>
    {{ message }}
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
defineProps(["message"]);
</script>
