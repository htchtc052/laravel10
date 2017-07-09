@extends('master_main')

@section('cont')
<div class="breadcrumbs"><a href="/">Home</a><a href="/help">Help</a></div>
<div class="row">
   <div class="col-xs-3">
        <ul class="list-unstyled help-menu">
            <li><a class="active" href="/help">Sharing files and folders</a></li>
            <li><a href="/help/payments_and_billing/">Payments and billing</a></li>
            <li><a href="/help/security_and_privacy/">Security and privacy</a></li>
            <li><a href="/help/syncing_and_uploads/">Syncing and uploads</a></li>
            <li><a href="/help/log_in_help/">Sign-in help</a></li>
            <li><a href="/help/manage_account/">Manage account</a></li>
            <li><a href="/help/space_and_storage/">Space and storage</a></li>
            <li><a href="/help/photos_and_videos/">Photos and videos</a></li>
        </ul>
   </div>
   <div class="col-xs-9">
      <h1 class="page-title">Sharing files and folders</h1>
      <div class="row">
         <div class="col-xs-6">
            <h4>Collaborating with shared folders</h4>
            <ol>
               <li><a href="#">What is a free team, and what can I do with this feature?</a></li>
               <li><a href="#">How do I share folders with other people?</a></li>
               <li><a href="#">How do I share a file or folder with others?</a></li>
               <li><a href="#">Can I share files with non-Dropbox users?</a></li>
               <li><a href="#">How can I tell if a file or folder is shared or private?</a></li>
               <li><a href="#">How do I unshare a shared folder?</a></li>
               <li><a href="#">Can I rename or move a shared folder?</a></li>
               <li><a href="#">How do I change the owner of a shared folder?</a></li>
               <li><a href="#">Can I set file permissions for members of my shared folders?</a></li>
               <li><a href="#">How do I remove a member from a shared folder?</a></li>
               <li><a href="#">How do I keep others from inviting people to my shared folder?</a></li>
               <li><a href="#">Can I share a folder that's in another shared folder?</a></li>
               <li><a href="#">How do comments work?</a></li>
            </ol>
            <h4>Download files and folders</h4>
            <ol>
               <li><a href="#">How do I force a file to download from the web?</a></li>
               <li><a href="#">Can I download entire folders on the Dropbox website?</a></li>
            </ol>
            <h4>Manage files and folders</h4>
            <ol>
               <li><a href="#">Add files to your Dropbox</a></li>
               <li><a href="#">How do I upload files from my phone or tablet?</a></li>
               <li><a href="#">How do I move my Dropbox folder to a new location?</a></li>
               <li><a href="#">How do I delete files from Dropbox on my computer?</a></li>
               <li><a href="#">Can I rename or move a shared folder?</a></li>
               <li><a href="#">How do I rename a file or folder?</a></li>
               <li><a href="#">How do I move files between my two Dropboxes?</a></li>
               <li><a href="#">How do I select multiple files on the website?</a></li>
               <li><a href="#">Why do I get an error when permanently deleting files?</a></li>
               <li><a href="#">How can I check that a shared folder is syncing?</a></li>
               <li><a href="#">How do I unlock or change view-only permissions for a copy of a shared folder?</a></li>
            </ol>
            <h4>Manage photos and videos</h4>
            <ol>
               <li><a href="#">How do I share photos with other people?</a></li>
               <li><a href="#">Will movies and audio files play on my phone or tablet?</a></li>
               <li><a href="#">Why aren't my photos appearing on the Photos page?</a></li>
               <li><a href="#">How do I share and save screenshots with Dropbox? </a></li>
               <li><a href="#">Why aren't my photos appearing in the mobile app?</a></li>
               <li><a href="#">How do I copy my photos from iPhoto to Dropbox?</a></li>
               <li><a href="#">How do I copy my photos from iPhoto to Dropbox?</a></li>
               <li><a href="#">Why did Dropbox change the names of my photos?</a></li>
               <li><a href="#">Why don't my gallery links work anymore?</a></li>
            </ol>
            <h4>Sending read-only links</h4>
            <ol>
               <li><a href="#">How do I link to a file or folder?</a></li>
               <li><a href="#">How do I share a file or folder with others?</a></li>
               <li><a href="#">Can I share files with non-Dropbox users?</a></li>
               <li><a href="#">Why did my shared link stop working?</a></li>
               <li><a href="#">How can I tell if a file or folder is shared or private?</a></li>
               <li><a href="#">How do I force a file to download from the web?</a></li>
               <li><a href="#">Why were my shared links or file requests banned?</a></li>
               <li><a href="#">How do I unshare links to photos?</a></li>
               <li><a href="#">How do I remove a link to a file or folder?</a></li>
               <li><a href="#">How do I re-create a shared link that was broken?</a></li>
               <li><a href="#">How do I receive and open shared links?</a></li>
               <li><a href="#">How can I limit access to a shared link?</a></li>
               <li><a href="#">How can I set an expiration for a shared link?</a></li></ol>
            <h4>Space and storage</h4>
            <ol>
               <li><a href="#">Is there a limit or maximum to how big my files can be?</a></li>
               <li><a href="#">Will joining someone else's shared folder use my quota?</a></li>
               <li><a href="#">How many files can I store in my Dropbox?</a></li>
            </ol>
         </div>
         <div class="col-xs-6">
            <h4>Frequently asked questions</h4>
            <ol>
               <li><a href="#">What types of files can I preview on dropbox.com? </a></li>
               <li><a href="#">What happens when I delete a file?</a></li>
               <li><a href="#">Why did a shared folder become unshared?</a></li>
               <li><a href="#">Shared folder permissions</a></li>
               <li><a href="#">Shared links controls overview</a></li>
               <li><a href="#">What roles and permissions can members of a shared folder have?</a></li>
               <li><a href="#">How do I set view-only permissions for members of a shared folder?</a></li>
               <li><a href="#">How do I control who can assign roles and permissions in a shared folder?</a></li>
               <li><a href="#">What does it look like when someone with view-only permissions tries to edit a file?</a></li>
               <li><a href="#">I can't share a folder or join someone else's shared folder—why?</a></li>
            </ol>
            <h4>Getting started</h4>
            <ol>
               <li><a href="#">How do I share folders with other people?</a></li>
               <li><a href="#">How do I link to a file or folder?</a></li>
               <li><a href="#">How do I share a file or folder with others?</a></li>
               <li><a href="#">What's a file request and how do I create one?</a></li>
               <li><a href="#">How can I tell if a file or folder is shared or private?</a></li>
               <li><a href="#">Where is my Dropbox folder?</a></li>
               <li><a href="#">How do I get notified of changes in my Dropbox?</a></li>
               <li><a href="#">Do I need a Dropbox account to join a shared folder?</a></li>
               <li><a href="#">Different ways to share</a></li>
               <li><a href="#">Start sharing with Dropbox</a></li>
               <li><a href="#">Add files to your Dropbox</a></li>
               <li><a href="#">Can I share a folder that's in another shared folder?</a></li>
               <li><a href="#">How do I change the way dates are shown on the website?</a></li>
            </ol>
            <h4>Joining a shared folder</h4>
            <ol>
               <li><a href="#">Will joining someone else's shared folder use my quota?</a></li>
               <li><a href="#">How do I leave a shared folder?</a></li>
               <li><a href="#">How do I rejoin a shared folder?</a></li>
               <li><a href="#">How do I join a shared folder I've been invited to?</a></li>
               <li><a href="#">Do I need a Dropbox account to join a shared folder?</a></li>
               <li><a href="#">Who is the owner of a shared folder?</a></li>
            </ol>
            <h4>Recover and restore files</h4>
            <ol>
               <li><a href="#">How do I recover deleted files?</a></li>
               <li><a href="#">My files are missing. How do I get them back?</a></li>
               <li><a href="#">What is Extended Version History?</a></li>
               <li><a href="#">How do I select an event to recover deleted files from?</a></li>
               <li><a href="#">How do I recover previous versions of files?</a></li>
               <li><a href="#">How do I find a deleted or missing file in my Dropbox account?</a></li>
               <li><a href="#">Does Dropbox keep backups of my files?</a></li>
               <li><a href="#">What happens when I delete a file?</a></li>
            </ol>
            <h4>Syncing and uploads</h4>
            <ol>
               <li><a href="#">What if my hard drive can't fit the contents of my Dropbox folder? Can I select which files to sync?</a></li>
               <li><a href="#">How do I sync files between computers?</a></li>
               <li><a href="#">Why aren't certain files on one computer syncing to another?</a></li>
               <li><a href="#">How does syncing work?</a></li>
               <li><a href="#">How do I make Dropbox sync faster or control the bandwidth used?</a></li>
               <li><a href="#">What's a conflicted copy?</a></li>
               <li><a href="#">Can I have Dropbox sync files outside my Dropbox folder? </a></li>
               <li><a href="#">How much longer until Dropbox is finished uploading/syncing?</a></li>
               <li><a href="#">Does Dropbox always upload/download the entire file any time a change is made?</a></li>
               <li><a href="#">Will files I put in Dropbox be synced across other machines even if they're offline?</a></li>
               <li><a href="#">How does syncing work on my mobile device?</a></li></ol>
         </div>
      </div>
   </div>



</div>




   
@endsection