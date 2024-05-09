<template>
    <h1 class="text-3xl mb-6">Your Listings</h1>
    <section>
        <RealtorFilters :filters="filters"/>
    </section>
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-2">
        <Box v-for="listing in listings.data" :key="listing.id" :class="{ 'border-dashed': listing.deleted_at }">
            <div class="flex flex-col md:flex-row gap-3 md:items-center justify-between" :class="{ 'opacity-25': listing.deleted_at }">
                <div class="xl:flex items-center gap-2">
                    <Price :price="listing.price" class="font-medium text-2xl"/>
                    <ListingSpace :listing="listing"/>
                    <ListingAddress :listing="listing" class="text-gray-500"/>
                </div>
                <section>
                    <div class="flex items-center gap-1 text-gray-600 dark:text-gray-300">
                    <Link as="button" :href="route('realtor.listing.edit', { listing: listing.id }) " class="btn-outline text-xs font-medium">
                        Edit
                    </Link>
                    <Link v-if="!listing.deleted_at" as="button" method="delete" 
                    :href="route('realtor.listing.destroy', { listing: listing.id })" class="btn-outline text-xs font-medium">
                        Delete
                    </Link>
                    <Link
                        v-else 
                        class="btn-outline text-xs font-medium" 
                        :href="route('realtor.listing.restore', { listing: listing.id })" 
                        as="button" 
                        method="put">
                        Restore
                    </Link>
                    </div>
                    <div class="mt-2">
                        <Link :href="route('realtor.listing.image.create', {listing: listing.id})" class="block w-full btn-outline text-xs font-md text-center"> Images
                        </Link>
                    </div>
                </section>
            </div>
        </Box>
    </section>

    <section v-if="listings.data.length" class="w-full flex justify-center mt-4 mb-4">
        <Pagination :links="listings.links" />
    </section>

</template>

<script setup>
import Box from '@/Components/UI/box.vue';
import Price from '@/Components/price.vue'
import ListingSpace from '@/Components/listingSpace.vue'
import ListingAddress from '@/Components/listingAddress.vue'
import { Link } from '@inertiajs/vue3'
import RealtorFilters from '@/Pages/Realtor/Index/Components/realtorFilters.vue';
import Pagination from '@/Components/UI/pagination.vue'
defineProps({
    filters: Object,
    listings: Object
})
</script>