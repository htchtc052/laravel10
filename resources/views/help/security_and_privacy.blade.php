@extends('master_main')

@section('cont')
<div class="breadcrumbs"><a href="/">Home</a><a href="/help">Help</a></div>
<div class="row">
   <div class="col-xs-3">
      <ul class="list-unstyled help-menu">
         <li><a href="/help">Sharing files and folders</a></li>
         <li><a href="/help/payments_and_billing/">Payments and billing</a></li>
         <li><a class="active" href="/help/security_and_privacy/">Security and privacy</a></li>
         <li><a href="/help/syncing_and_uploads/">Syncing and uploads</a></li>
         <li><a href="/help/log_in_help/">Sign-in help</a></li>
         <li><a href="/help/manage_account/">Manage account</a></li>
         <li><a href="/help/space_and_storage/">Space and storage</a></li>
         <li><a href="/help/photos_and_videos/">Photos and videos</a></li>
        </ul>
   </div>
   <div class="col-xs-9">
      <h1 class="page-title">Security and privacy</h1>
      <div class="row">
         <div class="col-xs-6">
            <h4>Account security</h4>
            <ol>
                <li><a href="#">How do I enable two-step verification on my account?</a></li>
                <li><a href="#">What do I do if I lost my phone or can't sign in using two-step verification?</a></li>
                <li><a href="#">Why did my password expire?</a></li><li><a href="37">How do I change my password?</a></li>
                <li><a href="#">How do I delete the Dropbox folder from a lost or stolen device? </a></li>
                <li><a href="#">I think my account was compromised. What do I do?</a></li>
                <li><a href="#">I'm not prompted to enter my two-step verification code when I sign in—why not?</a></li>
            </ol>
            <h4>Manage file security</h4>
            <ol>
                <li><a href="#">How do I enable two-step verification on my account?</a></li>
                <li><a href="#">Can I share files with non-Dropbox users?</a></li>
                <li><a href="#">How secure is Dropbox?</a></li>
                <li><a href="#">How do I change my phone number for two-step verification?</a></li>
                <li><a href="#">How do I unshare links to photos?</a></li>
                <li><a href="#">How do I remove a link to a file or folder?</a></li>
                <li><a href="#">How does the Dropbox service work?</a></li>
                <li><a href="#">Where does Dropbox store my data?</a></li>
                <li><a href="#">How do I use remote wipe to delete the Dropbox folder from a member's lost or stolen device?</a></li>
                <li><a href="#">How do I keep others from inviting people to my shared folder?</a></li>
            </ol>
            <h4>Security tips</h4>
            <ol>
                <li><a href="#">How do I enable two-step verification on my account?</a></li>
                <li><a href="#">How do I choose a secure password for Dropbox?</a></li>
                <li><a href="#">What do I do if I lost my phone or can't sign in using two-step verification?</a></li>
                <li><a href="#">How can I protect my Dropbox account?</a></li>
                <li><a href="#">How do I change my phone number for two-step verification?</a></li>
                <li><a href="#">Two-step verification: An extra layer of security</a></li>
                <li><a href="#">What information can a third-party app access when I link it to my account?</a></li>
                <li><a href="#">My files were corrupted or renamed by ransomware. What can I do?</a></li>
            </ol>
            <h4>Manage multiple Dropbox accounts</h4>
            <ol>
                <li><a href="#">How do I sign in to a personal and work Dropbox on my devices?</a></li>
                <li><a href="#">Why did the name of my work Dropbox change? </a></li>
            </ol>
            <h4>Manage account security</h4>
            <ol>
                <li><a href="#">How do I delete my account?</a></li>
                <li><a href="#">How do I uninstall Dropbox?</a></li>
                <li><a href="#">How do I change my password?</a></li>
                <li><a href="#">My Dropbox has an X on it. What's wrong?</a></li>
                <li><a href="#">Can I rename or move a shared folder?</a></li>
                <li><a href="#">What information does Dropbox and Facebook exchange when I link my accounts?</a></li>
            </ol>
        </div>
        <div class="col-xs-6">
            <h4>Security threats and banned links</h4>
            <ol>
                <li><a href="#">I think my account was compromised. What do I do?</a></li>
                <li><a href="#">My files were corrupted or renamed by ransomware. What can I do?</a></li>
                <li><a href="#">Why were my shared links or file requests banned?</a></li>
                <li><a href="#">An unknown person shared a file with me. What should I do?</a></li>
                <li><a href="#">I got a notification that my password changed, but I didn't initiate this. How can I protect my account?</a></li>
                <li><a href="#">I got an email change notification, but I didn't change the email on my Dropbox account. What do I do?</a></li>
                <li><a href="#">I got an SMS code for two-step verification, but I wasn't trying to sign in. What do I do?</a></li>
                <li><a href="#">I'm a security researcher and have found a vulnerability with Dropbox. How do I report it?</a></li>
            </ol>
            <h4>Policy and compliance</h4>
            <ol>
                <li><a href="#">How does Dropbox use cookies and other similar technologies?</a></li>
                <li><a href="#">What is Dropbox's copyright policy?</a></li>
                <li><a href="#">Why does the Dropbox iOS app need my location data?</a></li>
                <li><a href="#">Where does Dropbox store my data?</a></li>
                <li><a href="#">Why does Dropbox require Mac Keychain access?</a></li>
                <li><a href="#">What domains does Dropbox use in an official capacity?</a></li>
                <li><a href="#">Which standards and regulations does Dropbox Business comply with?</a></li>
                <li><a href="#">Data transfers between Europe and the United States</a></li>
                <li><a href="#">Why does the Dropbox Android app request access to my contacts?</a></li>
                <li><a href="#">Why does the Dropbox iOS app need location data?</a></li>
            </ol>
            <h4>Frequently asked questions</h4>
            <ol>
                <li><a href="#">Does Dropbox use any open source software?</a></li>
                <li><a href="#">Can I specify my own private key for my Dropbox?</a></li>
                <li><a href="#">Do you offer WebDAV, Email Attachments, or FTP support?</a></li>
                <li><a href="#">Can I host Dropbox on my server?</a></li>
                <li><a href="#">What are .lnk files?</a></li>
                <li><a href="#">What happened to Votebox? </a></li>
                <li><a href="#">Can I access the Dropbox account of someone who has passed away?</a></li>
                <li><a href="#">Security Overview</a></li>
                <li><a href="#">When does Dropbox turn over information for a legal request?</a></li>
                <li><a href="#">Can I share a Dropbox account with someone else?</a></li>
            </ol>
        </div>
      </div>
   </div>



</div>




   
@endsection