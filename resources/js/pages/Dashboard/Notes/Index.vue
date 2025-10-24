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
                <tr v-for="note in noteList.data" :key="note.id">
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
            :current-page="noteList.current_page" 
            :total-pages="noteList.last_page"
            @run-parent-fn="loadNotesByPage"
          />
      </div>
  </AppLayout>
</template>

<script setup>
import { Link, router } from '@inertiajs/vue3'
import AppLayout from '@/layouts/AppLayout.vue';
import  FlashMessage  from '@/components/FlashMessage.vue'
import Pagination from '@/components/Pagination.vue'
import { ref } from 'vue';
import axios from 'axios'

const props = defineProps({ notes: Object})
const noteList = ref({ ...props.notes})

function destroy(id) {
  if (confirm('Na pewno chcesz usunąć?')) {
    router.delete(`/dashboard/notes/${id}`)
  }
}

async function loadNotesByPage(data) {
  try {
    const response = await axios.get(`/dashboard/notes/by-page/${data.page}`)
    noteList.value = response.data.notes
  } catch (err) {
    console.log('Nie udało się pobrać danych.')
  }
}
</script>