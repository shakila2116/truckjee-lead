<template>
          <div class="row">
                    <div class="col-md-12">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="location" placeholder="Preferred Route" required >
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
                        <div class="form-group col-md-2">

                         <select class="form-control" required  id="truck_type">
                                <option value="" disabled selected>Truck Type</option>
                                     <option v-for="type in truck_type"  :value="type.id">
                                              {{type.name}}
                                </option>
                            </select>

                        </div>

                        <div class="col-md-4">
                            <button class="btn btn-primary" v-on:click="generate">Generate</button>
                            <button class="btn btn-primary" v-on:click="clear">Clear</button>
                        </div>
                    </div>
                    <div class="col-md-12" v-show = "route.length">
                        <table class="table table-bordered" id="table">
                            <thead class="table-header-primary">
                            <tr>
                                <th>Name</th>
                                <th>Company Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Source</th>
                                <th>Preferred Route</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr v-for="data in route[0]">
                                <td>{{ data.source.name }}</td>
                                <td>{{ data.source.company_name }}</td>
                                <td>{{ data.source.phone }}</td>
                                <td>{{ data.source.email }}</td>
                                <td>{{ data.source.lead_location.formatted_address}}</td>
                                <td>{{ data.location.formatted_address }} - <b> {{data.truck_type.name}} </b></td>
                            </tr>
                            </tbody>

                        </table>

                    </div>

                </div>

</template>

<script>

export default {
     props : ['truck_type'],

     data(){

      return {

       route:[],
       inc:1,
       table:""
      }

    },
     mounted: function () {
               },
     methods:{
            generate:function () {
            var table  = $('#table').DataTable();
                    table.destroy();

                        var self =this;
                        self.route = [];
                   axios.post('/reports/show',{
                            formatted_address: $('#formatted_address').val(),
                            state: $('#administrative_area_level_1').val(),
                            district: $('#administrative_area_level_2').val(),
                            locality: $('#locality').val(),
                            truck_type: $('#truck_type').val()
                    }).then(function (response) {
                           self.route.push(response.data);
                            $('#location').val("");
                            $('#formatted_address').val("")
                            $('#truck_type').val("");

                    });
                    setTimeout(function(){
                      $('#table').DataTable({
                                responsive: true
                            });
                    }, 1000);

             },

            clear:function(){
                        var self = this;
                        self.route = [];
                        $('#location').val("");
                        $('#truck_type').val("");

             }
                }

    }


</script>