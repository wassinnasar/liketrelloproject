<template>
  <div class="container">
       <div class="form-group">
           <input type="text" @blur="saveName" v-model = " name " class="form-control">
       </div>

<form @submit.prevent="addNewDeskList">
  <div class="form-group">
    <input type="text" v-model="desk_list_name" :class="{ 'is-invalid': $v.desk_list_name.$error }" class="form-control" placeholder="Энтер доски названия списка">
      <div class="invalid-feedback" v-if="!$v.desk_list_name.required">
          Поле обязательно.
        </div>
        <div class="invalid-feedback" v-if="!$v.desk_list_name.maxLength">
          Больше символов не обязательно: {{$v.desk_list_name.$params.maxLength.max}}.
        </div>
  </div>

  <button type ="submit" class="btn btn-primary">Добавить список</button>
  </form>

      <div class ="row">
          <div class="col-lg-4" v-for ="desk_list in desk_lists">
             <div class="card mt-3" >
              <a href = "#" class = "card-body" >
              <h5 class="card-title">{{ desk_list.name }}</h5>
              </a>

             </div>
          </div>
        </div>
        {{ nam }}
   </div>
</template>

<script>

import { required, maxLength } from 'vuelidate/lib/validators'
export default {
props: [
'deskId'
],
data(){
  return{
    name: null,
   // nam: null,
    desk_list_name: null,
    desk_lists: [],
  }
},
methods:{
  getAllLists(){

 axios.get('/api/desks-lists' ,{
     params: {
        desk_id: this.deskId
     }
 })
     .then(response => {
     this.desk_lists = response.data
     })

  },
  saveName(){
        this.$v.$touch()
        if(this.$v.$anyError){
        return;
        }
        axios.post('/api/desks/'+this.deskId, {
          _method: 'PUT',
          name: this.name.name,
        })
          .then(response => {

        })
  },
  addNewDeskList(){
             this.$v.$touch()
                if(this.$v.$anyError){
                return;
                 }
                 axios.post('/api/desks-lists', {
                     name: this.desk_list_name,
                  desk_id: this.deskId,
                 })
                     .then(response => {
                     this.desk_list_name = ''
                    this.desk_lists = []
                       this.getAllLists();
                 })
                 //  axios.get('/api/desks-lists')
                 // .then(response => {
                 //     // document.write("dfsddfsd");
                 // this.desk_lists = response.data
                 //     document.write(this.desk_lists[0]);
                 // })
          }
},
mounted(){

     axios.get('/api/desks/'+this.deskId)
     .then(response => {
     this.name = response.data
     })
     this.getAllLists()

    },
validations: {
    name: {
      required,
      maxLength: maxLength(7),
    },

    desk_list_name:{
      required,
      maxLength: maxLength(7),
    }
}

}
</script>
