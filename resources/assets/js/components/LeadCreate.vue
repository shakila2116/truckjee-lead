
<template>
  <div class="col-md-6">
     <form v-on:submit.prevent="create()">
            <div class="form-group">
                    <input type="text" class="form-control" required placeholder="Name" v-model="form.name">
            </div>
            <div class="form-group">
                    <input type="text" class="form-control" required placeholder="Company Name" v-model="form.cmpny_name" >
            </div>
            <div class="form-group">
                    <input type="number" class="form-control" required placeholder="Mobile No" v-model="form.phone" >
            </div>
            <div class="form-group">
                    <input type="email" class="form-control" required placeholder="Email" v-model="form.email" >
            </div>
            <div class="form-group">
                   <input type="text" class="form-control" id="location" placeholder="Source Address" required>
                    <div id="locality_details">
                <input id="administrative_area_level_1" type="text"
                       hidden>
                <input id="administrative_area_level_2"
                       type="text"
                       hidden>
                <input id="locality" type="text" hidden>
                <input id="formatted_address" type="text" hidden>
                    </div>
            </div>
            <div class="form-group">
                    <select type="text" class="form-control" required v-model="form.type">
                        <option value="" disabled selected>Select Role</option>
                        <option value="1"> Broker</option>
                        <option value="2"> Owner</option>
                    </select>
            </div>
            <button class="btn btn-primary" id="create">Create</button>
     </form>
     <div v-show="errors.length" class="panel-danger">
             <ul class="list-group">
               <li class="list-group-item" v-for="error in errors">
                <div v-if="error.phone">
                    {{error.phone}}
                </div>
                <div v-if="error.email">
                    {{error.email}}
                 </div>
                </li>
             </ul>
     </div>
  </div>
</template>
<script>
    export default {
              data() {
              return {
                form:{
                    name      : '',
                    cmpny_name: '',
                    phone: '',
                    email: '',
                    truck_type: '',
                    type:''
                },
                sources: [],
                errors:[],
                sourceid:0
                }
            },
            mounted: function () {
                var self = this;

            },
            methods:{
                create:function(){
                    var self = this;
                    self.errors = [];
                    self.sources = [];
                    axios.post("/leads",{
                        name : self.form.name,
                        cmpny_name:self.form.cmpny_name,
                        phone     :self.form.phone,
                        email     :self.form.email,
                        type      :self.form.type,
                        formatted_address: $('#formatted_address').val(),
                        state: $('#administrative_area_level_1').val(),
                        district: $('#administrative_area_level_2').val(),
                        locality: $('#locality').val(),
                    }).then(function(response){
                        self.sources.push(response.data);
                       self.sourceid = self.sources[0].id;
                       console.log(self.sources);
                      window.location.href ="/leads/"+self.sourceid
                     }).catch(function (error) {
                        self.errors.push(error.response.data);
                    });
                },
                show:function () {
                    var self = this;
                    document.getElementById('addroute').style.display = "block";
                },
            }
        }
</script>