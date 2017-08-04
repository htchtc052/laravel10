@extends('master_main')

@section('cont')

   <div class="breadcrumbs">
      <a href="/home">Profile</a>
   </div>
     <h1 class="indent-lg">Upload your avatar</h1>
             @if (session('error_msg'))
                 <div class="alert">
                     {{ session('error_msg') }}
                 </div>
             @endif

             @if (session('msg'))
                 <div class="">
                     {{ session('msg') }}
                 </div>
             @endif

             @if ($avatar_url)
             <img src="{{ $avatar_url }}" border="0" />
             @else
                <div>No image</div>
             @endif

            <form  method="POST" action="{{ route('home.account.avatar_save') }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                      <div class="form-group col-xs-4">
                   <label class="sr-only" for="image_file">Image file</label>
                         <input type="file" class="form-control" id="image_file" name="image_file"  />
                         @if ($errors->has('image_file'))
                            <div class="alert alert-danger form_errors">{{ $errors->first('image_file') }}</div>
                         @endif
                      </div>
                </div>
                  <button type="submit" class="btn btn-default" id="sbtn">Save</button>
            </form>

            <form  method="POST" action="{{ route('home.account.avatar_delete') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-danger" id="sbtn_delete" onclick="return confirm('sure delete?')">Delete Avatar</button>
            </form>
@endsection
