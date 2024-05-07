<template>
    <form action="">
        <div class="flex flex-wrap gap-2 mt-2 mb-8">
            <div class="flex flex-nowrap items-center">
                <input type="text" name="" id="" placeholder="Price from" class="input-filter-l w-28">
                <input type="text" name="" id="" placeholder="Price to" class="input-filter-r w-28">
            </div>

            <div class="flex flex-nowrap items-center">
                <select name="" id="" class="input-filter-l w-28">
                    <option :value="null">Beds</option>
                    <option v-for="n in 5 " :key="n" :value="n">{{ n }}</option>
                    <option :value="null">6+</option>
                </select>
                <select name="" id="" class="input-filter-r w-28">
                    <option :value="null">Baths</option>
                    <option v-for="n in 5 " :key="n" :value="n">{{ n }}</option>
                    <option :value="null">6+</option>
                </select>
            </div>

            <div class="flex flex-nowrap items-center">
                <input type="text" name="" id="" placeholder="Area from" class="input-filter-l w-28"> 
                <input type="text" name="" id="" placeholder="Area to" class="input-filter-r w-28">
            </div>
            <button type="submit" class="btn-normal">Filter</button>
            <button type="reset" class="btn-normal">Clear</button>
        </div>
    </form>
</template>

<script setup></script>