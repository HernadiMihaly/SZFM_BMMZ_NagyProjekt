<template>
  <div class="about">
    <h1>Kérdőív szerkesztés</h1>
    <KerdoivSzerkeszto />

  </div>
</template>

<script>
// @ is an alias to /src
import KerdoivSzerkeszto from '@/components/KerdoivSzerkeszto.vue'

export default {
  name: 'KerdoivSzerkesztes',
  components: {
     KerdoivSzerkeszto
  }
}
</script>
