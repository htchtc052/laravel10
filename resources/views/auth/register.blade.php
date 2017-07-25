@extends('master_main')

@section('cont')
<div class="container">
     <div class="row">
        <div class="col-xs-4 col-xs-offset-4">
                    <h2 class="text-center">Get started now</h2>
                    <form class="form-signup" method="POST" action="{{ route('register_save') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" cclass="sr-only">Name</label>

                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"  placeholder="Full name" autofocus>

                                @if ($errors->has('name'))
                                    <div class="alert alert-danger form_errors">{{ $errors->first('name') }}</div>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="email" class="sr-only">E-Mail Address</label>

                                <input id="email" class="form-control" name="email" value="{{ old('email') }}">

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
                        
                    <div class="checkbox">
                        <label>
                           <input type="checkbox" id="agree" name="agree"> I agree to the <a href="/privacy">terms</a>
                        </label>
                        
                        @if ($errors->has('agree'))
                            <div class="alert alert-danger form_errors">{{ $errors->first('agree') }}</div>
                        @endif
                    
                    </div>
                     
                     <button type="submit" class="btn btn-lg btn-success outline btn-block" id="sbtn">Sign up for free</button>
                    
                   </form>
                </div>
            </div>
        </div>
@endsection
