<template>
    <AppLayout >

      <div class="m-4">
        <Link :href="`/dashboard/project-notes/${note.project_id}`" class="text-blue-500">powrót</Link>

        <h1 class="text-xl font-bold mb-4">Edytuj noty</h1>

        <form @submit.prevent="submit">
          <div>
            <fieldset class="fieldset">
              <legend class="fieldset-legend">title</legend>
              <input v-model="form.title" type="text" class="input" placeholder="title"/>
            </fieldset>
          </div>

          <div>
            <fieldset class="fieldset">
              <legend class="fieldset-legend">Opis</legend>
              <textarea v-model="form.description" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 " placeholder="description" rows="15" cols="33"></textarea>
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

          <button type="submit" class="btn btn-primary mt-4">Zaktualizuj</button>
        </form>
      </div>
  </AppLayout>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import AppLayout from '@/layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3'

const props = defineProps({
  note: Object,
})

const form = useForm({
  title: props.note.title,
  project_id: props.note.project_id,
  description: props.note.description,
  priority: props.note.priority,
  is_visible: props.note.is_visible,
})

function submit() {
  form.put(`/dashboard/notes/${props.note.id}`)
}
</script>
