<template>
  <div class="about">
    <h1>Kérdőív kitöltés</h1>
    <Kerdoiv />

  </div>
</template>

<script>
// @ is an alias to /src
import Kerdoiv from '@/components/Kerdoiv.vue'

export default {
  name: 'KerdoivKitoltes',
  components: {
     Kerdoiv
  }
}
</script>
