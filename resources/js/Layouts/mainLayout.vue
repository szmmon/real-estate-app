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
                <div v-if="user" class="flex items-center gap-4">
                    <Link :href="route('realtor.listing.index')" class="text-sm text-gray-400" >
                        {{ user.email }}
                    </Link>
                    <div class="button-primary">
                        <Link :href="route('realtor.listing.create')">Create listing</Link>
                    </div>
                    <div>
                        <Link :href="route('logout')" method="delete" as="button"> Logout </Link>
                    </div>
                </div>
                <div class="flex items-center gap-4" v-else>
                    <Link :href="route('login')" as="button"> Sign-in </Link>
                    <Link :href="route('user-account.create')" as="button"> New user </Link>
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
const user = computed(() => page.props.user);
</script>

