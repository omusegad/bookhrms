@component('mail::message')
<img  src="{{ asset('storage/uploads/images/nandi-logo.jpg') }}"  width="600" height="160"/>
 <h3 style="background: red, color:white">
     Hi Gad Omuse, Thank you for your leave application, you will recieve our approval response soon!
 </h3>
<hr>

<div class="card">
    <h4>Leave Duration : 10 Working Days </h4>
    <hr>
    <h3>Satrt Date : 20-4-2054 </h3>
    <h3>End Date : 20-4-2054  </h3>
    <hr>
    <strong>Approval Status : Pending</strong>
</div>
<hr>
{{-- {{ $data }} --}}

@endcomponent
