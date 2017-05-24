<template>
    <div class="row">
        <div class="col-md-12">
            <table v-show="locations.length" class="table table-bordered">
                <thead>
                <tr>
                    <th class="col-md-6">Preferred Route</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(data, index) in locations">
                    <td>{{ data.formatted_address }}</td>
                </tr>
                </tbody>
            </table>
            <div id="addroute"  class="row">
               <div class="form-group col-md-6">
                   <input type="text" class="form-control" id="location" placeholder="Preferred Route" >
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
                        <option v-for="type in truck_type"  :value="type.id">
                              {{type.name}}
                        </option>
                      </select>
                  </div>

               <div class="form-group col-md-2">
                    <button class="btn btn-warning" v-on:click="add">Add</button>
               </div>
               <div class="form-group col-md-2">
                      <button class="btn btn-success" v-on:click="save" style="display: none" id="save">Save</button>
                </div>
             </div>
        </div>
    </div>
</template>

<script>
 export default {
     props : ['truck_type','id'],
    data(){
    return {
             locations: [],
              sourceid: 0
       }
    },
      mounted: function () {

               },
               methods: {
                   add: function () {
                       var add = $('#formatted_address').val();
                       var type = $('#truck_type').val();
                       if (( add != "") && ( type != "")) {
                           document.getElementById('save').style.display = "block";
                           this.addroute();
                           $('#location').val("");
                       } else {
                           alert("Select any one field");
                       }
                   },
                   addroute: function () {
                       this.locations.push({
                           'formatted_address': $('#formatted_address').val(),
                           'state': $('#administrative_area_level_1').val(),
                           'district': $('#administrative_area_level_2').val(),
                           'locality': $('#locality').val(),
                           'truck_type': $('#truck_type').val()
                       });
                   },
                   save: function () {
                       var self = this;
                       axios.post('/leads/route', {
                           'route': self.locations,
                           'source_id':self.id
                       }).then(function (response) {
                           window.location.href = "/leads"
                       })
                   },
               }
    }

</script>
