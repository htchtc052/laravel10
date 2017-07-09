@extends('master_main')

@section('cont')
<div class="breadcrumbs"><a href="/">Home</a><a href="/help">Help</a></div>
<div class="row">
   <div class="col-xs-3">
      <ul class="list-unstyled help-menu">
         <li><a href="/help">Sharing files and folders</a></li>
         <li><a href="/help/payments_and_billing/">Payments and billing</a></li>
         <li><a href="/help/security_and_privacy/">Security and privacy</a></li>
         <li><a href="/help/syncing_and_uploads/">Syncing and uploads</a></li>
         <li><a href="/help/log_in_help/">Sign-in help</a></li>
         <li><a class="active" href="/help/manage_account/">Manage account</a></li>
         <li><a href="/help/space_and_storage/">Space and storage</a></li>
         <li><a href="/help/photos_and_videos/">Photos and videos</a></li>
		</ul>
   </div>
   <div class="col-xs-9">
      <h1 class="page-title">Manage account</h1>
      <div class="row">
         <div class="col-xs-6">
           <h4>Email and password</h4>
           <ol>
            <li><a href="#">How do I choose a secure password for Dropbox?</a></li>
            <li><a href="#">Why did my password expire?</a></li>
            <li><a href="#">How do I change my password?</a></li>
            <li><a href="#">I forgot my password. How do I reset it?</a></li>
            <li><a href="#">How do I change my email address?</a></li>
            <li><a href="#">How do I verify my email address?</a></li>
            <li><a href="#">How can I find out the email address for my Dropbox account?</a></li>
           </ol>
           <h4>Account settings</h4>
           <ol>
            <li><a href="#">How do I upgrade to the latest version of the Dropbox application?</a></li>
            <li><a href="#">How do I set a profile picture?</a></li>
            <li><a href="#">How do I change my account settings?</a></li>
            <li><a href="#">What is the Photos folder for?</a></li>
            <li><a href="#">Do you have Dropbox in my language?</a></li>
            <li><a href="#">How do I change my phone number for two-step verification?</a></li>
            <li><a href="#">How do I get notified of changes in my Dropbox?</a></li>
            <li><a href="#">How do I link or unlink my Facebook or Twitter account?</a></li>
            <li><a href="#">How do I opt out of Dropbox email newsletters and tips?</a></li>
            <li><a href="#">How do I change the way dates are shown on the website?</a></li>
            <li><a href="#">What is the Public folder?</a></li>
            <li><a href="#">How can I access my personal information?</a></li>
           </ol>
           <h4>Advanced settings</h4>
           <ol>
            <li><a href="#">Do I need to configure my firewall to work with Dropbox?</a></li>
            <li><a href="#">How do I get Dropbox to work on my corporate network?</a></li>
            <li><a href="#">Why does Dropbox require Mac Keychain access?</a></li>
           </ol>
            <h4>Getting started</h4>
            <ol>
               <li><a href="#">How do I share folders with other people?</a></li>
               <li><a href="#">Can I share files with non-Dropbox users?</a></li>
               <li><a href="#">How do I delete my account?</a></li>
               <li><a href="#">What is the Public folder?</a></li>
               <li><a href="#">How do I install Dropbox?</a></li>
               <li><a href="#">What is the Photos folder for?</a></li>
               <li><a href="#">Do you have Dropbox in my language?</a></li>
               <li><a href="#">What are the system requirements to run Dropbox? </a></li>
               <li><a href="#">How do I get notified of changes in my Dropbox?</a></li>
               <li><a href="#">Download the Dropbox desktop application</a></li>
            </ol>
         </div>
         <div class="col-xs-6">
            <h4>Account security</h4>            
            <ol>
               <li><a href="#">Can I specify my own private key for my Dropbox?</a></li>
               <li><a href="#">How secure is Dropbox?</a></li>
               <li><a href="#">How can I protect my Dropbox account?</a></li>
               <li><a href="#">Two-step verification: An extra layer of security</a></li>
               <li><a href="#">I think my account was compromised. What do I do?</a></li>
               <li><a href="#">Security Overview</a></li>
            </ol>
            <h4>Manage files and folders</h4>
            <ol>
               <li><a href="#">How do I share folders with other people?</a></li>
               <li><a href="#">Add files to your Dropbox</a></li>
               <li><a href="#">How do I move my Dropbox folder to a new location?</a></li>
               <li><a href="#">How do I delete files from Dropbox on my computer?</a></li>
               <li><a href="#">Can I download entire folders on the Dropbox website?</a></li>
               <li><a href="#">Can I rename or move a shared folder?</a></li>
               <li><a href="#">How do I change the owner of a shared folder?</a></li>
               <li><a href="#">What types of files can I preview on dropbox.com? </a></li>
               <li><a href="#">Can I set file permissions for members of my shared folders?</a></li>
               <li><a href="#">How do I use remote wipe to delete the Dropbox folder from a member's lost or stolen device?</a></li>
               <li><a href="#">Why do I get an error when permanently deleting files?</a></li>
            </ol>
            <h4>Manage space and storage</h4>
            <ol>
               <li><a href="#">How much space does my Dropbox account have left?</a></li>
               <li><a href="#">Can I earn more space on my Dropbox account?</a></li>
               <li><a href="#">Will joining someone else's shared folder use my quota?</a></li>
               <li><a href="#">How do I change my account settings?</a></li>
               <li><a href="#">Is my Dell device eligible for the Dropbox space promotion?</a></li>
               <li><a href="#">How do I get extra space for connecting a personal and work Dropbox account?</a></li>
               <li><a href="#">Why haven’t I received my promotion space?</a></li>
               <li><a href="#">How many files can I store in my Dropbox?</a></li>
             </ol>
            <h4>Manage space and storage</h4>
            <ol>
               <li><a href="#">How much space does my Dropbox account have left?</a></li>
               <li><a href="#">Can I earn more space on my Dropbox account?</a></li>
               <li><a href="#">Will joining someone else's shared folder use my quota?</a></li>
               <li><a href="#">How do I change my account settings?</a></li>
               <li><a href="#">Is my Dell device eligible for the Dropbox space promotion?</a></li>
               <li><a href="#">How do I get extra space for connecting a personal and work Dropbox account?</a></li>
               <li><a href="#">Why haven’t I received my promotion space?</a></li>
               <li><a href="#">How many files can I store in my Dropbox?</a></li>
            </ol>
         </div>
      </div>
   </div>



</div>




   
@endsection