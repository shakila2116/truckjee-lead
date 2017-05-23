
<template>
<div class="col-md-12">
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
                    <input type="text" class="form-control" required placeholder="Email" v-model="form.email" >
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
                sourceid:0
                }
            },
            mounted: function () {
                var self = this;

            },
            methods:{
                create:function(){
                    var self = this;
                    axios.post("/leads",{
                        name : self.form.name,
                        cmpny_name:self.form.cmpny_name,
                        phone     :self.form.phone,
                        email     :self.form.email,
                        type      :self.form.type,
                    }).then(function(response){
                        self.sources.push(response.data);
                       self.sourceid = self.sources[0].id;
                       window.location.href ="/leads/"+self.sourceid
                    }).catch(function (error) {
                        alert("Email or Phone no is invalid");
                    });
                },
                show:function () {
                    var self = this;
                    document.getElementById('addroute').style.display = "block";
                },
            }
        }
</script>