@extends('master_main')

@section('cont')
     <h2>Profile</h2> 
        <div class="indent-lg">Change password for your account.</div>
        {{--
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                        <br> <a href="/home">To Profile</a>
                    </div>
                @endif
                @if (count($errors) > 0)
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                @endif
            
                 --}}
                 
                 
            <form  action="{{ route('home.password.change_save') }}"  method="POST" id="setpass_form"  class="indent-lg">
                {{ csrf_field() }}
                <div class="row">
                   <div class="col-xs-4">
                     <div class="form-group">
                      <label class="sr-only" for="password">Old password</label>
                      <input class="form-control"  type="password" id="password_old" placeholder="Old password" name="password_old" value="{{ old('password_old') }}" />
                        @if ($errors->first('password_old'))
                            <div class="alert alert-danger form_errors" style="display:block">
                                {{ $errors->first('password_old') }}
                            </div>
                        @endif
                     </div>
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
                      <input class="form-control" type="password" id="confirm_password" placeholder="Re-enter new password" name="password_confirmation" value="" />
                      </div>
                     
                     <button type="submit" class="btn btn-singin btn-success outline"  id="sbtn">Send</button>
                   </div>
                </div>
             </form>
    
@endsection 
