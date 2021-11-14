<template>
  <div class="hello">
  
    <h2>
          {{ title }}
     </h2>
  

    <ul>
        <li class="kerdes" v-for="(kerdes, index) in kerdesek" v-bind:key="kerdes.id">
            <div>
                <h3>{{ index + 1 }}. {{ kerdes.question }}</h3>
                <div v-if="kerdes.type == 'string'">
                    <InputText v-model="form.szovegek[index]" />
                </div>
                <div v-if="kerdes.type == 'boolean'">
                    <Checkbox style="booleaninput" v-model="form.check[index]"
                        trueValue="I" falseValue="N" :binary="true"
                    ></Checkbox>
                </div>
                <div v-if="kerdes.type == 'number'">
                    <InputNumber v-model="form.szamok[index]"/>
                </div>
                <div v-if="kerdes.type == 'list'">
                    <!-- Dropdown :options="options" optionLabel="label" 
                            optionValue="value" 
                            placeholder='Kérem válasszon!' v-model="form.valasztott_ertekek[index]" >
                        
                    </Dropdown -->
                    <MultiSelect :options="options[index]" optionLabel="label" 
                            optionValue="value" v-model="form.valasztott_ertekek[index]"
                            placeholder='Kérem válasszon!'>
                    </MultiSelect>
                    
                </div>
            </div>
        </li>
        <Button label="Válaszok beküldése" @click="handleClick($event)"></Button>

    </ul>
  </div>
  
</template>

<script>
import Checkbox from 'primevue/checkbox';
//import Dropdown from 'primevue/dropdown';
import MultiSelect from 'primevue/multiselect';
import InputNumber from 'primevue/inputnumber';
import InputText from 'primevue/inputtext';
import Button from 'primevue/button';

export default {
  name: 'Kerdoiv',
  props: {
     editable: Boolean
  },
  components: {
    Checkbox,
    //Dropdown,
    MultiSelect,
    InputNumber,
    InputText,
    Button
  },
  data () {
    return {
      info: null,
      title: "",
      kerdesek: [],
      szamvalasz: 0,
      kerdes_index: 0,
      selectedListaelemek: [],
      form: {
        szamok: [],
        szovegek: [],
        valasztott_ertekek: [],
        check: []
      },
      options: [
            /*{label: 'Berlin', value: 'Berlin'},
            {label: 'Frankfurt', value: 'Frankfurt'},
            {label: 'Hamburg', value: 'Hamburg'},
            {label: 'Munich', value: 'Munich'}*/
      ]
    }
  },
  methods: {
    handleClick() {
        this.info = "";
        alert(1);
        var valaszok = [];
        var form = this.form;
        this.kerdesek.forEach(function (kerdes, i) {
            var value;
            switch (kerdes.type) {
                case 'number':
                    value = form.szamok[i];
                    break;
                case 'string':
                    value = form.szovegek[i];
                    break;  
                case 'boolean':
                    value = form.check[i] != null? form.check[i] : 'N';
                    break;
                case 'list':
                    value = form.valasztott_ertekek[i];
                    break;
            }
            
            var valasz = {'kerdes_id': kerdes.id,
                           'question_filler': 'Guest',
                           'value': value};
            valaszok.push(valasz);
        })
        alert(JSON.stringify({'valaszok':valaszok}));
        this.axios.post('http://localhost:8000/api/valaszokmentese/', {'valaszok':valaszok})
          .then(response => {
            this.info = response.data;

            this.$router.push('/thankyou');
          })
          .catch(error => {
            this.info = error.message;
            console.error("There was an error!", error);
          });
    }
  },
  mounted () {
    this.axios
      .get('http://localhost:8000/api/kerdoivek/' + this.$route.params.kerdoiv_id )
      .then(response => {
        this.info = response.data;
        this.title = response.data.kerdoiv.title;
        this.kerdesek = response.data.kerdoiv.kerdesek;
        var opt = this.options;
        this.kerdesek.forEach(function (kerdes, i) {
          switch (kerdes.type) {
            case 'list':

              opt[i] = [];
              kerdes.answers.split('|').forEach(function (opcio, j) {
                opt[i][j] = {'label': opcio, 'value': opcio};
              });
              break;
          }
        });
      })
  }
}
</script>


<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
  width: 60%;
  margin: 0 auto;
  text-align: left;
}
li {
  margin: 0 10px;
  list-style-type: none;
}
a {
  color: #42b983;
}
.numberinput {
  border: 1px solid lightgray;
}
.stringinput {
  border: 1px solid indianred;
}
</style>

