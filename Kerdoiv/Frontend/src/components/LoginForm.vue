<template>
  <div class="hello">
    <InputText v-model="username" placeholder="E-mail"/>
    <Password v-model="password" placeholder="Jelszó"/>
    <Button label="Bejelentkezés" @click="handleClick($event)"/>
  </div>
  
</template>

<script>
import InputText from 'primevue/inputtext';
import Button from 'primevue/button';
import Password from 'primevue/password';

export default {
  name: 'LoginForm',
  
  components: {
    InputText,
    Password,
    Button
  },
  data () {
    return {
      info: null,
      username: "",
      password: ""
    }
  },
  methods: {
    handleClick() {
        this.axios
        .post('http://localhost:8000/api/login/', {'email':this.username, 'password':this.password})
        .then(response => {
        this.info = response.data;
        this.$store.commit('setUserData', response.data)
        this.$router.push('/');
      }).catch(error => {
            this.info = error.message;
            console.error("There was an error!", error);
          });
        
    }
  },
  
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  /*display: inline-block;*/
  margin: 0 10px;
  list-style-type: none;
}
a {
  color: #42b983;
}
</style>
