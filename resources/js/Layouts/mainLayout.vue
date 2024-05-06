<template>
    <header class="border-b border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800 w-full">
        <div class="container mx-auto">
            <nav class="p-4 flex items-center justify-between">
                <div class="font-medium text-lg">
                    <Link :href="route('listing.index')">Listings</Link>
                </div>
                <div class="font-medium text-indigo-200 dark:text-indigo-500 text-xl text-center bold">
                    <Link :href="route('listing.index')">App</Link>
                </div>
                <div class="button-primary">
                    <Link :href="route('listing.create')">Create listing</Link>
                </div>
            </nav>
        </div>
    </header>
    <main class="container mx-auto p-4 w-full">
        <div v-if="flashSuccess" class="mb-4 border rounded-md shadow-sm border-green-400 dark:border-green-600 bg-green-400 dark:bg-green-600 p-2">
            {{ flashSuccess }}
        </div>
        <slot>default</slot>
    </main>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { ref, computed } from "vue";
const page = usePage();
const flashSuccess = computed(() => page.props.flash.success);
</script>

