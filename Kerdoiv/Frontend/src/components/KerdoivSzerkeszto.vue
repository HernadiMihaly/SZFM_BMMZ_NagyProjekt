<template>
  <div class="hello">
  
    <h2>
          {{ kerdoiv.title }}
     </h2>
     <div>
       Kérdőív Cím: <InputText v-model="kerdoiv.title"/>
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
                            <Dropdown v-model="data[field]" autofocus :options="options2" optionLabel="label" 
                                optionValue="value" 
                                placeholder='Kérem válasszon!'/>
                        </template>
                         <template #body="{data, field}">
                            <Dropdown v-model="data[field]" autofocus :options="options2" optionLabel="label" 
                                optionValue="value" 
                                placeholder='Kérem válasszon!'/>
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
                </DataTable>
                
            </div>
            <Button label="Új Kérdés" @click="ujKerdes()"></Button>
            <Button>Mentés</Button>
  </div>
  
</template>

<script>
//import Checkbox from 'primevue/checkbox';
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
    //Checkbox,
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
            "type": "string", "is_predictive": 1,
            "correct_answer": "", 
            "answers": ""});
    }
  },
  mounted () {
    this.axios
      .get('http://localhost:8000/api/kerdoivek/' + this.$route.params.kerdoiv_id )
      .then(response => {
        this.info = response.data;
        
        this.kerdoiv = response.data.kerdoiv;
        this.title = this.kerdoiv.title;
        this.kerdesek = this.kerdoiv.kerdesek;
        this.kerdesek.forEach(function (kerdes) {
            switch (kerdes.type) {
                case "boolean":
                    kerdes.b = kerdes.is_predictive == 1;
                    break;
            }
        });
      })
  }
}
</script>


