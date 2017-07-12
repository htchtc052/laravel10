@extends('master_main')
@section('cont')
{{--
<script src="/js/account.js"></script>
--}}
   <div class="breadcrumbs">
      <a href="/profile">Profile</a>
   </div>
     <h1 class="indent-lg">Settings</h1>
        <ul class="nav nav-tabs responsive" id="TabBox">
            <li class="active"><a data-toggle="tab" href="#profile" aria-expanded="true">Profile</a></li>
            <li><a data-toggle="tab" href="#personal" aria-expanded="false">Account</a></li>
            <li><a data-toggle="tab" href="#security" aria-expanded="false">Security</a></li>
        </ul>
        <div class="tab-content">
            <div id="profile" class="tab-pane active">
                <div class="row tab-pane-inner">
                    <div class="col-xs-12 indent-sm">
                        <h4>{{Auth::user()->name}} <small><a href="/home/update">Change</a></small></h4> 
                        @if(!isset($subscription))
                        <h5 class="setting-item-title upgrade-pop">NoFiles Basic 
                            <a href="#" data-trigger="focus" data-html="true" data-container=".upgrade-pop" data-toggle="popover" data-placement="right" data-content="You are using NoFiles Basic. <a href='/profile/upgradepaytureprepare'>Upgrade your account</a>"><span class="fa fa-question-circle"></span></a>
                        </h5>
                      @elseif($subscription->type==1)
                          <h5 class="setting-item-title upgrade-pop">NoFiles Silver
                            <a href="#" data-trigger="focus" data-html="true" data-container=".upgrade-pop" data-toggle="popover" data-placement="right" data-content="You are using NoFiles Silver"><span class="fa fa-question-circle"></span></a>
                        </h5>
                      @elseif($subscription->type==2)
                          <h5 class="setting-item-title upgrade-pop">NoFiles Gold
                            <a href="#" data-trigger="focus" data-html="true" data-container=".upgrade-pop" data-toggle="popover" data-placement="right" data-content="You are using NoFiles Gold"><span class="fa fa-question-circle"></span></a>
                        </h5>
                      @endif
                    </div>
                    <div class="col-xs-6">
                        <h5 class="setting-item-title">Personal email</h5>
                        <p>{{Auth::user()->email}}</p>
                        <a href="/profile/account/email">Change</a>
                    </div>
                </div>
                <hr class="featurette-divider">
                @if(!isset($subscription))
                <form class="form-signup" action="#" method="POST" id="account_addsubscription_form">
                <input type="hidden" name="crsf_token" id="crsf_token" value="{{ csrf_token() }}">
                <div class="row tab-pane-inner">
                    <div class="col-xs-12">
                        <h4>Subscription</h4>
                        <h5 class="setting-item-title">Your have no Subscription</h5>
                        <p class="indent"><strong>Choise</strong></p>
                    </div>
                    <div class="col-xs-5">
                        <div class="panel panel-default indent-lg">
                            <table class="table table-bordered">
                                <tr>
                                    <td class="text-center" rowspan="@if(Cookie::get('debug')) 3 @else 2 @endif"><strong>Pro Silver</strong><div><img height="65" src="/style/silver.svg" ></div></td>
                                    <td>                                 
                                        <label>
                                            <input type="radio" class="planorder" name="planorder" value="silvermonth"  /> $ 9.99 monthly
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="text-success pull-right">Save 17%</span>
                                            <label>
                                                <input type="radio" class="planorder" name="planorder" value="silveryear" /> $ 99.00 yearly
                                            </label>
                                    </td>
                                </tr>
                           @if(Cookie::get('debug'))
                               <tr>
                                  <td>
                                     <label>
                                         <input type="radio" class="planorder" name="planorder"  value="silvertest" /> $ 1 minute
                                     </label>
                                  </td>
                               </tr>
                           @endif
                               <tr>
                                  <td class="text-center" style="border-bottom:none" rowspan="@if(Cookie::get('debug')) 3 @else 2 @endif"><strong>Pro Gold</strong><div>
                                      <img height="65" src="/style/gold.svg">
                                  </div></td>
                                  <td>                                 
                                     <label>
                                        <input type="radio" class="planorder" name="planorder"  value="goldmonth" /> $ 19.99 monthly
                                     </label>
                                  </td>
                               </tr>
                               <tr>
                                  <td>
                                     <span class="text-success pull-right">Save 17%</span>
                                     <label>
                                        <input type="radio" class="planorder" name="planorder" value="goldyear" /> $ 199 yearly
                                     </label>
                                  </td>
                               </tr>
                           @if(Cookie::get('debug'))
                               <tr>
                                  <td>
                                     <label>
                                        <input type="radio" class="planorder" name="planorder" value="goldtest" /> $ 2 minute
                                     </label>
                                  </td>
                               </tr>
                           @endif
                            </table> 
                        </div>
                        <button type="submit" class="btn btn-success outline" id="account_addsubscription_sbtn">Add subscription</button>
                    </div>
                    <div class="col-xs-5 col-xs-offset-2">
                        <a href="/profile/account/payments">View payments history</a>
                    </div>
                </div>
                </form>
                <div id="roboform" style="display:none;"></div>
                @else
                <div class="row tab-pane-inner">
                    <div class="col-xs-12">
                        <h4 class="indent-lg">Subscription</h4>
                    </div>
                    <div class="col-xs-5">
                        <div class="panel panel-default indent-lg">
                            <table class="table table-bordered">
                                <tr>
                                    <td class="text-center"> 
                                        @if($subscription->type==1)
                                        <strong>Pro Silver</strong><div><img height="90" src="/style/silver.svg" ></div>
                                        @elseif($subscription->type==2)
                                        <strong>Pro Gold</strong><div><img height="90" src="/style/gold.svg"></div>
                                        @endif
                                        @if($subscription->renew_period==1)
                                         <p>${{$subscription->renew_price}}/month</p>
                                        @elseif($subscription->renew_period==2)
                                         <p>${{$subscription->renew_price}}/year</p>
                                        @elseif($subscription->renew_period==3)
                                         <p>${{$subscription->renew_price}}/minute</p>
                                        @endif
                                    </td>
                                    <td>   
                                      {{-- {{$subscription->renew_dt->toFormattedDateString()}} --}}
                                    @if(isset($ajusting_payment))
                                           <div class="indent-xs"  id="subscription_not_canceled"  style="@if(!$subscription->not_canceled) display:none;@endif">
                                                    <div class="indent-xs">
                                                        <p>
                                                            <span class="label label-success">Subscription auto renew</span>
                                                        </p>
                                                        Pay ${{$subscription->renew_price}} 
                                                        in {{$subscription->renew_dt_account}} 
                                                    </div>
                                                    <a href="#" class="btn btn-sm btn-danger outline subscription_cancel" id="subscription_cancel_{{$subscription->id}}" >Cancel subscription</a> 
                                           </div> 
                                           <div id="subscription_canceled" class="indent-xs"  style="@if($subscription->not_canceled) display:none;@endif">
                                                <div class="indent-xs">
                                                    <p>
                                                        <span class="label label-danger">Subscription canceled</span>
                                                    </p> 
                                                    Close in {{$subscription->renew_dt_account}} 
                                                </div>
                                                <a href="#" id="subscription_uncancel_{{$subscription->id}}" class="btn btn-sm btn-success  outline subscription_uncancel">Uncancel subscription</a> 
                                           </div>
                                          @if($ajusting_payment->gateway==3)
                                               <span>Payment method: payture bank card</span>
                                           @endif 
                                    @else
                                        <div>
                                            Subscription close {{$subscription->renew_dt}}
                                        </div>
                                    @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-xs-4 col-xs-offset-2">
                        <a href="/profile/account/payments">View payments history</a>
                    </div>
                </div>                       
                @endif

               <hr class="featurette-divider">
               <div class="row tab-pane-inner">
                  <div class="col-xs-12">
                     <h4>Preferences</h4>
                  </div>
                  <div class="col-xs-6">
                     <h5 class="setting-item-title">Email notifications – Personal</h5>
                     <ul class="list-unstyled setting-list indent-lg">
                        <li><input type="checkbox" checked="checked" name="quota_warning_personal" value="true" id="quota_warning_personal"> <label for="quota_warning_personal">NoFiles news</label></li>
                      </ul>
                     
                  </div>
                  <div class="col-xs-4">
                     
                     <h5 class="setting-item-title">NoFiles settings</h5>
                     <ul class="list-unstyled setting-list indent-lg">
                        <li><input type="checkbox" name="early_release_opt_in" value="edge" id="early_release_opt_in"><label for="early_release_opt_in">Include me on early releases</label></li>
                      </ul>
                  </div>
                </div>
              </div>
                <div id="personal" class="tab-pane">
                    <div class="tab-pane-inner">
                        <h4 class="indent">Space <small>(NoFiles Basic)</small></h4>
                        <div class="progress indent-lg">
                          <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                          </div>
                        </div>
                        <div class="text-center">
                        <ul class="list-inline">
                            <li>9.4 KB of 2 GB used</li>
                            <li class="disabled">Normal files (9.4 KB)</li>
                            <li>Shared files (0 bytes)</li>
                            <li>Unused space (2 GB)</li>
                        </ul>
                        </div>
                        <hr class="featurette-divider">
                    </div>
                </div>
                <div id="security" class="tab-pane">
                  <div class="tab-pane-inner">
                        <h4 class="indent">NoFiles</h4>
                        <h5 class="setting-item-title">Password</h5>
                        <ul class="list-unstyled indent-lg">
                            <li><a href="{{ route('home.password.change') }}">Change password</a></li>
                            <li><a href="{{ route('password.request') }}">Forgotten password?</a></li> 
                        </ul>
                   </div>
                </div>
            </div>
@endsection
