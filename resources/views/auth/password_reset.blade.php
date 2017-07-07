@extends('master_main')
@section('cont')
   <div class="row">
      <div class="col-xs-6">
         <h2>Forgot your password?</h2>
         <p class="indent-lg">Enter your email address to reset your password.<br>You may need to check your spam folder.</p> 
         <form  method="POST" class="indent-lg" id="recall_form" action="{{ route('password.email') }}">
            {{ csrf_field() }}
            <div class="indent-lg">
                 <label class="sr-only" for="email">Email</label>
                    <input class="form-control" type="text" id="email" placeholder="Email" name='email' value="" placeholder="Email" />
                      @if ($errors->has('email'))
                        <div class="alert alert-danger form_errors" style="display:block" id="email_error">{{ $errors->first('email') }}</div>
                    @endif
            </div>
            <button type="submit" class="btn btn-singin btn-success outline" id="sbtn">Send</button>
         </form> 
            @if (session('status'))
                <div id="msg" class="form_msg alert alert-success">{{ session('status') }}</div>
            @endif
      </div>
   </div>
@endsection 