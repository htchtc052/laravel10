@extends('master_main')

@section('cont')
{{--
<script src="/js/profileupdate.js"></script>
--}}
   <div class="breadcrumbs">
      <a href="/home">Profile</a>
   </div>
     <h1 class="indent-lg">Change your name</h1>
       
            <div id="msg" class="form_msg" style="display:none;color:green;"></div>
            {{--
            <div id="form_errors" class="form_all_errors" style="display:none;"></div>
            --}}
            <form  method="POST" action="{{ route('home.update_save') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                      <div class="form-group col-xs-4">
                   <label class="sr-only" for="email">Name</label>
                         <input type="text" class="form-control" placeholder="Name" id="name" name='name' value="{{ $errors->first('name') ? old('name'): Auth::user()->name }}" />
                         @if ($errors->has('name'))
                            <div class="alert alert-danger form_errors">{{ $errors->first('name') }}</div>
                         @endif
                      </div>
                </div>
                  <button type="submit" class="btn btn-default" id="sbtn">Save</button>
            </form>

@endsection
