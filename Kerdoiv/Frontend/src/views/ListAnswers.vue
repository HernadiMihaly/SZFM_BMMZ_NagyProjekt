<template>
  <div class="list">
    <ValaszLista/>
  </div>
</template>

<script>
// @ is an alias to /src
import ValaszLista from '@/components/ValaszLista.vue'

export default {
  name: 'ListAnswers',
  components: {
    ValaszLista
  }
}
</script>
