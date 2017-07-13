@extends('master_main')

@section('cont')
     <h2>Profile</h2> 
        <div class="indent-lg">Change password for your account.</div>
            <form  action="{{ route('home.account.email_save') }}"  method="POST" id="setpass_form"  class="indent-lg">
                {{ csrf_field() }}
                <div class="row">
                   <div class="col-xs-4">
                     <div class="form-group">
                      <label class="sr-only" for="password">Your password</label>
                      <input class="form-control"  type="password" id="password" placeholder="Your password" name="password" value="{{ old('password') }}" />
                        @if ($errors->first('password'))
                            <div class="alert alert-danger form_errors" style="display:block">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                     </div>
                    <div class="form-group">
                        <label for="email" class="sr-only">New E-Mail Address</label>

                            <input id="email"  class="form-control" name="email" placeholder="New E-Mail Address" value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <div class="alert alert-danger form_errors">{{ $errors->first('email') }}</div>
                            @endif
                    </div>
                 
                     
                     <button type="submit" class="btn btn-singin btn-success outline"  id="sbtn">Send</button>
                   </div>
                </div>
             </form>
@endsection 
