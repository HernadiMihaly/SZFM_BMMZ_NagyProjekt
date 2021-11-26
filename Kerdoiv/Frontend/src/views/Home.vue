<template>
  <div class="home">
    <img alt="Vue logo" src="../assets/logo.png">
    <Kerdoivek msg="Kitölthető kérdőívek"/>
  </div>
</template>

<script>
// @ is an alias to /src
import Kerdoivek from '@/components/Kerdoivek.vue'

export default {
  name: 'Home',
  components: {
    Kerdoivek
  }
}
</script>
