<script setup>
import { usePage } from '@inertiajs/vue3'

const page = usePage()
const flash = page.props.flash
</script>

<template>
  <div class="m-4">
    <div v-if="flash.success" class="alert alert-success">
      {{ flash.success }}
    </div>
    <div v-if="flash.error" class="alert alert-danger">
      {{ flash.error }}
    </div>
  </div>

</template>