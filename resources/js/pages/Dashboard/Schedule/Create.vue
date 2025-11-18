<template>
  <AppLayout>
  <div class="m-4">
        <Link :href="`/dashboard/schedule`" class="text-blue-500">powrót</Link>

    <h1 class="text-xl font-bold mb-4">Nowy wpis do harmonogramu</h1>

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
              <legend class="fieldset-legend">Desc</legend>
              <textarea v-model="form.description" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 " placeholder="description" rows="5" cols="1"></textarea>
              <span class="text-red-500">{{ form.errors.description }}</span>
            </fieldset>
          </div>

          <div>
            <fieldset class="fieldset">
              <legend class="fieldset-legend">date</legend>
              <input v-model="form.date" type="date" class=" input" placeholder="date"/>
              <span class="text-red-500">{{ form.errors.date }}</span>
            </fieldset>
          </div>

          <div>
            <fieldset class="fieldset">
              <legend class="fieldset-legend">work_hours</legend>
              <input v-model="form.work_hours" type="number" class=" input" placeholder="work_hours"/>
              <span class="text-red-500">{{ form.errors.work_hours }}</span>
            </fieldset>
          </div>

          <div>
            <fieldset class="fieldset">
              <legend class="fieldset-legend">status</legend>
               <select  v-model="form.status" class="input">
                <option :value="status" v-for="status, key in props.statusList" >{{ key }}</option>
              </select>
              <span class="text-red-500">{{ form.errors.status }}</span>
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
const props = defineProps({ statusList: Object})

const form = useForm({
    id: '',
    title: '',
    description: '',
    status: '',
    date: '',
    work_hours: '',
})

function submit() {
  form.post('/dashboard/schedule')
}
</script>