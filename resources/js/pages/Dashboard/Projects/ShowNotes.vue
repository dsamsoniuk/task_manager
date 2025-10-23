<template>
      <AppLayout >

      <div class="m-4 overflow-x-auto">
        <div class="border p-4">
          <h1 class="text-xl font-bold mb-4 border-b pb-2">{{ project.name }}</h1>
          <h4 class="mb-4 text-[grey]">Przypisane noty</h4>
          <div class="">
            <h4>{{ project.description }}</h4>
          </div>
        </div>

        <FlashMessage />

        <div class="m-3">
          <Link :href="`/dashboard/notes/create-by-project/${project.id }`" class="btn btn-accent">Dodaj note</Link>
        </div>

        <details v-for="note in notes" :key="note.id" class="collapse bg-base-100 border-base-300 border mb-2" >
          <summary class="collapse-title font-semibold">
               
            <div class="flex justify-between items-center p-4">
              <!-- Lewa strona -->
              <h1 class="text-xl font-bold text-gray-800">{{ note.title }}</h1>

              <!-- Prawa strona -->
              <div class="flex space-x-4">
                <Link :href="`/dashboard/notes/${note.id}/edit`" class="text-green-600 hover:underline">Edytuj</Link>
                <!-- <Link :href="`/dashboard/notes/${note.id}/edit`" class="text-green-600 hover:underline">Ukryj</Link> -->
                <div>priorytet: {{ note.priority }}</div>
              </div>
            </div>
          </summary>
          <div class="collapse-content text-sm pl-10 whitespace-pre-line overflow-y-auto max-h-150">
            {{ note.description }}
          </div>
        </details>

        <div class="m-3">
          <Link :href="`/dashboard/notes/create-by-project/${project.id }`" class="btn btn-accent">Dodaj note</Link>
        </div>
        
      </div>
  </AppLayout>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import AppLayout from '@/layouts/AppLayout.vue';
import  FlashMessage  from '@/components/FlashMessage.vue'

const props = defineProps({ notes: Object, project: Object})

</script>