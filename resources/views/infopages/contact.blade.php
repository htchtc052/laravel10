@extends('mastermain')

@section('cont')
<div class="breadcrumbs"><a href="/">Home</a></div>
<h1 class="indent-lg">Contact NoFiles</h1>

<form class="contact-form">
   <div class="row">
      <div class="col-xs-5">
         <div class="form-group">
            <label class="sr-only" for="">Name:</label>
            <input type="text" placeholder="Name" class="form-control" id="">
            <div class="alert alert-danger" style="display:none"></div>
         </div>
      </div>
      <div class="col-xs-7">
         <div class="form-group">
            <label class="sr-only" for="">Email:</label>
            <input type="email" placeholder="Email" class="form-control" id="">
            <div class="alert alert-danger" style="display:none"></div>
         </div>
      </div>
   </div>
   <div class="form-group">
      <label class="sr-only">Subject:</label>
      <select class="form-control">
         <option>Subject...</option>
         <option>Technical support</option>
         <option>Partnerships</option>
         <option>Developer support</option>
         <option>Resellers</option>
         <option>Press enquiries</option>
         <option>Legal enquiries</option>
         <option>Sales</option>
         <option>Other requests</option>
      </select>
      <div class="alert alert-danger" style="display:none"></div>
   </div>
   <div class="form-group indent-lg">
      <label class="sr-only">Message:</label>
         <textarea class="form-control" placeholder="Message" rows="5"></textarea>
         <div class="alert alert-danger" style="display:none"></div>
   </div>
   <button type="submit" class="btn btn-success outline">Submit</button>
</form>
   
 
   
		
   
@endsection