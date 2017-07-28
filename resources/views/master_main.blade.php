<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ $title }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/style/bootstrap.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Exo+2:400,100,100italic,200,200italic,300,300italic,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link href="/style/bootstrap-theme.css" rel="stylesheet">
        <link href="/style/font-awesome.css" rel="stylesheet">
    <link href="/style/favicon.ico" rel="shortcut icon" />
        <script src="{{ asset('/js/jquery.js') }}" type="text/javascript" charset="utf-8"></script>    
        <script src="{{ asset('/js/jquery.form.js') }}" type="text/javascript" charset="utf-8"></script>
        <script src="/js/bootstrap.js"></script>
        <script src="/js/global_site.js"></script>
             <script>
            $(document).ready(function() {
              $(document).on('focus', ':input', function() {
                $(this).attr('autocomplete', 'off');
              });
            });
             </script>
  </head>
<body class="{{$pageclass}} main">  @@@
      <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container text-center">
         <div class="row">
            <div class="col-xs-4 col-xs-offset-4 text-center">
               <a href="/" class="full-logo"></a>
            </div>
            <div class="col-xs-4 text-right">
            @if(Auth::user())
            <div class="dropdown user-box-holder pull-right">
            <a data-toggle="dropdown" href="#">{{Auth::user()->name}}<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li class="dropdown-header">9.4 KB of 2 GB used</li>
                    <li>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%"><span class="sr-only">10% Complete (success)</span>
                            </div>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{ route('home') }}">Profile</a></li>
                    <li><a href="{{ route('home.account') }}">Settings</a></li>
                    <li><a href="#">Upgrade</a></li>
                    <li><a href="{{ route('logout') }}">Sing Out</a></li>
                </ul>
            </div>
            @else
                @if (isset($need_login_modal) && $need_login_modal)
                    <div class="btn btn-singin btn-success outline" data-toggle="modal" data-target="#SingInModal">Sign in</div>
                @endif
            @endif
            </div>
         </div>
            
      </div>
    </div>
   <div class="container">
    @yield('cont')
    </div>
        <footer class="full-footer">
        <div class="container">
            <hr class="featurette-divider" />
            <div class="row">
                <div class="col-xs-2">
                    <ul>
                        <li><strong>NoFiles</strong></li>
                        <li><a href="/plans">Plans</a></li>
                        <li><a href="/security">Security</a></li>
                    </ul>
                </div>
                <div class="col-xs-2">
                    <ul>
                        <li><strong>Company</strong></li>
                        <li><a href="/about">About us</a></li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                </div>
                <div class="col-xs-2">
                    <ul>
                        <li><strong>Support</strong></li>
                        <li><a href="/help">Help</a></li>
                        <li><a href="/privacy">Privacy & Terms</a></li>
                    </ul>
                </div>
                <div class="col-xs-6 text-right">
                    NoFiles © 2016
                </div>
            </div>
        </div>  
    </footer>
    @if (isset($need_login_modal) && $need_login_modal)
   <script src="/js/login_modal.js"></script>
   <div class="modal fade" tabindex="-1" role="dialog"  id="SingInModal" >
     <div class="modal-dialog modal-singin">
      <div class="modal-content">
         <form  class="form-signin" id="loginmodal_form" action="#" method="POST">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="fa fa-close"></span></button>
           <h4 class="modal-title">Sing in</h4>
         </div>
         <div class="modal-body">
         
         <div class="row">
            <div class="col-xs-12">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label class="sr-only" for="email">Email</label>
                    <input type="text" id="email" class="form-control" placeholder="Email"  name='email' value="" />
               <div class="alert alert-danger form_errors" id="loginmodal_email_error" style="display:none;"></div>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="password">Password</label>
                    <input type="password" class="form-control" placeholder="Password" id="password" name="password">
               <div class="alert alert-danger form_errors" id="loginmodal_password_error" style="display:none;"></div>
                </div>
               <div class="checkbox">
                     <label>
                            <input type="checkbox" name="remember" id="remember" /> Remember me
                     </label>
            </div>
           
            </div>
         
         </div>
     </div>
         <div class="modal-footer">
            <div class="row">
               <div class="col-xs-8 checkbox">
                  <a href="{{ route('password.request') }}">Forgotten your password?</a>
               </div>
               <div class="col-xs-4 text-right">
                        <button type="submit" class="btn btn-success outline" id="loginmodal_sbtn">Sign in</button>    
                </div>
            </div>
         </div>
         </form>
       </div>
     </div>
   </div>
   @endif
   
</body>
</html>
