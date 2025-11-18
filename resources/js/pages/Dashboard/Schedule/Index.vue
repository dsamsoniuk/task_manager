<template>
      <AppLayout >

      <div class="m-4 overflow-x-auto">
        <h1 class="text-2xl font-bold mb-4">Harmonogram zadań</h1>

        <Link href="/dashboard/schedule/create" class="btn btn-primary">Dodaj</Link>
        <FlashMessage />

        <div>

          <div v-for="year in sortedDescSchedules" class="mb-4">
            <p class="text-3xl font-bold text-center">{{ year.name }}</p>

            <div v-for="month in year.list" class=" mb-4">
              <p class="text-xl font-bold m-4">{{ monthNames[month.name] }}</p>
               <hr>
               <br>
              <div  class="flex flex-wrap gap-4">

                <div v-for="schedule in month.list.elements" :key="schedule.id" 
                   class="card card-md w-50 shadow-sm" 
                  :class="'bg-' + schedule.status + '', 'text-'+ schedule.status+'-content' "
                >
                  <div class="card-body">
                    
                    <div class="text-center  text-xl">{{ schedule.date }}</div>

                    <div class="flex">
                        <div class="m-2">{{ schedule.work_hours }}h</div>
                        <Link :href="`/dashboard/schedule/${schedule.id}/edit`" class="text-blue-500 m-2">Edytuj</Link>
                        <button type="button" @click="destroy(schedule.id)" class="text-red-500 m-2 cursor-pointer">Usuń</button>
                    </div>
                 
                      <div class="collapse ">
                        <input type="checkbox" />
                        <div class="collapse-title text-md font-semibold p-0">{{ schedule.title }}</div>
                        <div class="collapse-content text-sm p-0 whitespace-pre-line">
                          {{ schedule.description }}
                        </div>
                      </div>
                  </div>
                </div>
              </div>
                <div class="text-l font-bold mt-6 m-4 text-end">Suma godzin: {{ month.list.sum_hours }}</div>
                <hr>
            </div>
          </div>
  
        </div>

      </div>
  </AppLayout>
</template>

<script setup>
import { Link, router} from '@inertiajs/vue3'
import AppLayout from '@/layouts/AppLayout.vue';
import  FlashMessage  from '@/components/FlashMessage.vue'

const props = defineProps({ schedules: Object})

function sortingDesc(obj){
  return Object.keys(obj)
    .sort((a,b) => b.localeCompare(a))
    .map(key => ({ name: key, list: obj[key] }));
}

const sortedYears = sortingDesc(props.schedules)
const sortedDescSchedules = []
sortedYears.forEach(function(v){
  v.list = sortingDesc(v.list)
  sortedDescSchedules.push(v)
})

const monthNames = {
  '1' : 'styczen',
  '2' : 'luty',
  '3' : 'marzec',
  '4' : 'kwiecien',
  '5' : 'maj',
  '6' : 'czerwiec',
  '7' : 'lipiec',
  '8' : 'sierpien',
  '9' : 'wrzesien',
  '10' : 'pazdziernik',
  '11' : 'listopad',
  '12' : 'grudzien',
}

function destroy(id) {
  if (confirm('Na pewno chcesz usunąć?')) {
    router.delete(`/dashboard/schedule/${id}`)
  }
}
</script>