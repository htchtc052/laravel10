@extends('master_main')

@section('cont')
<div class="breadcrumbs"><a href="/">Home</a></div>
<h1>Security</h1>
<h2>Your stuff is safe with NoFiles</h2>
<p>
At NoFiles, the security of your data is our highest priority. Trust us to safeguard your stuff with multiple layers of security and we'll give you tools to help protect your account.
</p>
<hr class="featurette-divider">
<div class="row">
   <div class="col-xs-4">
      <h4>What does NoFiles do to<br>protect my stuff?</h4>
      <p>We store your file data using 256-bit AES encryption and use an SSL/TLS secure tunnel to transfer files between you and us. You can securely access files and folders at any time from our desktop, web and mobile applications, or through third-party apps connected to your account.<br><a href="#protect-one">Learn more below</a></p>
   </div>
   <div class="col-xs-4">
      <h4>How does NoFiles protect<br>my privacy?</h4>
      <p>Guarding our users' privacy is something we take very seriously. We work hard to protect your information from unauthorised access and have designed policies and controls to safeguard the collection, use and disclosure of your information.<br><a href="#protect-two">Learn more below</a></p>
   </div>
   <div class="col-xs-4">
      <h4>What can I do to protect<br>my account?</h4>
      <p>Use a strong password that you don't use for any other service and enable two-step verification to add an extra layer of protection. Monitor and control your account by reviewing your account activity and keeping your security settings updated.<br><a href="#protect">Learn more below</a></p>
   </div>
</div>
<div class="indent-lg" id="protect-one"> </div>
<hr  class="featurette-divider">
<h2>What does NoFiles do to protect my stuff?</h2>
<h4>Protect files in transit and at rest</h4>
<p class="indent-lg">To protect file data in transit, NoFiles uses SSL/TLS for file transfer, creating a secure tunnel protected by 128-bit or higher AES encryption. NoFiles file data is stored in discrete file blocks that are fragmented and encrypted using 256-bit AES. Not all mobile media players support encrypted streaming, so media files streamed from our servers aren't always encrypted. Additionally, we support perfect forward secrecy, flag all authentication cookies as secure, and enable HSTS.</p>
<h4>Deletion recovery and version history</h4>
<p class="indent-lg">By default, NoFiles saves a history of all deleted and previous versions of files, and allows you to restore them for up to 30 days. Unlimited recovery is available as an add-on for NoFiles Basic and Pro accounts.</p> 
<h4>Application security testing</h4>
<p class="indent-lg">Our security team performs automated and manual application security testing on a regular basis to identify and patch potential security vulnerabilities and bugs on our desktop, web and mobile applications. We also work with third-party security specialists, as well as other industry security teams and the security research community, to keep our applications safe and secure. Potential security bugs and vulnerabilities can be reported to us on the third-party service HackerOne.</p>
<h4>Third-party apps</h4>
<p class="indent-lg">A number of guidelines and practices have been established to help third-party developers create apps that connect to NoFiles while respecting and protecting user privacy and account security. We require unique keys for each distinct app that a developer writes, and can revoke an app key if API Terms and Conditions or Developer Branding Guidelines are not followed. In addition, we use OAuth, an industry-standard protocol for authorisation, to allow users to grant apps different levels of account access without exposing their account credentials.</p>
<div class="indent-lg" id="protect-two"> </div>
<hr class="featurette-divider">
<h2>How does NoFiles protect my privacy?</h2>
<h4>Privacy Policy</h4>
<p class="indent-lg">We've created a Privacy Policy to describe how we collect, use and handle your information when you use our websites, software and service. For details, see <a href="/privacy">www.nofiles.com/privacy</a>.</p>
<h4>Government request principles</h4>
<p>Stewardship of your data is critical to us and a responsibility that we embrace. We believe that our users' data should receive the same legal protections regardless of whether it's stored on our services or on their home computer's hard drive. We'll abide by the following principles when receiving, scrutinising and responding to government requests for our users' data:</p>
<ul>
   <li>Be transparent</li>
   <li>Fight blanket requests</li>
   <li>Protect all users and</li>
   <li>Provide trusted services</li>
</ul>
<p>Please visit our <a href="/principles">Government Request Principles</a>.</p>
<div class="indent-lg" id="protect"> </div>
<hr  class="featurette-divider">
<h2>What can I do to protect my account?</h2>
<p class="indent-lg">As a user, NoFiles gives you a number of security tools to protect your account and data. The following authentication, activity and other security features are available to you:</p>
<h4>Choose a strong, unique password</h4>
<p class="indent-lg">By creating a unique password - and guarding it closely - you'll help keep your NoFiles account safe. We've created <a href="/signup">a password strength estimator</a> to help you test your password.</p>
<h4>Enable two-step verification</h4>
<p class="indent-lg">This optional - but highly recommended - security feature adds an extra layer of protection to your account. Once two-step verification has been enabled, NoFiles will require your password and a six-digit security code sent via text message or a separate authentication app when signing in or linking a new device.</p>
<h4>Adjust security settings</h4>
<p class="indent-lg">On the <a href="#">Security page</a>, you can easily monitor linked devices, active web sessions and third-party apps with access to your account. Something doesn't look right? You can cut off access to any with one click.</p>
<h4>Monitor account activity</h4>
<p class="indent-lg">On the <a href="#">Events page</a>, up-to-date account activity information is available for shared folders and active sharing links, as is a running log of individual file and folder edits, additions and deletions. On the <a href="/profile">Profile page</a>, you can also opt in to receive notifications whenever a new device or app is linked to your account.</p>

@endsection