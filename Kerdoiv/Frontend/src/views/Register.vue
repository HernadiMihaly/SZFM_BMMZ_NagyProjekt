<template>
  <div class="about">
    <h1>Új Felhasználó regisztrálása</h1>
  </div>
  <div>
    <RegisterForm/>
  </div>
</template>

<script>
// @ is an alias to /src
import RegisterForm from '@/components/RegisterForm.vue'

export default {
  name: 'Register',
  components: {
     RegisterForm
  }
}
</script>