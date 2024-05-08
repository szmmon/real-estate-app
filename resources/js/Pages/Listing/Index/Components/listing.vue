<template>
        <box>
            <div>
                <Link :href="route('listing.show', { listing: listing.id })">
                    <div class="flex items-center gap-1">
                        <Price :price="listing.price" class="text-2xl bold"/>
                        <div class="text-xs text-gray-500"> 
                            <Price :price="monthlyPayment"/>
                        </div>
                    </div>
                    <ListingSpace :listing="listing" class="text-lg" />
                    <ListingAddress :listing="listing" class="text-gray" />
                </Link>
            </div>
            <div>
                <Link :href="route('listing.show', { listing: listing.id })"
                    >Show</Link
                >
            </div>
        </box>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import ListingAddress from "@/Components/listingAddress.vue";
import ListingSpace from "@/Components/listingSpace.vue";
import Price from "@/Components/price.vue"
import box from "@/Components/UI/box.vue";
import { useMonthlyPayment } from "@/Composables/useMonthlyPayment.js";

const props = defineProps({listing: Object})
const { monthlyPayment } = useMonthlyPayment(props.listing.price, 2.5, 25);
</script>