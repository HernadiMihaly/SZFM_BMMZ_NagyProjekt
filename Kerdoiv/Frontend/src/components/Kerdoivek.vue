<template>
  <div class="hello">
    <h1>Kitölthető kérdőívek</h1>
    <ul class="kerdoivek">
        <li class="kerdoiv" v-for="kerdoiv in kerdoivek" v-bind:key="kerdoiv.id">
          <router-link :to="{ name: 'kerdoiv', params: { kerdoiv_id: kerdoiv.id } }">{{ kerdoiv.title }}</router-link>
          <Button v-if="$store.state.is_admin" icon="pi pi-user-edit" class="p-button-rounded p-button-primary" @click="edit_kerdoiv(kerdoiv.id)"/>
          <Button v-if="$store.state.is_admin" icon="pi pi-trash" class="p-button-rounded p-button-danger" @click="delete_kerdoiv(kerdoiv.id)"/>
        </li>
    </ul>
    <Button v-if="$store.state.is_admin" icon="pi pi-plus" class="p-button-rounded p-button-primary" @click="add_kerdoiv()"/>
  </div>
</template>

<script>
import Button from 'primevue/button';
export default {
  name: 'Kerdoivek',
  props: {
    msg: String
  },
  components: {
    Button
  },
  data () {
    return {
      info: null,
      kerdoivek: []
    }
  },
  mounted () {
    this.axios
      .get('http://localhost:8000/api/kerdoivek')
      .then(response => {
        this.info = response.data;
        //var r = JSON.parse(response.data);
        this.kerdoivek = response.data;
        //this.info = JSON.stringify(this.kerdoivek);
      })
  },
  methods: {
    delete_kerdoiv(kerdoiv_id) {
      if(!confirm("Biztosan törölni akarja a kérdőívet?")){
        return;
      }
      this.axios
      .delete('http://localhost:8000/api/kerdoivek/' + kerdoiv_id.toString())
      .then(response => {
        this.info = response.data;
        for (var i = 0; i < this.kerdoivek.length; i++) {
          if(this.kerdoivek[i].id == kerdoiv_id){
            this.kerdoivek.splice(i, 1);
            break;
          }
        }
      })
      .catch(error => {
            this.info = error.message;
            console.error("There was an error!", error);
          });
    },
    edit_kerdoiv(id) {
       this.$router.push({ name: 'kerdoiv_szerkesztes', params: { kerdoiv_id: id } });
    },
    add_kerdoiv() {
       this.$router.push({ name: 'kerdoiv_szerkesztes', params: { kerdoiv_id: 0 } });
    }
  }
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
