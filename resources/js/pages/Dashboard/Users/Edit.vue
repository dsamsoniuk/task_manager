<template>
    <AppLayout >

      <div class="m-4">
        <Link :href="`/dashboard/users`" class="text-blue-500">powrót</Link>

        <h1 class="text-xl font-bold mb-4">Edytuj użytkownika</h1>

        <form @submit.prevent="submit">
          <div>
            <fieldset class="fieldset">
              <legend class="fieldset-legend">Nazwa</legend>
              <input v-model="form.name" type="text" class="input" placeholder="Nazwa"/>
            </fieldset>
          </div>

          <div>
            <fieldset class="fieldset">
              <legend class="fieldset-legend">Email</legend>
              <input v-model="form.email" type="email" class=" input" placeholder="Email"/>
              <span class="text-red-500">{{ form.errors.email }}</span>
            </fieldset>
          </div>

          <div>
            <fieldset class="fieldset">
              <legend class="fieldset-legend">Hasło</legend>
              <input v-model="form.password" type="password" class="input" placeholder="Hasło (opcjonalnie)"/>
              <div class="label">Optional</div>
              <span class="text-red-500">{{ form.errors.password }}</span>
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
  user: Object
})

const form = useForm({
  id: props.user.id,
  name: props.user.name,
  email: props.user.email,
  password: '',
})

function submit() {
  form.put(`/dashboard/users/${props.user.id}`)
}
</script>
