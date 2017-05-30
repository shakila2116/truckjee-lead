
<?php $i=0; ?>
@component('mail::message')
# TruckJee Lead

### Mr/Mrs. <b>{{ $lead->name }} </b>

 Welcome to Truckjee India's premier online truck discovery,aggregation and hiring portal.
 Your preferred route list  has been registered successfully.

<table class="table table-bordered">
  <thead>
   <tr>
     <th class="col-md-3">No</th>
     <th class="col-md-8">Route</th>
   </tr>
  </thead>
  <tbody>
  @foreach($lead->route as $loc)
   <tr>
    <td> {{++$i}}</td>
    <td>  {{$loc->location->formatted_address}} </td>
  </tr>
   @endforeach
  </tbody>
 </table>

 Our Team members will contact you shortly.


Thanks,<br>
<b>TruckJee Team</b>
@endcomponent


