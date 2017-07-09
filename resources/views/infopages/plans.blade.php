@extends('master_main')
@section('cont')

<div class="breadcrumbs"><a href="/">Home</a></div>
        <h1>Plans</h1>
        <hr class="featurette-divider" />
        <div class="chosen-box">
        <h2 class="text-center">Chose your plan</h2>
            <div class="row text-center">
                <div class="col-xs-4 indent-lg">
                    <h3>Free</h3>
                    <img src="style/free.svg" />
                    <ul class="indent list-unstyled">
                        <li>1 GB of space</li>
                        <li>Unlimited upload file size</li>
                        <li>Download file size to 100 MB</li>
                        <li>Simple file sharing</li>
                    </ul>
                    <p><a class="btn btn-default outline" href="#" role="button">Get started</a></p>
                </div>
                <div class="col-xs-4 indent-lg">
                    <h3>Pro Silver</h3>
                    <img src="style/silver.svg" />
                    <ul class="indent list-unstyled">
                        <li>1 TB (1,000 GB) of space</li>
                        <li>Unlimited upload file size</li>
                        <li>Download file size to 1 GB</li>
                        <li>Folder and file sharing</li>
                    </ul>
                    <p><a class="btn btn-default outline planorder" href="#" role="button" id="silvermonth">$9.99/month</a>&nbsp;&nbsp;or&nbsp;&nbsp;<a class="btn btn-default outline planorder" href="#" role="button"  id="silveryear">$99/year</a></p>
                </div>
                <div class="col-xs-4 indent-lg">
                    <h3>Pro Gold</h3>
                    <img src="style/gold.svg" />
                    <ul class="indent list-unstyled">
                        <li>1 TB (1,000 GB) of space</li>
                        <li>Unlimited upload file size</li>
                        <li>Unlimited download file size</li>
                        <li>Folder and file sharing</li>
                    </ul>
                    <p><a class="btn btn-default outline planorder" href="#" role="button" id="goldmonth">$19.99/month</a>&nbsp;&nbsp;or&nbsp;&nbsp;<a class="btn btn-default outline planorder" href="#" role="button" id="goldyear">$199/year</a></p>
                </div>
				<div id="roboform" style="display:none;"></div>
            </div>
        </div>	 
		
   
@endsection