<script setup lang="ts">
type Work = {
    id:number;
    title:string;
    year?:number|null;
    cover_url?:string|null
}
type Paginator<T> = {
    data: T[]
}

const { type, items } = defineProps<{
    type: string
    items: Paginator<Work>
}>()
</script>

<template>
    <div class="max-w-5xl mx-auto py-10">
        <h1 class="text-2xl font-bold capitalize mb-6">{{ type }} – Wishlist</h1>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div v-for="w in items.data" :key="w.id" class="rounded-xl shadow p-3">
                <img v-if="w.cover_url" :src="w.cover_url" class="rounded-lg w-full h-44 object-cover mb-2" />
                <div class="font-medium">{{ w.title }}</div>
                <div v-if="w.year" class="text-xs text-gray-500">{{ w.year }}</div>
            </div>
        </div>
    </div>
</template>
