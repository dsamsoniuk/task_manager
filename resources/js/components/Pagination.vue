<script setup lang="ts">

const props = defineProps({
    currentPage: { type: Number, required: true},
    totalPages: { type: Number, required: true},
})

const emit = defineEmits(['run-parent-fn'])
function triggerParent(page: number) {
  emit('run-parent-fn', { page: page })
}
</script>

<template>
  <div class="flex justify-center items-center space-x-2 mt-6">

    <!-- Poprzednia -->
      <button 
        type="button" 
      :disabled="currentPage === 1"
      class="px-3 py-1 rounded border text-sm"
      :class="currentPage === 1 ? 'text-gray-400 border-gray-200' : 'hover:bg-gray-100'"
        @click="triggerParent(currentPage - 1)"
      >
        ← Poprzednia
      </button>

    <!-- Numery stron -->
    <template v-for="page in totalPages" :key="page">

        <button 
          type="button" 
          :disabled="page === currentPage"
          class="px-3 py-1 rounded border text-sm"
          :class="page === currentPage
            ? 'bg-blue-600 text-white border-blue-600'
            : 'border-gray-300 hover:bg-gray-100 text-gray-700'"
          @click="triggerParent(page)"
        >{{ page }}</button>

    </template>

    <!-- Następna -->
      <button 
        type="button" 
      :disabled="currentPage === totalPages"
      class="px-3 py-1 rounded border text-sm"
      :class="currentPage === totalPages ? 'text-gray-400 border-gray-200' : 'hover:bg-gray-100'"
        @click="triggerParent(currentPage + 1)"
      >
        Następna →
      </button>

  </div>
</template>

<style scoped>
button[disabled] {
  cursor: not-allowed;
}
</style>