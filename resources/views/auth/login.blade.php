@extends('master_main')

@section('cont')
<div class="container">
     <div class="row">
        <div class="col-xs-4 col-xs-offset-4">
                    <h2 class="text-center">Login</h2>
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
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

                        <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-lg btn-success outline btn-block">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                     </form>
                </div>
            </div>
        </div>
@endsection