<template>
  <AppLayout>
  <div class="m-4">
        <Link :href="`/dashboard/users`" class="text-blue-500">powrót</Link>

    <h1 class="text-xl font-bold mb-4">Nowy użytkownik</h1>

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
              <legend class="fieldset-legend">Email</legend>
              <input v-model="form.email" type="email" class=" input" placeholder="Email"/>
              <span class="text-red-500">{{ form.errors.email }}</span>
            </fieldset>
          </div>

          <div>
            <fieldset class="fieldset">
              <legend class="fieldset-legend">Hasło</legend>
              <input v-model="form.password" type="password" class="input" placeholder="Hasło"/>
              <span class="text-red-500">{{ form.errors.password }}</span>
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
import UserForm from '@/forms/UserForm'
const form = useForm(new UserForm())

function submit() {
  form.post('/dashboard/users')
}
</script>