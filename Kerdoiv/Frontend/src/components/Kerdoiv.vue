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

