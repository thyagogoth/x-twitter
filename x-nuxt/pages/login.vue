<script setup lang="ts">
import actions from '~/actions';
import type { LoginForm } from '~/actions/auth/login';
import { useAuthStore } from '~/stores/useAuthStore';

definePageMeta({
    layout: 'guest',
    middleware: ['guest']
})

const authStore = useAuthStore();

const form = ref<LoginForm>({
    email: 'admin@xapi.local',
    password: 'password'
})

const handleLogin = async () => {
    await actions.auth.login(form.value);
    navigateTo('/');
}

const getUser = async () => {
    console.log(authStore.user)
}
</script>

<template>
    <div>

        <!-- authentication form using tailwind css -->
        <div class="mx-auto w-1/4">
            <form class="bg-gray-900 shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit.prevent="handleLogin">
                <div class="mb-4">
                    <label class="block text-white text-sm font-bold mb-2" for="email">
                        Username
                    </label>
                    <input v-model="form.email"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline"
                        id="email" type="email" placeholder="email">
                </div>
                <div class="mb-6">
                    <label class="block text-white text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input v-model="form.password"
                        class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-black mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        id="password" type="password">
                </div>
                <div class="flex items-center justify-between">
                    <button @click="handleLogin"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="button">
                        Sign In
                    </button>
                    <button @click="getUser()"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="button">
                        Get User
                    </button>
                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
                        Forgot Password?
                    </a>
                </div>
            </form>
        </div>
    </div>
</template>