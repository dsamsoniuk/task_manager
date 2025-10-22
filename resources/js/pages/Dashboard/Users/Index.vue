<template>
      <AppLayout >

      <div class="m-4 overflow-x-auto">
        <h1 class="text-xl font-bold mb-4">Użytkownicy</h1>

        <Link href="/dashboard/users/create" class="btn btn-primary">Dodaj</Link>
<FlashMessage />



        <div class="">
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th><th>Nazwa</th><th>Email</th><th>Akcje</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="user in users.data" :key="user.id">
                  <td>{{ user.id }}</td>
                  <td>{{ user.name }}</td>
                  <td>{{ user.email }}</td>
                  <td>
                    <Link :href="`/dashboard/users/${user.id}/edit`" class="text-blue-500">Edytuj</Link>
                    <button type="button" @click="destroy(user.id)" class="text-red-500 ml-2 cursor-pointer">Usuń</button>
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

const props = defineProps({ users: Object})

function destroy(id) {
  if (confirm('Na pewno chcesz usunąć?')) {
    router.delete(`/dashboard/users/${id}`)
  }
}
</script>