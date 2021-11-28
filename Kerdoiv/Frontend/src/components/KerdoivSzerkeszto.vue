<template>
  <div class="hello">
  
    <h2>
          {{ kerdoiv.title }}
     </h2>
     <div>
       Kérdőív Cím: <InputText v-model="kerdoiv.title"/>
       Szétválasztott: <Checkbox v-model="kerdoiv.is_separated"
                        :binary="true"></Checkbox>
       Randomizált sorrend: <Checkbox v-model="kerdoiv.is_randomised"
                        :binary="true"></Checkbox>
     </div>
    
            <div>
                <DataTable :value="kerdesek" showGridlines editMode="cell" @cell-edit-complete="onCellEditComplete" class="editable-cells-table" responsiveLayout="scroll"
                        :paginator="true" :rows="10"
                        paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
                        :rowsPerPageOptions="[10,20,50]"
                        currentPageReportTemplate="Showing {first} to {last} of {totalRecords}">
                    <Column field="question" header="Kérdés">
                        <template #editor="{ data, field }">
                            <InputText v-model="data[field]" autofocus />
                        </template>
                    </Column>
                    <Column field="order_number" header="Sorszám">
                        <template #editor="{ data, field }">
                            <InputText v-model="data[field]" autofocus />
                        </template>
                    </Column>
                    <Column field="correct_answer" header="Helyes válasz">
                        <template #editor="{ data, field }">
                            <InputText v-model="data[field]" autofocus />
                        </template>
                    </Column>
                    <Column field="is_predictive" header="Prediktív?">
                        <template #editor="{ data, field }">
                            <Checkbox v-model="data[field]"
                                :binary="true" autofocus/>
                        </template>
                         <template #body="{data, field}">
                            <Checkbox v-model="data[field]"
                                :binary="true" autofocus/>
                        </template>
                    </Column>
                    <Column field="type" header="Típus">
                        <template #editor="{ data, field }">
                            <Dropdown v-model="data[field]" autofocus :options="options" optionLabel="label" 
                                optionValue="value" 
                                placeholder='Kérem válasszon!'/>
                        </template>
                         <template #body="{data, field}">
                            <Dropdown v-model="data[field]" autofocus :options="options" optionLabel="label" 
                                optionValue="value" 
                                placeholder='Kérem válasszon!'/>
                        </template>
                    </Column>
                    <Column field="answers" header="Válaszok">
                        <template #editor="{ data, field }">
                            <InputText v-model="data[field]" autofocus />
                        </template>
                    </Column>
                    <Column header="Törlés">
                        <template #body="slotProps">
                            <Button icon="pi pi-trash" class="p-button-rounded p-button-danger" @click="deleteKerdes(slotProps)"/>
                        </template>
                    </Column>
                </DataTable>
                
            </div>
            <Button label="Új Kérdés" @click="ujKerdes()"></Button>
            <Button label="Mentés" @click="kerdoivMentes()"></Button>
  </div>
  
</template>

<script>
import Checkbox from 'primevue/checkbox';
import Dropdown from 'primevue/dropdown';
//import MultiSelect from 'primevue/multiselect';
//import InputNumber from 'primevue/inputnumber';
import DataTable from 'primevue/datatable';
import Column from "primevue/column";
import InputText from 'primevue/inputtext';
import Button from 'primevue/button';

export default {
  name: 'Kerdoiv',
  props: {
     editable: Boolean
  },
  components: {
    DataTable,
    Column,
    InputText,
    //InputNumber,
    Checkbox,
    Button,
    Dropdown
  },
  data () {
    return {
      info: null,
      title: "",
      kerdoiv: {title: ""},
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
            {label: 'Szöveg', value: 'string'},
            {label: 'Lista', value: 'list'},
            {label: 'Szám', value: 'number'},
            {label: 'Igaz/Hamis', value: 'boolean'}
      ],
       options2: [
            {label: 'Igen', value: 1},
            {label: 'Nem', value: 0},
      ],
      columns: [
            {field: 'question', header: 'Kérdés'},
            {field: 'order_number', header: 'Sorszám'},
            {field: 'type', header: 'Típus'},
            {field: 'is_predictive', header: 'Prediktív?'},
            {field: 'correct_answer', header: 'Helyes Válasz'},
            {field: 'answers', header: 'Válaszlehetőségek'}
      ]
    }
  },
  methods: {
    onCellEditComplete(event) {
        let { data, newValue, field } = event;

        data[field] = newValue;

    },
    ujKerdes(){
        this.kerdesek.push({"order_number": this.kerdesek.length + 1,
            "question": "",
            "type": "string", "is_predictive": 0,
            "correct_answer": "", 
            "answers": ""});
    },
    kerdoivMentes() {
      this.kerdoiv.is_separated = this.kerdoiv.is_separated? 1 : 0;
      this.kerdoiv.is_randomised = this.kerdoiv.is_randomised? 1 : 0;
      this.kerdoiv.kerdesek.forEach(function (kerdes) {
        kerdes.is_predictive = kerdes.is_predictive? 1 : 0;
      });
      if ("id" in this.kerdoiv) {
        //alert("módosítás");
        this.axios.put('http://localhost:8000/api/kerdoivek/' + this.kerdoiv.id.toString(), {'kerdoiv':this.kerdoiv})
          .then(response => {
            this.info = response.data;

            this.$router.push('/');
          })
          .catch(error => {
            this.info = error.message;
            console.error("There was an error!", error);
          });
      } else {
        this.axios.post('http://localhost:8000/api/kerdoivek/', {'kerdoiv':this.kerdoiv})
          .then(response => {
            this.info = response.data;

            this.$router.push('/');
          })
          .catch(error => {
            this.info = error.message;
            console.error("There was an error!", error);
          });
      }

    },
    deleteKerdes(row){
        var torlendo_kerdes = row.data;
        var has_id = "id" in torlendo_kerdes;
        //alert(JSON.stringify(torlendo_kerdes));
        var torlendo_index = -1;
        this.kerdesek.forEach(function (kerdes, i) {    
            if(has_id){
              if(torlendo_kerdes.id == kerdes.id){
                torlendo_index = i;
              } 
            } else {
              if(torlendo_kerdes.order_number == kerdes.order_number){
                torlendo_index = i;
              }
            }

        });
        if(torlendo_index >=0){
          this.kerdoiv.kerdesek.splice(torlendo_index,1);
        }
    }
  },
  mounted () {
    if(this.$route.params.kerdoiv_id == 0){
        this.kerdoiv.title = "Kérdőív cím";
        this.title = this.kerdoiv.title;
        this.kerdoiv.is_randomised = false;
        this.kerdoiv.is_separated = false;
        this.kerdoiv.kerdesek = [];
        this.kerdesek = this.kerdoiv.kerdesek;
    } else {
        this.axios
          .get('http://localhost:8000/api/kerdoivek/' + this.$route.params.kerdoiv_id )
          .then(response => {
            this.info = response.data;
            
            this.kerdoiv = response.data.kerdoiv;
            this.title = this.kerdoiv.title;
            this.kerdoiv.is_randomised = this.kerdoiv.is_randomised == 1;
            this.kerdoiv.is_separated = this.kerdoiv.is_separated == 1;
            this.kerdesek = this.kerdoiv.kerdesek;
            this.kerdesek.forEach(function (kerdes) {    
              kerdes.is_predictive = kerdes.is_predictive == 1;
            });
          })
    }

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

