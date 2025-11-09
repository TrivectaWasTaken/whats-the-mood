<script setup lang="ts">
import { useForm } from '@inertiajs/vue3'

const form = useForm({ email: '', password: '', remember: false })
const submit = () => {
    // for now, just stay on the page – you’ll wire this to a real route later
    console.log('submitted', form.data())
}
</script>

<template>
    <div class="min-h-svh grid place-items-center bg-gray-950 text-white">
        <div class="w-full max-w-sm bg-gray-900 p-6 rounded-xl shadow">
            <h1 class="text-xl font-semibold mb-4">Sign in</h1>
            <form @submit.prevent="submit" class="space-y-4">
                <div>
                    <label class="block text-sm mb-1">Email</label>
                    <input v-model="form.email" type="email" class="w-full rounded border px-3 py-2 bg-gray-800 border-gray-700" />
                </div>
                <div>
                    <label class="block text-sm mb-1">Password</label>
                    <input v-model="form.password" type="password" class="w-full rounded border px-3 py-2 bg-gray-800 border-gray-700" />
                </div>
                <label class="inline-flex items-center gap-2 text-sm">
                    <input v-model="form.remember" type="checkbox" />
                    <span>Remember me</span>
                </label>
                <button class="w-full rounded bg-emerald-600 text-white py-2" :disabled="form.processing">
                    Sign in
                </button>
            </form>
        </div>
    </div>
</template>
