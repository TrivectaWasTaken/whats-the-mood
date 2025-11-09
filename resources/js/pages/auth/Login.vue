<script setup lang="ts">
import { useForm } from '@inertiajs/vue3'

const form = useForm({
    email: '',
    password: '',
    remember: false,
})

function submit() {
    form.post('/login')
}
</script>

<template>
    <div class="min-h-screen grid place-items-center bg-gray-50">
        <div class="w-full max-w-sm bg-white p-6 rounded-xl shadow">
            <h1 class="text-xl font-semibold mb-4">Sign in</h1>

            <form @submit.prevent="submit" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Email</label>
                    <input v-model="form.email" type="email" class="w-full border rounded px-3 py-2" />
                    <div v-if="form.errors.email" class="text-sm text-red-600 mt-1">{{ form.errors.email }}</div>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Password</label>
                    <input v-model="form.password" type="password" class="w-full border rounded px-3 py-2" />
                    <div v-if="form.errors.password" class="text-sm text-red-600 mt-1">{{ form.errors.password }}</div>
                </div>

                <label class="inline-flex items-center space-x-2 text-sm">
                    <input v-model="form.remember" type="checkbox" />
                    <span>Remember me</span>
                </label>

                <button
                    :disabled="form.processing"
                    class="w-full mt-2 rounded bg-emerald-600 text-white py-2 disabled:opacity-50"
                >
                    Sign in
                </button>
            </form>
        </div>
    </div>
</template>
