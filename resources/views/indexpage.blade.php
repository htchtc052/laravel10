@extends('master_main')
@section('cont')
{{--
<script src="/js/signup.js"></script>--}}
        <div class="main-box-holder">
        <div class="row">
         <div class="col-xs-5">
            <h1 class="large-title">NoFiles works the way you do</h1>
            <p>Get to all of your files from anywhere, on any device, and share them with anyone.</p>
         </div>
        <div class="col-xs-5 col-xs-offset-2">
                <form class="form-signup" action="{{ route('register_post') }}" method="POST" id="signup_form">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     <div class="form-group">
                        <label class="sr-only" for="email">Full name</label>
                        <input type="text" id="name" class="form-control" placeholder="Full name" name='name' value="{{ old('name') }}" />
                        @if (strlen($errors->first('name')))
                            <div class="alert alert-danger form_errors" style="display:block" id="name_error">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                     </div>
                  <div class="row">
                        <div class="col-xs-6">
                           <div class="form-group">
                              <label class="sr-only" for="email">Email</label>
                                <input type="text" id="email" class="form-control" placeholder="Email" name='email' value="{{ old('email') }}" />
                                @if (strlen($errors->first('email')))
                                    <div class="alert alert-danger form_errors" style="display:block" id="email_error">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                           </div>
                        </div>
                        <div class="col-xs-6">
                           <div class="form-group">
                              <label class="sr-only" for="password">Password</label>
                                <input class="form-control" type="password" id="password" placeholder="Password" name="password" value="" />
                                @if (strlen($errors->first('password')))
                                    <div class="alert alert-danger form_errors" style="display:block" id="password_error">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                           </div>   
                        </div>
                     </div>
                     <div class="checkbox">
                        <label>
                           <input type="checkbox" id="agree" name="agree"{{old('agree') ? " checked" : ""}}> I agree to the <a href="/privacy">terms</a>
                        </label>
                            @if (strlen($errors->first('agree')))
                                <div class="alert alert-danger form_errors" style="display:block" id="agree_error">
                                    {{ $errors->first('agree') }}
                                </div>
                            @endif
                     </div>
                     
                     <button type="submit" class="btn btn-lg btn-success outline btn-block" id="sbtn">Sign up for free</button>
                </form>
            
          </div>
        </div>
      <hr class="featurette-divider">
      <div class="row indent-lg">
         <div class="col-xs-6">
            <h2 class="medium-title">Take your docs anywhere</h2>
            <p>Save files on your computer, then access them on your phone from the road. Everything you keep in NoFiles is automatically synced to all of your devices.</p>
            <a href="#" class="get-more"><span class="fa fa-plus-circle"></span> Learn more</a>
         </div>
         <div class="col-xs-6 text-center">
                 <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA1MTIgNTEyIiB3aWR0aD0iMjU2cHgiIGhlaWdodD0iMjU2cHgiPgogIDxnPgogICAgPGc+CiAgICAgIDxnPgogICAgICAgIDxwYXRoIGQ9Im00NjAuOSwyNDUuOWMtMSwyMC41LTE4LjIsMzYuNC0zOC43LDM2LjRoLTE5LjNjLTI0LTU2LjgtODAuNC05Ni44LTE0NS45LTk2LjgtNjQuOSwwLTEyMC44LDM5LjMtMTQ1LjIsOTUuMy0zMi42LTYuNi01Ny43LTM0LjctNTguNy02OS4xLTEuMS0zNy40IDI2LjQtNjkuNiA2My4zLTc0LjQgMTUuMi0yIDI4LTEyLjIgMzMuMy0yNi42IDEyLjQtMzQuNSA0NS41LTU3LjcgODIuMi01Ny43IDM1LjIsMCA2Ni45LDIxIDgwLjcsNTMuNCA2LjQsMTUgMjEsMjQuOCAzNy4zLDI1IDExLjUsMC4xIDIyLjYsNC40IDMxLjMsMTEuOSA4LjYsNy41IDE0LjMsMTcuOCAxNiwyOSAyLjYsMTcuMiAxNS44LDMwLjggMzIuOCwzNC4xIDE4LjUsMy42IDMxLjgsMjAuNCAzMC45LDM5LjV6bS0xMzMuMyw3Ny40Yy0xLjYtMjkuNy02LjUtNTkuMS0xNS4xLTgzLjEgMzEuMSwxNi43IDUzLjksNDcuMSA2MC4yLDgzLjFoLTQ1LjF6bS0xNS4xLDEyMy45YzguNi0yNCAxMy42LTUzLjQgMTUuMS04My4xaDQ1LjFjLTYuNCwzNi0yOS4xLDY2LjQtNjAuMiw4My4xem0tODUuMi0xMjMuOWMzLjUtNjIuMiAyMi4yLTk0LjggMjkuNC05NyAwLjEsMCAwLjEsMCAwLjIsMCA3LjcsMi4yIDI2LjQsMzQuOCAyOS45LDk3aC01OS41em0yOS43LDEzNy44Yy03LjgtMi42LTI2LjMtMzUuMi0yOS43LTk3aDU5LjVjLTMuNSw2MS44LTIyLDk0LjQtMjkuOCw5N3ptLTcwLjYtMTM3LjhoLTQ1LjFjNi4zLTM2IDI5LjEtNjYuMyA2MC4yLTgzLjEtOC42LDI0LTEzLjUsNTMuNC0xNS4xLDgzLjF6bS00NS4xLDQwLjhoNDUuMWMxLjUsMjkuNyA2LjUsNTkuMSAxNS4xLDgzLjEtMzEuMS0xNi43LTUzLjgtNDcuMS02MC4yLTgzLjF6bTI5Ni40LTE5OGMtNi41LTQyLjYtNDMuMS03NS4yLTg3LjQtNzUuNy0xOS41LTQ2LjEtNjUuMi03OC40LTExOC40LTc4LjQtNTUuNiwwLTEwMi45LDM1LjItMTIwLjksODQuNS01NS45LDcuMy05OSw1NS05OSwxMTIuOSAwLDU0LjEgMzcuOCw5OS41IDg4LjQsMTExLTEuMSw3LjYtMS43LDE1LjQtMS43LDIzLjMgMCw4Ny4zIDcxLDE1OC4zIDE1OC4zLDE1OC4zIDg3LjMsMCAxNTguMy03MSAxNTguMy0xNTguMyAwLTYuOS0wLjQtMTMuNy0xLjMtMjAuNGg4LjdjNDMuOCwwIDc5LjMtMzUuNSA3OS4zLTc5LjMgMC0zOC42LTI3LjctNzAuOC02NC4zLTc3Ljl6IiBmaWxsPSIjNTVhYjY5Ii8+CiAgICAgIDwvZz4KICAgIDwvZz4KICA8L2c+Cjwvc3ZnPgo=" />
            </div>
      </div>
      <div class="row text-center more-box">
         <div class="col-xs-12 indent-lg">
            <span class="fa fa-times-circle close-more-box"></span>
         </div>
         <div class="col-xs-4">
            <h3>All of your files</h3>
            <img src="https://cf.dropboxstatic.com/static/images/index/all_your_files-vflH9BpRk.png" />
            <p>Save any kind of file in Dropbox, from photos, videos and music to Microsoft Office and Adobe files.</p>
         </div>
         <div class="col-xs-4">
            <h3>Any device</h3>
            <img src="https://cf.dropboxstatic.com/static/images/index/any_device-vflAudVJW.png" />
            <p>Sync files across all of your devices, whether you use a PC, Mac, Android device, iPad, iPhone or Windows Phone.</p>
         </div>
         <div class="col-xs-4">
            <h3>Offline access</h3>
            <img src="https://cf.dropboxstatic.com/static/images/index/offline_access-vfl3bndh9.png" />
            <p>Your files are available on your computer even when you’re offline, so you can work from anywhere.</p>
         </div>
      </div>
      <hr class="featurette-divider">
      <div class="row indent-lg">
         <div class="col-xs-6 text-center">
                    <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA1MTIgNTEyIiB3aWR0aD0iMjU2cHgiIGhlaWdodD0iMjU2cHgiPgogIDxnPgogICAgPGc+CiAgICAgIDxwYXRoIGQ9Im00MTEuOSwzMzguM2MtNC41LTgxLjYtNzIuMi0xNDYuNS0xNTQuOS0xNDYuNXMtMTUwLjQsNjUtMTU0LjksMTQ2LjVjLTI3LjYtMi43LTQ5LjMtMjguOC00OS4zLTYwLjQgMC0xNS41IDUuMy0zMC4zIDE0LjktNDEuNiA0LjctNS42IDYuMS0xMy4yIDMuNi0yMC4xLTUuMS0xNC4yLTcuNy0yOS03LjctNDQgMC02NS44IDQ4LjUtMTE5LjQgMTA4LjEtMTE5LjQgNDMuNiwwIDgyLjQsMjguOCA5OS42LDczLjEgNy41LDE5LjMgMjYuOSwxMi43IDMyLDguNSAxMC44LTguOCAyMy42LTEzLjUgMzYuOS0xMy41IDM0LjYsMCA2MS4zLDMxLjQgNjIuNyw3MC4xIDAuNiwxNi44IDUuNiwyNS4zIDE1LjQsMjcuNiAyNC45LDUuOSA0Mi45LDMwLjggNDIuOSw1OS4zIDEuMTM2ODdlLTEzLDMxLjYtMjEuNyw1Ny42LTQ5LjMsNjAuNHptLTE1NC45LDEyM2MtNjMuMSwwLTExNC40LTUxLjMtMTE0LjQtMTE0LjQgMC02My4xIDUxLjMtMTE0LjQgMTE0LjQtMTE0LjQgNjMuMSwwIDExNC40LDUxLjMgMTE0LjQsMTE0LjQgMCw2My01MS4zLDExNC40LTExNC40LDExNC40em0yNDUtMTgzLjRjMC00MS4yLTIzLjgtNzguMi01OC41LTkzLjctMy4yLTU4LTQ4LjQtMTA0LjItMTAzLjMtMTA0LjItMTQuMywwLTI4LjIsMy4xLTQxLDkuMS0yNi43LTQ3LjYtNzQuNi03Ny4yLTEyNy40LTc3LjItODIuMSwwLTE0OC45LDcxLjktMTQ4LjksMTYwLjIgMCwxNiAyLjIsMzEuOCA2LjcsNDcuMi0xMS41LDE3LjEtMTcuNiwzNy41LTE3LjYsNTguNiAwLDU1LjQgNDEuNywxMDAuNiA5My4zLDEwMS41IDE1LDcwIDc3LjMsMTIyLjcgMTUxLjcsMTIyLjdzMTM2LjctNTIuNyAxNTEuNy0xMjIuN2M1MS42LTEgOTMuMy00Ni4xIDkzLjMtMTAxLjV6IiBmaWxsPSIjNTVhYjY5Ii8+CiAgICAgIDxwYXRoIGQ9Im0yNDcuNSwzNzAuM3YtNDYuOWwzMS45LDIzLjQtMzEuOSwyMy41em03OC41LTM5LjlsLTg2LjctNjMuNmMtNi4yLTQuNS0xNC40LTUuMi0yMS4yLTEuOC02LjgsMy41LTExLjIsMTAuNS0xMS4yLDE4LjJ2MTI3LjNjMCw3LjcgNC4zLDE0LjcgMTEuMiwxOC4yIDIuOSwxLjUgMTMuMSwzLjYgMjEuMi0xLjhsODYuNy02My42YzUuMi0zLjggOC4zLTkuOSA4LjMtMTYuNCAwLTYuNS0zLjEtMTIuNi04LjMtMTYuNXoiIGZpbGw9IiM1NWFiNjkiLz4KICAgIDwvZz4KICA8L2c+Cjwvc3ZnPgo=" />
                 </div>
         <div class="col-xs-6">
            <h2 class="medium-title">Send videos quickly</h2>
            <p>Send your entire wedding video to your family with a simple link. It’s easy to share large files with anyone - even if they don’t have a NoFiles account.</p>
            <a href="#" class="get-more"><span class="fa fa-plus-circle"></span> Learn more</a>
         </div>
      </div>
      <div class="row text-center more-box">
         <div class="col-xs-12 indent-lg">
            <span class="fa fa-times-circle close-more-box"></span>
         </div>
         <div class="col-xs-4">
            <h3>Large files</h3>
            <img src="https://cf.dropboxstatic.com/static/images/index/large_files-vflv7R_Vc.png" />
            <p>Sharing large files is as fast as sharing small ones. Put any file in your Dropbox, then send it quickly with a simple link.</p>
         </div>
         <div class="col-xs-4">
            <h3>Simple sharing</h3>
            <img src="https://cf.dropboxstatic.com/static/images/index/simple_sharing-vfl6GdL6B.png" />
            <p>Create a link to share any file in your Dropbox. Then send the link by email, chat or even text message.</p>
         </div>
         <div class="col-xs-4">
            <h3>Preview and download</h3>
            <img src="https://cf.dropboxstatic.com/static/images/index/preview_and_download-vflY0wjwA.png" />
            <p>When you send someone a link to a file, they can preview and download a copy - even if they don’t have a Dropbox account.</p>
         </div>
      </div>
      <hr class="featurette-divider">
      <div class="row indent-lg">
         <div class="col-xs-6">
            <h2 class="medium-title">Keep your photos safe</h2>
            <p>Back up holiday photos automatically from your phone or computer. That way, memories are safe as soon as you make them, and you can relive them from any device.</p>
            <a href="#" class="get-more"><span class="fa fa-plus-circle"></span> Learn more</a>
         </div>
         <div class="col-xs-6 text-center">
                    <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA1MTIgNTEyIiB3aWR0aD0iMjU2cHgiIGhlaWdodD0iMjU2cHgiPgogIDxnPgogICAgPGc+CiAgICAgIDxnPgogICAgICAgIDxwYXRoIGQ9Im0yNTYuNCwzMjAuNGMyMy43LDAgNDIuOSwxOC44IDQyLjksNDEuOSAwLDIzLjEtMTkuMyw0Mi00Mi45LDQycy00Mi45LTE4LjgtNDIuOS00MmMyLjg0MjE3ZS0xNC0yMy4xIDE5LjItNDEuOSA0Mi45LTQxLjl6bTAsMTI0LjdjNDYuMiwwIDgzLjctMzcuMSA4My43LTgyLjggMC00NS42LTM3LjYtODIuOC04My43LTgyLjgtNDYuMiwwLTgzLjcsMzcuMS04My43LDgyLjggMCw0NS43IDM3LjUsODIuOCA4My43LDgyLjh6IiBmaWxsPSIjNTVhYjY5Ii8+CiAgICAgICAgPHBhdGggZD0ibTQ0MS4zLDI4OS43di01MWMwLTExLjMtOS4xLTIwLjQtMjAuNC0yMC40aC0yNDguMnYtMTQuOWMwLTExLjMtOS4xLTIwLjQtMjAuNC0yMC40LTExLjMsMC0yMC40LDkuMS0yMC40LDIwLjR2MTQuOWgtMzkuOWMtMTEuMywwLTIwLjQsOS4xLTIwLjQsMjAuNHY1MGMtMTEuNC05LjItMTguNi0yMy4zLTE4LjYtMzkuMSAwLTEwLjIgMy0xOS45IDguNi0yOC4zIDYuNi05LjggOC43LTIxLjkgNS44LTMzLjMtMi4zLTguOC0zLjQtMTcuOS0zLjQtMjcuMSAwLTU5LjQgNDguNC0xMDcuOSAxMDcuOS0xMDcuOSAzNiwwIDY5LjUsMTcuOSA4OS43LDQ3LjkgMTAuNCwxNS41IDI5LjksMjIgNDcuNSwxNS45IDcuMi0yLjUgMTQuOC0zLjggMjIuNi0zLjggMTYuMywwIDMyLDUuOCA0NC40LDE2LjMgMTIuMywxMC40IDIwLjUsMjQuOCAyMy4yLDQwLjUgMi42LDE0LjggMTMuMSwyNy4xIDI3LjQsMzEuOSAyMC42LDYuOSAzNC40LDI2LjIgMzQuNCw0Ny45LTAuMSwxNi4zLTcuOSwzMC44LTE5LjgsNDAuMXptLTQwLjgsMTcxLjVoLTI4OC4xdi0yMDIuMWgyODguMXYyMDIuMXptMTAxLjUtMjExLjZjMC00MC40LTI2LjEtNzQuNy02Mi40LTg2LjgtOS01MS42LTUzLjktOTAuOC0xMDgtOTAuOC0xMi42LDAtMjQuNywyLjEtMzYsNi4xLTI2LjctMzkuOS03Mi4yLTY2LjEtMTIzLjctNjYuMS04Mi4zLDAtMTQ4LjksNjYuNy0xNDguOSwxNDkgMCwxMi45IDEuNiwyNS40IDQuNywzNy4zLTkuOSwxNC42LTE1LjcsMzIuMy0xNS43LDUxLjMgMCwzOS4zIDI0LjgsNzIuOSA1OS42LDg1Ljh2MTQ2LjFjMCwxMS4zIDkuMSwyMC40IDIwLjQsMjAuNGgzMjguOWMxMS4zLDAgMjAuNC05LjEgMjAuNC0yMC40di0xNDUuNmMzNS40LTEyLjcgNjAuNy00Ni41IDYwLjctODYuM3oiIGZpbGw9IiM1NWFiNjkiLz4KICAgICAgPC9nPgogICAgPC9nPgogIDwvZz4KPC9zdmc+Cg==" />
                 </div>
      </div>
      <div class="row text-center more-box">
         <div class="col-xs-12 indent-lg">
            <span class="fa fa-times-circle close-more-box"></span>
         </div>
         <div class="col-xs-4 col-xs-offset-2">
            <h3>Automatic backup</h3>
            <img src="https://cf.dropboxstatic.com/static/images/index/automatic_backup-vfl_WNwPR.png" />
            <p>Turn on Camera Upload to back up photos automatically from your Camera roll to Dropbox.</p>
         </div>
         <div class="col-xs-4">
            <h3>Organisation</h3>
            <img src="https://cf.dropboxstatic.com/static/images/index/organization-vflB3ImJo.png" />
            <p>Photos are organised by date, and accessible on any device. You can also create and share albums.</p>
         </div>
      </div>
      <hr class="featurette-divider">
      <div class="row indent-lg">
         <div class="col-xs-6 text-center">
                    <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA1MTIgNTEyIiB3aWR0aD0iMjU2cHgiIGhlaWdodD0iMjU2cHgiPgogIDxnPgogICAgPGc+CiAgICAgIDxnPgogICAgICAgIDxwYXRoIGQ9Im0yNzUuOCwzMzcuMWMwLDEzLjUtMTEsMjQuNS0yNC41LDI0LjUtMTMuNSwwLTI0LjUtMTEtMjQuNS0yNC41IDAtMTMuNSAxMS0yNC41IDI0LjUtMjQuNSAxMy41LDAuMSAyNC41LDExIDI0LjUsMjQuNXptOTcuOSwxMjQuMWgtMjQ0LjRjLTQyLjIsMC03Ni41LTI4LjItNzYuNS02Mi45IDAtMjguNCAyMy40LTUzLjQgNTctNjAuNyA3LjUtMS42IDEzLjUtNy4zIDE1LjQtMTQuOCA5LjItMzUgMzguNi02My4xIDc2LjQtNzYuNWw4LjYsNDBjLTE0LjgsMTItMjQuMywzMC4zLTI0LjMsNTAuOCAwLDM2LjEgMjkuMiw2NS4zIDY1LjMsNjUuMyAzNi4xLDAgNjUuMy0yOS4yIDY1LjMtNjUuMyAwLTM2LjEtMjkuMi02NS4zLTY1LjMtNjUuMy0wLjgsMC0xLjYsMC0yLjQsMGwtNy4yLTMzLjdjMy4zLTAuMiA2LjUtMC4zIDkuOS0wLjMgNjAuMiwwIDExMy4zLDM1LjggMTI2LjMsODUgMiw3LjQgNy45LDEzLjEgMTUuNCwxNC44IDMzLjYsNy4zIDU3LDMyLjMgNTcsNjAuNyAwLDM0LjctMzQuMyw2Mi45LTc2LjUsNjIuOXptLTIxOC44LTM2Ny4yYzAtMjIuOSAxOC42LTQxLjUgNDEuNS00MS41IDIyLjksMCA0MS41LDE4LjYgNDEuNSw0MS41IDAsMjIuOS0xOC42LDQxLjUtNDEuNSw0MS41LTIzLDAtNDEuNS0xOC42LTQxLjUtNDEuNXptMjgxLjgsNDQuMWMxMy41LDAgMjQuNSwxMSAyNC41LDI0LjUgMCwxMy41LTExLDI0LjUtMjQuNSwyNC41LTEzLjUsMC0yNC41LTExLTI0LjUtMjQuNSAwLTEzLjYgMTAuOS0yNC41IDI0LjUtMjQuNXptLTIzLDE2Mi44Yy0yMi4yLTYxLjctODctMTAzLjktMTYyLjEtMTAzLjktNi4yLDAtMTIuNCwwLjMtMTguNSwwLjlsLTYtMjcuOGMxOC44LTcuNiAzNC4xLTIxLjkgNDMtNDBsMTAxLjQsMzUuN2MxLjcsMzQuNSAzMC4zLDYyIDY1LjIsNjIgMzYuMSwwIDY1LjMtMjkuMiA2NS4zLTY1LjMgMC0zNi4xLTI5LjItNjUuMy02NS4zLTY1LjMtMjIuNywwLTQyLjcsMTEuNi01NC40LDI5LjFsLTEwNC0zNi43Yy0yLjMtNDMuMi0zOC4xLTc3LjYtODItNzcuNi00NS4zLDAtODIsMzYuNy04Miw4MiAwLDQxLjkgMzEuNSw3Ni41IDcyLjEsODEuNGw2LjYsMzAuNmMtNDguOCwxNS41LTg3LjUsNTAtMTAzLjYsOTQuOS00Ni4yLDE0LjYtNzcuNCw1My4zLTc3LjQsOTcuNCAwLDU3LjIgNTIuNiwxMDMuNyAxMTcuMywxMDMuN2gyNDQuNGM2NC43LDAgMTE3LjMtNDYuNSAxMTcuMy0xMDMuNy01LjY4NDM0ZS0xNC00NC4xLTMxLjMtODIuOC03Ny4zLTk3LjR6IiBmaWxsPSIjNTVhYjY5Ii8+CiAgICAgIDwvZz4KICAgIDwvZz4KICA8L2c+Cjwvc3ZnPgo=" />
                 </div>
         <div class="col-xs-6">
            <h2 class="medium-title">Work on slides together</h2>
            <p>Edit a presentation with teammates, without emailing files back and forward. When you edit a file in a shared folder, everyone gets the update automatically.</p>
            <a href="#" class="get-more"><span class="fa fa-plus-circle"></span> Learn more</a>
         </div>
      </div> 
      <div class="row text-center more-box">
         <div class="col-xs-12 indent-lg">
            <span class="fa fa-times-circle close-more-box"></span>
         </div>
         <div class="col-xs-4 col-xs-offset-2">
            <h3>Shared folders</h3>
            <img src="https://cf.dropboxstatic.com/static/images/index/shared_folders-vflOiYxu8.png" />
            <p>Work on the same files by creating a shared folder. When you add people to the folder, its files will appear in their Dropbox as they do in yours.</p>
         </div>
         <div class="col-xs-4">
            <h3>Automatic updates</h3>
            <img src="https://cf.dropboxstatic.com/static/images/index/automatic_updates-vfl5sZs7k.png" />
            <p>When you edit a file in a shared folder, everyone gets the update automatically. There’s no need to email versions back and forth.</p>
         </div>
      </div>
      <hr class="featurette-divider">      
      <div class="row indent-lg">
         <div class="col-xs-6">
            <h2 class="medium-title">Never lose a file again</h2>
            <p>Left your phone on the train? Your photos, docs and videos are safe. Just sign in to NoFiles from any device and your files will be there waiting for you.</p>
            <a href="#" class="get-more"><span class="fa fa-plus-circle"></span> Learn more</a>
         </div>
         <div class="col-xs-6 text-center">
                    <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA1MTIgNTEyIiB3aWR0aD0iMjU2cHgiIGhlaWdodD0iMjU2cHgiPgogIDxnPgogICAgPGc+CiAgICAgIDxwYXRoIGQ9Im00MDcuMSwzMjAuNWgtMzAuMXYtNy45YzAtMTEuMy05LjEtMjAuNC0yMC40LTIwLjRoLTIzLjV2LTQ1LjVjMC00Ny0zOC4yLTg1LjItODUuMi04NS4yLTQ3LDAtODUuMiwzOC4yLTg1LjIsODUuMnY0NS41aC0yMy41Yy0xMS4zLDAtMjAuNCw5LjEtMjAuNCwyMC40djcuOWgtMTEuOWMtMjkuOCwwLTU0LjEtMjUuMi01NC4xLTU2LjIgMC0xNC4yIDUuMi0yNy43IDE0LjUtMzguMiA1LjEtNS43IDYuNi0xMy44IDMuOS0yMC45LTUtMTMuMi03LjYtMjYuOS03LjYtNDAuOSAwLTYxLjYgNDguNS0xMTEuNyAxMDguMS0xMTEuNyA0My43LDAgODIuOSwyNyA5OS44LDY4LjcgMi40LDUuOSA3LjQsMTAuNCAxMy42LDEyLjEgNi4yLDEuNyAxMi44LDAuNCAxNy44LTMuNSAxMC45LTguNCAyMy44LTEyLjkgMzcuMy0xMi45IDM0LjYsMCA2Mi43LDI5LjIgNjIuNyw2NS4xIDAsMS45LTAuMSwzLjgtMC4zLDUuNy0wLjgsMTAuMiA2LDE5LjQgMTUuOSwyMS42IDI0LjcsNS41IDQyLjcsMjguNiA0Mi43LDU0LjktNS42ODQzNGUtMTQsMzEtMjQuMyw1Ni4yLTU0LjEsNTYuMnptLTExNC45LTI4LjNoLTg4Ljd2LTQ1LjVjMC0yNC41IDE5LjktNDQuNCA0NC40LTQ0LjQgMjQuNSwwIDQ0LjQsMTkuOSA0NC40LDQ0LjR2NDUuNWgtMC4xem00NCwxNjloLTE3Ni42di0xMjguMmgxNzYuNnYxMjguMnptMTA3LjItMjg2LjRjLTMuNy01NC45LTQ4LjctOTguNS0xMDMuMy05OC41LTE0LjQsMC0yOC4zLDMtNDEuMyw4LjgtMjYuNy00NS4xLTc0LjUtNzMuMi0xMjcuMS03My4yLTgyLjEtNS4zMjkwN2UtMTUtMTQ4LjksNjguNC0xNDguOSwxNTIuNSAwLDE1IDIuMiwyOS44IDYuNSw0NC4yLTExLjIsMTYuMy0xNy4zLDM1LjYtMTcuMyw1NS43IDAsNTMuNSA0Mi42LDk3IDk0LjksOTdoMTEuOXYxMjAuMmMwLDExLjMgOS4xLDIwLjQgMjAuNCwyMC40aDIxNy40YzExLjMsMCAyMC40LTkuMSAyMC40LTIwLjR2LTEyMC4xaDMwLjFjNTIuMywwIDk0LjktNDMuNSA5NC45LTk3IDAtMzkuNS0yMy44LTc0LjgtNTguNi04OS42eiIgZmlsbD0iIzU1YWI2OSIvPgogICAgICA8cGF0aCBkPSJtMjQ3LjksNDQ1LjdjMTEuMywwIDIwLjQtOS4xIDIwLjQtMjAuNHYtMjguMWMwLTExLjMtOS4xLTIwLjQtMjAuNC0yMC40LTExLjMsMC0yMC40LDkuMS0yMC40LDIwLjR2MjguMWMwLDExLjIgOS4xLDIwLjQgMjAuNCwyMC40eiIgZmlsbD0iIzU1YWI2OSIvPgogICAgPC9nPgogIDwvZz4KPC9zdmc+Cg==" />
                 </div>
      </div>
      <div class="row text-center more-box">
         <div class="col-xs-12 indent-lg">
            <span class="fa fa-times-circle close-more-box"></span>
         </div>
         <div class="col-xs-4 col-xs-offset-2">
            <h3>Security</h3>
            <img src="https://cf.dropboxstatic.com/static/images/index/sec-verification-vflzoigzY.png" />
            <p>Dropbox protects files in transit and at rest, and offers security features such as two-step verification and sharing controls.</p>
         </div>
         <div class="col-xs-4">
            <h3>File recovery</h3>
            <img src="https://cf.dropboxstatic.com/static/images/index/file_recovery-vfldsGm-1.png" />
            <p>Dropbox includes 30-day version history, in case you accidentally delete a file or want to restore a previous version.</p>
         </div>

      </div>
      {{--
      <hr class="featurette-divider">
      <div class="row">
        <div class="col-xs-4 col-xs-offset-4 indent-lg">
                    <h2 class="text-center">Get started now</h2>
                    <div id="msg" class="form_msg" style="display:none;color:green;"></div>
                <form class="form-signup" action="{{ route('register_post') }}" method="POST" id="signup_form_bottom">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     <div class="form-group">
                        <label class="sr-only" for="email">Full name</label>
                        <input type="text" id="name" class="form-control" placeholder="Full name" name='name' value="{{ old('name') }}" />
                        @if (strlen($errors->first('name')))
                            <div class="alert alert-danger form_errors" style="display:block" id="name_error">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                     </div>
                  <div class="row">
                        <div class="col-xs-6">
                           <div class="form-group">
                              <label class="sr-only" for="email">Email</label>
                                <input type="text" id="email" class="form-control" placeholder="Email" name='email' value="{{ old('email') }}" />
                                @if (strlen($errors->first('email')))
                                    <div class="alert alert-danger form_errors" style="display:block" id="email_error">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                           </div>
                        </div>
                        <div class="col-xs-6">
                           <div class="form-group">
                              <label class="sr-only" for="password">Password</label>
                                <input class="form-control" type="password" id="password" placeholder="Password" name="password" value="" />
                                @if (strlen($errors->first('password')))
                                    <div class="alert alert-danger form_errors" style="display:block" id="password_error">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                           </div>   
                        </div>
                     </div>
                     <div class="checkbox">
                        <label>
                           <input type="checkbox" id="agree" name="agree"{{old('agree') ? " checked" : ""}}> I agree to the <a href="/privacy">terms</a>
                        </label>
                            @if (strlen($errors->first('agree')))
                                <div class="alert alert-danger form_errors" style="display:block" id="agree_error">
                                    {{ $errors->first('agree') }}
                                </div>
                            @endif
                     </div>
                     
                     <button type="submit" class="btn btn-lg btn-success outline btn-block" id="sbtn">Sign up for free</button>
                </form>
          </div>
      </div>
      --}}
</div>

<script type="text/javascript">
   $(document).ready(function() {
      $('.get-more').click(function(){
         $(this).slideUp(250);
         $(this).parent().parent().next().slideToggle(250);
         return false
      });
      $('.close-more-box').click(function(){
         $(this).parent().parent().slideUp(250);
         $(this).parent().parent().prev().find('.get-more').slideDown(250);
      });
   });
</script>



@endsection