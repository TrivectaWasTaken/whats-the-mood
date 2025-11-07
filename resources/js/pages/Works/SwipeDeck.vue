<script setup lang="ts">
import { router, useForm } from '@inertiajs/vue3'
import { ref } from 'vue'

type Work = { id:number; title:string; year?:number|null; cover_url?:string|null }

const props = defineProps<{
    type: 'book'|'movie'|'game'
    work: Work | null
}>()

const current = ref<Work | null>(props.work)

const form = useForm<{ work_id:number|null; direction:'like'|'dislike'|null }>({
    work_id: null,
    direction: null,
})

function swipe(dir: 'like' | 'dislike') {
    if (!current.value) return
    form.work_id = current.value.id
    form.direction = dir
    form.post('/swipes', {
        preserveScroll: true,
        onSuccess: () => router.visit(`/works/${props.type}`, { replace: true }),
    })
}

window.addEventListener('keydown', (e) => {
    if (e.key === 'ArrowLeft') swipe('dislike')
    if (e.key === 'ArrowRight') swipe('like')
})
</script>

<template>
    <div class="max-w-xl mx-auto py-10">
        <h1 class="text-2xl font-bold capitalize mb-6">{{ props.type }}</h1>

        <div v-if="!current" class="text-center text-gray-500">
            You’ve seen them all for now 🎉
        </div>

        <div v-else class="rounded-2xl shadow p-4">
            <img v-if="current.cover_url" :src="current.cover_url" class="rounded-xl w-full object-cover mb-4" />
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-xl font-semibold">{{ current.title }}</div>
                    <div v-if="current.year" class="text-sm text-gray-500">{{ current.year }}</div>
                </div>
                <div class="space-x-2">
                    <button class="px-4 py-2 rounded-xl bg-gray-200" @click="swipe('dislike')">Nope</button>
                    <button class="px-4 py-2 rounded-xl bg-emerald-500 text-white" @click="swipe('like')">Like</button>
                </div>
            </div>
        </div>

        <div class="mt-6">
            <a :href="`/works/${props.type}/wishlist`" class="underline">Go to Wishlist</a>
        </div>
    </div>
</template>
