<template>
    <form @submit.prevent="login">
        <div class="w-1/2 mx-auto">
            <div>
                <label class="label" for="email">E-mail (username)</label>
                <input type="text" name="" id="email" class="input" v-model="form.email"/>
                <div class="input-error">Potential error</div>
            </div>
            <div class="mt-3">
                <label class="label" for="password">Password</label>
                <input type="password" name="" id="password" class="input" v-model="form.password"/>
                <div class="input-error">Potential error</div>
            </div>
            <div class="mt-3">
                <button class="button-primary w-full" type="submit">Login</button>
            </div>
        </div>
    </form>
</template>


<script setup>
import { useForm } from '@inertiajs/vue3'
const form = useForm({
    email: null,
    password: null
})
const login = () => form.post(route('login.store'))
</script>