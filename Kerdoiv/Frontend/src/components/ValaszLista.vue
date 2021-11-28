<template>
  <div class="hello">
    <Panel header="Választható kérdőívek">
        <div class="card">
            <DataTable :value="kerdoivek" v-model:selection="kivalasztottKerdoiv" 
                selectionMode="single" dataKey="id" responsiveLayout="scroll" 
                @rowSelect="onRowSelect" >
                
                <Column field="title" header="Cím"></Column>
            </DataTable>
        </div>
    </Panel>
    <Divider />

    <Panel header="Válaszok">
        <div class="card" >
            <DataTable :value="valaszok" showGridlines dataKey="id"  sortMode="multiple"
                 :rowClass="rowClass"
                 responsiveLayout="scroll" v-model:filters="filters1" filterDisplay="menu">
                <Column field="question_filler" header="Kitöltő" :sortable="true"></Column>
                <Column field="question" header="Kérdés" :showFilterMatchModes="false" :sortable="true">
                    <template #body="{data}">
                        <span>{{data.question}}</span>
                    </template>
                    <template #filter="{filterModel}">
                        <div>Kérdés választás</div>
                        <MultiSelect v-model="filterModel.value" :options="kerdesek" optionLabel="question" optionValue="question" placeholder="Összes" class="p-column-filter">
                            <template #option="slotProps">
                                <div>
                                    <span>{{slotProps.option.question}}</span>
                                </div>
                            </template>
                        </MultiSelect>
                    </template>
                </Column>
                <Column field="value" header="Válasz" :sortable="true"></Column>
                <Column field="correct_answer" header="Helyes Válasz" :sortable="true"></Column>
                <Column field="created_at" header="Kitöltés Dátuma" :sortable="true"></Column>
            </DataTable>
        </div>
    </Panel>
  </div>
</template>

<script>
//import Button from 'primevue/button';
import DataTable from 'primevue/datatable';
import Column from "primevue/column";
import Divider from "primevue/divider";
import Panel from "primevue/panel";
import MultiSelect from "primevue/multiselect";
import {FilterMatchMode} from 'primevue/api';
export default {
  name: 'ValaszLista',
  props: {

  },
  components: {
    DataTable,
    Column,
    Panel,
    Divider,
    MultiSelect,
  },
  data () {
    return {
      info: null,
      kerdoivek: [],
      kivalasztottKerdoiv: {kerdesek: []},
      valaszok: [],
      kerdesek: [],
      filters1: {
        'question': {value: null, matchMode: FilterMatchMode.IN},
      }
    }
  },
  created() {
    this.initFilters1();
  },
  mounted () {
    this.axios
      .get('http://localhost:8000/api/kerdoivek')
      .then(response => {
        this.info = response.data;
        this.kerdoivek = response.data;
      })
  },
  methods: {
    onRowSelect() {
        this.axios
          .get('http://localhost:8000/api/valaszok/' + this.kivalasztottKerdoiv.id.toString())
          .then(response => {
            this.info = response.data;
            this.valaszok = response.data.valaszok;
            this.kerdesek = response.data.kerdesek;
            this.initFilters1();
          })
          .catch(error => {
            this.info = error.message;
            console.error("There was an error!", error);
          });
    },
    clearFilter1() {
        this.initFilters1();
    },
    initFilters1() {
        this.filters1 = {
            'question': {value: null, matchMode: FilterMatchMode.IN},
        }
    },
    rowClass(data) {
        //alert(data.correct_answer);
        return data.correct_answer == '' ? 'nincs-correct-answer': 'van-correct-answer';
        //data;
        //return "van-correct-answer";
    },
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
::v-deep(.nincs-correct-answer) {
    background-color: white !important;
}
::v-deep(.van-correct-answer) {
    background-color: whitesmoke !important;
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
