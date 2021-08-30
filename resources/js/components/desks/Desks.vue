<template>
  <div class="container">
   <h1>Доски</h1>
   <form @submit.prevent="addNewDesk">
  <div class="form-group">
    <input type="text" v-model=" name" :class="{ 'is-invalid': $v.name.$error }" class="form-control" placeholder="Энтер доски название">
      <div class="invalid-feedback" v-if="!$v.name.required">
          Поле обязательно.
        </div>
        <div class="invalid-feedback" v-if="!$v.name.maxLength">
          Больше символов не обязательно: {{$v.name.$params.maxLength.max}}.
        </div>
  </div>

  <button type ="submit" class="btn btn-primary">Добавить</button>
  </form>
        <div class ="row">
          <div class="col-lg-4" v-for ="re in results">
             <div class="card mt-3" >
              <router-link class = "card-body" :to="{name:'showDesk', params: {deskId: re.id}}">
              <h5 class="card-title">{{ re.name }}</h5>
              </router-link>
               <button type="button" class="btn btn-outline-danger mt-3" @click="deleteDesk(re.id)">Удалити</button>
             </div>
          </div>
        </div>
      {{ name }}
   </div>
</template>

<script>
import { required, maxLength } from 'vuelidate/lib/validators'
export default {
	data(){
	return  {
	   results: [],
	   name: null
	  }
	},
	mounted(){
	   axios.get('/api/desks')
	   .then(response => {
	   this.results = response.data
	   })
    },
	methods: {
          deleteDesk(id){
               if(confirm('Что, правда?')){
               axios.post('/api/desks/'+id,{
                  _method: 'DELETE'
               })
	             .then(response => {
	             this.results = []
	               })
	                axios.get('/api/desks')
	               .then(response => {
	               this.results = response.data
	               })
               }
          },

          addNewDesk(){
             this.$v.$touch()
                if(this.$v.$anyError){
                return;
                 }
                 axios.post('/api/desks', {
                  name: this.name,
                 })
                     .then(response => {
                     this.name = ''
	             this.results = []
	               });
	                axios.get('/api/desks')
	               .then(response => {
	               this.results = response.data
	               })
          }
	},

    validations: {
          name: {
             required,
             maxLength: maxLength(7),
              }
            }
}
</script>
