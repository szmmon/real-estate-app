<template>
    <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
        <Box  v-if="listing.images.length" class="col-span-12 md:col-span-7 flex items-center w-full">
            <div v-if="listing.images.length" class="grid grid-cols-2 gap-1">
              <img
                v-for="image in listing.images" :key="image.id"
                :src="image.src"
                />
            </div>
        </Box>
        <EmptyState v-else class="md:col-span-7 flex items-center">No images</EmptyState>
        <div class="md:col-span-5 flex flex-col gap-3">
        <Box>
            <template #header>Basic info</template>
            <Price :price="listing.price" class="text-2xl bold"/>
            <ListingSpace :listing="listing" class="text-lg" />
            <ListingAddress :listing="listing" class="text-gray" />
        </Box>
        <Box>
            <template #header>Monthly payment</template>
            <label class="label">Interest rate ({{interestRate}}%)</label>
                <input type="range" min="0.1" max="30"  name="" id="" class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" v-model.number="interestRate">
            <label class="label">Duration ({{duration}} years)</label>
                <input type="range" min="3" max="30"  name="" id="" class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" v-model.number="duration">

            <div class="text-gray-600 dark:text-gray-300 mt-2 ">
                <div class="text-gray-400">Your monthly payment</div>
                <Price :price="monthlyPayment" class="text-3xl bold"/>
            </div>
             <div class="mt-2 text-gray-500">
            <div class="flex justify-between">
              <div>Total paid</div>
              <div>
                <Price :price="totalPaid" class="font-medium" />
              </div>
            </div>
            <div class="flex justify-between">
              <div>Principal paid</div>
              <div>
                <Price :price="listing.price" class="font-medium" />
              </div>
            </div>
            <div class="flex justify-between">
              <div>Interest paid</div>
              <div>
                <Price :price="totalInterest" class="font-medium" />
              </div>
            </div>
          </div>
        <MakeOffer 
        v-if="!offerMade"
        :listing-id="listing.id"
        :price="listing.price" 
        @offer-updated="offer = $event"
        />

        <OfferMade v-if="offerMade" :offer="offerMade" />
        </Box>
        </div>
    </div>
</template>

<script setup>
import Box from "@/Components/UI/box.vue";
import ListingAddress from "@/Components/listingAddress.vue";
import ListingSpace from "@/Components/listingSpace.vue";
import Price from "@/Components/price.vue";
import MakeOffer from '@/Pages/Listing/Show/Components/makeOffer.vue'
import OfferMade from '@/Pages/Listing/Show/Components/offerMade.vue'
import EmptyState from '@/Components/UI/emptyState.vue'
import {ref, computed} from 'vue'
import {useMonthlyPayment} from '@/Composables/useMonthlyPayment'
import { usePage } from "@inertiajs/vue3";

const interestRate = ref(2.5)
const duration = ref(25)
const props = defineProps({
    listing: Object,
    offerMade: Object 
});

const offer = ref(props.listing.price)




const { monthlyPayment, totalPaid, totalInterest } = useMonthlyPayment(
  offer, interestRate, duration,
)</script>
