@extends('master_main')

@section('cont')
     <h2>Set new password</h2> 
        <div class="indent-lg">Please enter a new password for your account.</div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                    <br> <a href="/home">To Profile</a>
                </div>
            @else
            {{--
                @if (count($errors) > 0)
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                @endif
            --}}
            <form  action="{{ route('password.set') }}"  method="POST" id="setpass_form"  class="indent-lg">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}">
                <div class="row">
                   <div class="col-xs-4">
                     <div class="form-group">
                      <label class="sr-only" for="password">New password</label>
                      <input class="form-control"  type="password" id="password" placeholder="New password" name="password" value="" />
                      @if ($errors->first('password'))
                            <div class="alert alert-danger form_errors" style="display:block">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                     </div>
                     <div class="form-group">
                      <label class="sr-only" for="confirm_password">Re-enter password</label>
                      <input class="form-control" type="password" id="confirm_password" placeholder="Re-enter password" name="password_confirmation" value="" />
                      {{--@if (strlen($errors->first('password_confirmation')))
                            <div class="alert alert-danger form_errors" style="display:block">
                                {{ $errors->first('password_confirmation') }}
                            </div>
                        @endif
                      --}}
                     </div>
                     
                     <button type="submit" class="btn btn-singin btn-success outline"  id="sbtn">Send</button>
                   </div>
                </div>
             </form>
         @endif
@endsection 
