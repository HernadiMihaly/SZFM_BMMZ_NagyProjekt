<template>
  <div class="about">
    <h1>This is a login page</h1>
  </div>
  <div>
    <LoginForm/>
  </div>
</template>

<script>
// @ is an alias to /src
import LoginForm from '@/components/LoginForm.vue'

export default {
  name: 'Login',
  components: {
     LoginForm
  }
}
</script>