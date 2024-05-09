<template>
    <Box>
    <template #header>Upload images</template>
    <form @submit.prevent="upload">
        <div class="my-4 flex items-center mx-2">
            <input type="file" multiple @input="addFiles" id="" class="border rounded-md file:px-4 file:py-2 border-gray-200 dark:border-gray-700 file:text-gray-700 dark:file:text-gray-400 file:border-0 file:bg-gray-100 dark:file:bg-gray-700 file:hover:bg-gray-200 dark:file:hover:bg-gray-600 file:cursor-pointer">
            <button type="submit" class="btn-outline disabled:opacity-25 disabled:cursor-not-allowed" :disabled="!canUpload">Upload</button>
            <button type="reset" @click="reset" class="btn-outline">Reset</button>
        </div>
        <div v-if="imageErrors.length" class="input-error">
        <div v-for="(error, index) in imageErrors" :key="index">
          {{ error }}
        </div>
      </div>
    </form>
    </Box>
    <Box v-if="listing.images.length" class="mt-4">
    <template #header>Current Listing Images</template>
    <section class="mt-4 grid grid-cols-3 gap-4">
    <div
        v-for="image in listing.images" :key="image.id" 
        class="flex flex-col justify-between"
      >
        <img :src="image.src" class="rounded-md" />
        <Link 
          :href="route('realtor.listing.image.destroy', { listing: props.listing.id, image: image.id })"
          method="delete"
          as="button"
          class="mt-2 btn-outline text-xs"
        >
          Delete
        </Link>
    </div>
    </section>
  </Box>

</template>

<script setup>
import Box from '@/Components/UI/box.vue';
import { Link, useForm } from "@inertiajs/vue3";
import { computed } from 'vue'
import { router } from '@inertiajs/vue3'
import NProgress from 'nprogress'

const props = defineProps({listing: Object})

router.on('progress', (event) => {
  if (event.detail.progress.percentage) {
    NProgress.set((event.detail.progress.percentage / 100) * 0.9)
  }
})

const form = useForm({
    images: []
})

const imageErrors = computed(() => Object.values(form.errors))
const upload = () => {
    form.post(
        route('realtor.listing.image.store', {listing: props.listing.id}),
        {
            onSuccess: () => form.reset('images')
        }
    )
}
const canUpload = computed(() => form.images.length)

const addFiles = (event) => {
    for(const image of event.target.files){
        form.images.push(image)
    }
}
const reset = () => form.reset('images')


</script>