<?
    // This represents the controller code, where we set default vars
    $base_slot_price = 325;
    $decay = 0.85;
?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="/css/styles.css" />
	<link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="/js/jquery/jquery.min.js"></script>
	<script src="/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
	<script src="/js/underscore/underscore-min.js" type="text/javascript"></script>
    <script src="/js/backbone/backbone-min.js" type="text/javascript"></script>
    <script src="/js/backbone/backbone-deep-model.js" type="text/javascript"></script>
	<title>Jobs</title>
</head>

<body style="padding: 30px 0;">
    <div id="app">
        <div class="container" id="jobs">
            <div class="row">
                <div class="col-md-12 padb-sm">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="pull-left">Location</h1>
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-2">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <hr>
                    <div class="form-group">
                        <label for="LocationInput">Location</label>
                        <input name="input" class="form-control" placeholder="City, State or Zipcode" type="text" id="LocationInput">
                        <input name="city" type="text" id="LocationCity" placeholder="city">
                        <input name="state" type="text" id="LocationState" placeholder="state">
                        <input name="postal_code" type="text" id="LocationPostalCode" placeholder="postal">
                        <input name="lat" type="text" id="LocationLat" placeholder="lat">
                        <input name="lng" type="text" id="LocationLng" placeholder="lng">
                    </div>
                </div>
            </div>
        </div><!-- end: jobs -->
    </div><!-- end: view -->
    <script src="/js/app/views/LocationView.js" type="text/javascript"></script>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
    <script type="text/javascript">
        new App.LocationView()
    </script>
</body>
</html>