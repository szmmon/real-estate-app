<template>
    <form @submit.prevent="register">
        <div class="w-1/2 mx-auto">
            <div>
                <label class="label" for="name">Your name</label>
                <input type="text" id="name" class="input" v-model="form.name"/>
                <div class="input-error" v-if="form.errors.name">{{ form.errors.name }}</div>
            </div>
            <div class="mt-3">
                <label class="label" for="email">E-mail</label>
                <input type="text" name="" id="email" class="input" v-model="form.email"/>
                <div class="input-error" v-if="form.errors.email">{{ form.errors.email }}</div>
            </div>
            <div class="mt-3">
                <label class="label" for="password">Password</label>
                <input type="password" name="" id="password" class="input" v-model="form.password"/>
                <div class="input-error" v-if="form.errors.password">{{form.errors.password}}</div>
            </div>
            <div class="mt-3">
                <label class="label" for="password_confirmation">Confirm password</label>
                <input type="password" name="" id="password_confirmation" class="input" v-model="form.password_confirmation"/>
                <div class="input-error" v-if="form.errors.password_confirmation">{{form.errors.password_confirmation}}</div>
            </div>
            <div class="mt-3">
                <button class="button-primary w-full" type="submit">Create Account</button>

                <div class="mt-3 text-center">
                    <Link :href="route('login')" class="text-sm text-gray-400" as="button">Already have account? Log in instead</Link>
                </div>
            </div>
        </div>
    </form>
</template>


<script setup>
import { Link ,useForm } from '@inertiajs/vue3'
const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null
})
const register = () => form.post(route('user-account.store'));
</script>