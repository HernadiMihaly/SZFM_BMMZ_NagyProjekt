<template>
  <div id="nav">
    <router-link to="/">Home</router-link>
    <span v-if="$store.state.user == null"> | <router-link  to="/Login">Login</router-link></span>
    <span v-if="$store.state.user == null"> | <router-link to="/Register">Register</router-link></span>
    <span v-if="$store.state.is_admin"> | <router-link to="/ListAnswers">Listázás</router-link></span>
    <a v-if="$store.state.user != null" @click="$store.dispatch('logout')">
    | Logout
    </a>
  </div>
  <router-view/>
</template>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

#nav {
  padding: 30px;
}

#nav a {
  font-weight: bold;
  color: #2c3e50;
  cursor: pointer;
}

#nav a.router-link-exact-active {
  color: #42b983;
}
</style>
