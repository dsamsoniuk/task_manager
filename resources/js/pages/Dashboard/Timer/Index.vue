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
            <button type="button" @click="timerManager.startTimer()" id="startTimer" class="btn btn-primary">Start</button>
            <button type="button" @click="timerManager.resetTimer()" id="stopTimer" class="btn btn-second">Reset</button>
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
import Cookies from '@/utils/cookies'
import Timer from '@/utils/timer'

var timerManager = new Timer()
var clockTime = timerManager.clockTime;
var currentTimeInMinute = timerManager.currentTimeInMinute;
var timerTmp = NaN

onMounted(() => {
  var cookies = new Cookies()

  let clockTimeCounter = parseInt( cookies.getCookie(timerManager.clockTimeCounterCookie) )
  let timeInMinute = parseInt( cookies.getCookie(timerManager.currentTimeInMinuteCookie) )

  clockTime.value = clockTimeCounter
  currentTimeInMinute.value = timeInMinute

  timerManager.clockChecker()

  timerTmp = setInterval(function(){
      clearInterval(timerTmp)

      timerManager.sendSystemNotification("PRZERWA !!", "Odpocznij chwilę");
      timerManager.startTimer()
  }, (timeInMinute * 60 * 1000) - (clockTimeCounter * 1000) )
})

</script>