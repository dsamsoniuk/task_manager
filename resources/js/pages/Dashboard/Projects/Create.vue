<template>
  <AppLayout>
  <div class="m-4">
        <Link :href="`/dashboard/projects`" class="text-blue-500">powrót</Link>

    <h1 class="text-xl font-bold mb-4">Nowy project</h1>

    <form @submit.prevent="submit">
          <div>
            <fieldset class="fieldset">
              <legend class="fieldset-legend">Nazwa</legend>
              <input v-model="form.name" type="text" class="input" placeholder="Nazwa"/>
              <span class="text-red-500">{{ form.errors.name }}</span>
            </fieldset>
          </div>

          <div>
            <fieldset class="fieldset">
              <legend class="fieldset-legend">Priorytet</legend>
              <input v-model="form.priority" type="number" class="input" placeholder="priority"/>
            </fieldset>
          </div>
          
          <div>
            <fieldset class="fieldset">
              <legend class="fieldset-legend">Opis</legend>
              <textarea v-model="form.description" class="input" placeholder="description" rows="100"></textarea>
            </fieldset>
          </div>

      <button type="submit" class="btn btn-primary mt-4">Zapisz</button>
    </form>
  </div>
  </AppLayout>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import AppLayout from '@/layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3'

const form = useForm({
  name: '',
  description: '',
})

function submit() {
  form.post('/dashboard/projects')
}
</script>