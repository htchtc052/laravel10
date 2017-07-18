@extends('master_main')
   
@section('cont')
   <h2>Activation</h2>
   @if(Session::has('status'))
    {{Session::get('status')}}
   @else
       <p class="indent-lg">Activation code send to your email {{ Auth::user()->email }}.</p>
       <a class="btn btn-success outline" href="{{ route('activate_send') }}">Resend this code</a> 
       @if (Session::has('message'))
           <script> 
            setTimeout(function() { $(".js_alert").hide(); }, 700);
           </script>
           <div class="alert js_alert">{{ Session::get('message') }}</div>
       @endif
   @endif
@endsection 