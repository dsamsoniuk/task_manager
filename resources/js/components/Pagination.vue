<script setup lang="ts">
import { router } from '@inertiajs/vue3'


const props = defineProps({
    baseUrl: { type: String , required: true},
    currentPage: { type: Number, required: true},
    totalPages: { type: Number, required: true},
})

const goToPage = (page: number) => {
  if (page < 1 || page > props.totalPages) return
  router.visit(`${props.baseUrl}?page=${page}`)
}
const createLink = (page: number) => {
    return `${props.baseUrl}?page=${page}`;
}

</script>

<template>
  <div class="flex justify-center items-center space-x-2 mt-6">
    <!-- Poprzednia -->
    <a
    :href="createLink(currentPage - 1)"
    :disabled="currentPage === 1"
    class="px-3 py-1 rounded border text-sm"
    :class="currentPage === 1 ? 'text-gray-400 border-gray-200 invisible' : 'hover:bg-gray-100'"
    >
        ← Poprzednia
    </a>
    <!-- Numery stron -->
    <template v-for="page in totalPages" :key="page">

        <a
        :href="createLink(page)"
        :disabled="page === 1"
        class="px-3 py-1 rounded border text-sm"
        :class="page === currentPage
          ? 'bg-blue-600 text-white border-blue-600'
          : 'border-gray-300 hover:bg-gray-100 text-gray-700'"
        >
         {{ page }}
        </a>

    </template>

    <!-- Następna -->
        <a
        :href="createLink(currentPage + 1)"
        :disabled="currentPage === totalPages"
        class="px-3 py-1 rounded border text-sm"
        :class="currentPage === totalPages ? 'text-gray-400 border-gray-200 invisible' : 'hover:bg-gray-100'"
        >
         Następna →
        </a>

  </div>
</template>

<style scoped>
button[disabled] {
  cursor: not-allowed;
}
</style>