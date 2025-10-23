<template>
      <AppLayout >

      <div class="m-4 overflow-x-auto">
        <h1 class="text-xl font-bold mb-4">Projekty</h1>

        <Link href="/dashboard/projects/create" class="btn btn-primary">Dodaj</Link>
        <FlashMessage />

        <div class="">
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th><th>Nazwa</th><th>priority</th><th>Akcje</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="project in projects.data" :key="project.id">
                  <td>{{ project.id }}</td>
                  <td>{{ project.name }}</td>
                  <td>{{ project.priority }}</td>
                  <td>
                    <Link :href="`/dashboard/projects/${project.id}/edit`" class="text-blue-500">Edytuj</Link>
                    <button type="button" @click="destroy(project.id)" class="text-red-500 ml-2 cursor-pointer">Usuń</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

      </div>
  </AppLayout>
</template>

<script setup>
import { Link, router } from '@inertiajs/vue3'
import AppLayout from '@/layouts/AppLayout.vue';
import  FlashMessage  from '@/components/FlashMessage.vue'

const props = defineProps({ projects: Object})

function destroy(id) {
  if (confirm('Na pewno chcesz usunąć?')) {
    router.delete(`/dashboard/projects/${id}`)
  }
}
</script>