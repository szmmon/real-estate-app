<template>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        <box v-for="listing in listings" :key="listing.id">
            <div>
                <Link :href="route('listing.show', { listing: listing.id })">
                    <Price :price="listing.price" class="text-2xl bold"/>
                    <ListingSpace :listing="listing" class="text-lg" />
                    <ListingAddress :listing="listing" class="text-gray" />
                </Link>
            </div>
            <div>
                <Link :href="route('listing.edit', { listing: listing.id })"
                    >Edit</Link
                >
            </div>
            <div>
                <Link
                    :href="route('listing.destroy', { listing: listing.id })"
                    method="delete"
                    as="button"
                    >Delete</Link
                >
            </div>
        </box>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import ListingAddress from "@/Components/listingAddress.vue";
import ListingSpace from "@/Components/listingSpace.vue";
import Price from "@/Components/price.vue"
import box from "@/Components/UI/box.vue";
defineProps({ listings: Array });
</script>
