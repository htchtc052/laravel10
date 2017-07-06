@extends('master_main')

@section('cont')
<div class="container">
    <div class="row">
            @if (session('auth_status'))
                <div class="alert alert-{{ session('auth_status.alert') }}">
                    {{ session('auth_status.message') }}
                </div>
            @endif
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            <div class="col-xs-4 col-xs-offset-4">
                <h2 class="text-center">Authorization</h2>
                <form  class="form-signin"  method="POST" action="{{ route('login_post') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="email" class="sr-only">E-Mail Address</label>

                                <input id="email"  class="form-control" name="email" value="{{ old('email') }}" autofocus>

                                @if ($errors->has('email'))
                                    <div class="alert alert-danger form_errors">{{ $errors->first('email') }}</div>
                                @endif
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                                <input id="password" type="password" class="form-control" name="password">
                                @if ($errors->has('password'))
                                    <div class="alert alert-danger form_errors">{{ $errors->first('password') }}</div>
                                @endif
                        </div>
                        
                        <div class="form-group indent-lg row">
                            <div class="col-xs-8">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                    <!--<div class="alert alert-danger">Error</div>-->
                                </div>    
                            </div>
                            <div class="col-xs-4 text-right">
                                <button type="submit" class="btn btn-success outline" id="loginmodal_sbtn">Login</button>    
                            </div>
                        </div>
                     </form>
                     <a href="{{ route('password.request') }}">Forgotten your password?</a>
                </div>
            </div>
        </div>
@endsection