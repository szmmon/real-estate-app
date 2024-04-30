<template>
    <ListingAddress :listing="listing" />
</template>

<script setup>
import ListingAddress from "@/Components/listingAddress.vue";
defineProps({
    listing: Object,
});
</script>
