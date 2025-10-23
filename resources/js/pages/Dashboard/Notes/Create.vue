<template>
  <AppLayout>
  <div class="m-4">
        <Link :href="`/dashboard/projects`" class="text-blue-500">powrót</Link>

    <h1 class="text-xl font-bold mb-4">Nowa nota</h1>

    <form @submit.prevent="submit">
          <div>
            <fieldset class="fieldset">
              <legend class="fieldset-legend">Tytul</legend>
              <input v-model="form.title" type="text" class="input" placeholder="Nazwa"/>
              <span class="text-red-500">{{ form.errors.title }}</span>
            </fieldset>
          </div>

          <div>
            <fieldset class="fieldset">
              <legend class="fieldset-legend">Opis</legend>
              <textarea v-model="form.description" class="input" placeholder="description" rows="100"></textarea>
              <span class="text-red-500">{{ form.errors.description }}</span>

            </fieldset>
          </div>

          <div>
            <fieldset class="fieldset">
              <legend class="fieldset-legend">Priorytet</legend>
              <input v-model="form.priority" type="number" class="input" placeholder="Priorytet" />
              <span class="text-red-500">{{ form.errors.priority }}</span>
            </fieldset>
          </div>

          <div>
            <fieldset class="fieldset">
              <legend class="fieldset-legend">Widoczny</legend>
              <select  v-model="form.is_visible" class="input">
                <option value="1">Tak</option>
                <option value="0">Nie</option>
              </select>
              <span class="text-red-500">{{ form.errors.is_visible }}</span>
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

const props = defineProps({
  project: Object,
})

const form = useForm({
  project_id: props.project ? props.project.id : null,
  title: '',
  description: '',
  priority: 0,
  is_visible: 1,
})

function submit() {
  form.post('/dashboard/notes')
}
</script>