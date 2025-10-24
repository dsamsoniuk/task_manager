<template>
      <AppLayout >

      <div class="m-4 overflow-x-auto">
        <h1 class="text-xl font-bold mb-4">Noty</h1>

        <!-- <Link href="/dashboard/notes/create" class="btn btn-primary">Dodaj</Link> -->
        <FlashMessage />

        <div class="">
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th><th>Tytuł</th><th>Widoczny</th><th>Akcje</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="note in notes.data" :key="note.id">
                  <td>{{ note.id }}</td>
                  <td>{{ note.title }}</td>
                 <td>{{ note.is_visible ? 'Tak' : 'Nie' }}</td>

                  <td>
                    <Link :href="`/dashboard/notes/${note.id}/edit`" class="text-blue-500">Edytuj</Link>
                    <button type="button" @click="destroy()" class="text-red-500 ml-2 cursor-pointer">Usuń</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <Pagination 
            :base-url="props.notes.path" 
            :current-page="props.notes.current_page" 
            :total-pages="props.notes.last_page" 
          />
      </div>
  </AppLayout>
</template>

<script setup>
import { Link, router } from '@inertiajs/vue3'
import AppLayout from '@/layouts/AppLayout.vue';
import  FlashMessage  from '@/components/FlashMessage.vue'
import Pagination from '@/components/Pagination.vue'


const props = defineProps({ notes: Object})
function destroy(id) {
  if (confirm('Na pewno chcesz usunąć?')) {
    router.delete(`/dashboard/notes/${id}`)
  }
}
</script>