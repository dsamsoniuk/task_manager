<template>
      <AppLayout >

      <div class="m-4 overflow-x-auto">
        <h1 class="text-xl font-bold mb-4">Czaso-wstrzymywacz pracy</h1>

        <div class="m-4">
           <label for="">Podaj czas w minutach</label>
            <br>
            <br>
            <input type="number" id="timerInMinute" class="input" v-model=currentTimeInMinute >
            <br>
            <br>
            <button type="button" @click="Timer.startTimer()" id="startTimer" class="btn btn-primary">Start</button>
            <button type="button" @click="Timer.resetTimer()" id="stopTimer" class="btn btn-second">Reset</button>
            <br>
            <br>
            <div class="text-xl ">Aktualny czas: {{ Math.floor(clockTime / 60) }} : {{ clockTime % 60 }}</div>
        </div>

      </div>
  </AppLayout>
</template>

<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { onMounted } from 'vue';
import Timer from '@/utils/timer'

var clockTime = Timer.clockTime;
var currentTimeInMinute = Timer.currentTimeInMinute;

onMounted(() => {
  clockTime.value = Timer.clockTime.value
  currentTimeInMinute.value = Timer.currentTimeInMinute.value
})

</script>