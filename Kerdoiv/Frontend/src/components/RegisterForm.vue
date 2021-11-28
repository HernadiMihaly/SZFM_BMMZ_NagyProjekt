<template>
  <div class="hello">
    <InputText v-model="name" placeholder="Név"/>
    <InputText v-model="username" placeholder="E-mail"/>
    <Password v-model="password1" placeholder="Jelszó"/>
    <Password v-model="password2" placeholder="Jelszó ellenőrzés"/>
    <Button label="Regisztáció" @click="handleClick($event)"/>
    {{ info }}
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
      name: "",
      username: "",
      password1: "",
      password2: ""
    }
  },
  methods: {
    handleClick() {
        if(this.password1 != this.password2){
            this.info = "Hibás jelszómegadás!";
            return;
        }
    
        this.axios
        .post('http://localhost:8000/api/register/', {'name':this.name, 'email':this.username, 'password':this.password1})
        .then(response => {
        this.info = response.data;
        this.$router.push('/login');
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
