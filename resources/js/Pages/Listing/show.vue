<template>
    <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
        <Box class="col-span-12 md:col-span-7 flex items-center w-full">
            <div class="w-full text-center font-medium text-gray-500">No images</div>
        </Box>
        <div class="md:col-span-5 flex flex-col gap-3">
        <Box>
            <template #header>Basic info</template>
            <Price :price="listing.price" class="text-2xl bold"/>
            <ListingSpace :listing="listing" class="text-lg" />
            <ListingAddress :listing="listing" class="text-gray" />
        </Box>
        <Box>
            <template #header>Offer</template>
            Make an offer
        </Box>
        </div>
        
    </div>
</template>

<script setup>
import Box from "@/Components/UI/box.vue";
import ListingAddress from "@/Components/listingAddress.vue";
import ListingSpace from "@/Components/listingSpace.vue";
import Price from "@/Components/price.vue";
defineProps({
    listing: Object,
});
</script>
