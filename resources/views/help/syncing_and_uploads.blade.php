@extends('master_main')

@section('cont')
<div class="breadcrumbs"><a href="/">Home</a><a href="/help">Help</a></div>
<div class="row">
   <div class="col-xs-3">
        <ul class="list-unstyled help-menu">
            <li><a href="/help">Sharing files and folders</a></li>
            <li><a href="/help/payments_and_billing/">Payments and billing</a></li>
            <li><a href="/help/security_and_privacy/">Security and privacy</a></li>
            <li><a class="active" href="syncing_and_uploads/">Syncing and uploads</a></li>
            <li><a href="/help/log_in_help/">Sign-in help</a></li>
            <li><a href="/help/manage_account/">Manage account</a></li>
            <li><a href="/help/space_and_storage/">Space and storage</a></li>
            <li><a href="/help/photos_and_videos/">Photos and videos</a></li>
        </ul>
   </div>
   <div class="col-xs-9">
      <h1 class="page-title">Syncing and uploads</h1>
      <div class="row">
         <div class="col-xs-6">
            <h4>Account performance</h4>
            <ol>
                <li><a href="#">Why is Dropbox using so much RAM?</a></li>
            </ol>
            <h4>Syncing overview</h4>
            <ol>
                <li><a href="#">How do I sync files between computers?</a></li>
                <li><a href="#">In what order does Dropbox sync files?</a></li>
                <li><a href="#">Can I have Dropbox sync files outside my Dropbox folder? </a></li>
                <li><a href="#">What is LAN sync?</a></li>
                <li><a href="#">What is syncing and how does it work?</a></li>
            </ol>
            <h4>Tracking and file recovery</h4>
            <ol>
                <li><a href="#">How do I recover previous versions of files?</a></li>
                <li><a href="#">Does Dropbox keep backups of my files?</a></li>
                <li><a href="#">What happens when I delete a file?</a></li>
            </ol>
         </div>
         <div class="col-xs-6">

            <h4>Syncing errors</h4>
            <ol>
                <li><a href="#">What do I do if Dropbox is stuck syncing, won't launch, or reports an error?</a></li>
                <li><a href="#">What does "OperationalError" or "BrokenTempDirError" mean?</a></li>
                <li><a href="#">What's a conflicted copy?</a></li>
                <li><a href="#">Why aren't certain files on one computer syncing to another?</a></li>
                <li><a href="#">What do the icons on my files mean?</a></li>
                <li><a href="#">Why can't I establish a secure connection?</a></li>
                <li><a href="#">Why aren't my Dropbox icon overlays appearing correctly?</a></li>
                <li><a href="#">Dropbox can't access your Windows Registry</a></li>
                <li><a href="#">Dropbox says my file is in use. What's wrong?</a></li>
                <li><a href="#">What's a white space conflict?</a></li>
                <li><a href="#">My files are different or stopped updating—what's going on?</a></li>
            </ol>
            <h4>Selective sync</h4>
            <ol>
                <li><a href="#">What if my hard drive can't fit the contents of my Dropbox folder? Can I select which files to sync?</a></li>
                <li><a href="#">How do I save space on my computer with selective sync?</a></li>
                <li><a href="#">What is a Selective Sync conflict?</a></li>
                <li><a href="#">Use Selective Sync on your desktop</a></li>
            </ol>
         </div>
      </div>
   </div>



</div>




   
@endsection