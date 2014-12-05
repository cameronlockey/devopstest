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
                            <h1 class="pull-left">Pricing</h1>
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
                    <div class="padt-xl tcenter plan-selector">
                        <div class="row">
                            I need 
                            <!-- Slots button -->
                            <div class="btn-group" data-field="slots">
                              <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                <span data-current>1 slot</span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                <li><a class="option-btn" href="#" data-value="1">1 slot</a></li>
                                <li><a class="option-btn" href="#" data-value="2">2 slots</a></li>
                                <li><a class="option-btn" href="#" data-value="3">3 slots</a></li>
                              </ul>
                            </div> 
                            and 
                            <!-- C2H button -->
                            <div class="btn-group" data-field="blasts">
                              <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                <span data-current>1 Connect2Hire</span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                <li><a class="option-btn" href="#" data-value="0">0 Connect2Hires</a></li>
                                <li><a class="option-btn" href="#" data-value="1">1 Connect2Hire</a></li>
                                <li><a class="option-btn" href="#" data-value="2">2 Connect2Hires</a></li>
                              </ul>
                            </div><br>for 
                            <!-- Months button -->
                            <div class="btn-group" data-field="frequency">
                              <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                <span data-current>1 month</span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                <li><a class="option-btn" href="#" data-value="1">1 month</a></li>
                                <li><a class="option-btn" href="#" data-value="2">2 months</a></li>
                                <li><a class="option-btn" href="#" data-value="3">3 months</a></li>
                                <li><a class="option-btn" href="#" data-value="6">6 months</a></li>
                                <li><a class="option-btn" href="#" data-value="12">12 months</a></li>
                              </ul>
                            </div>
                            at a time.
                        </div>
                        <div id="summary" class="row">
                            <div class="padv-sm tcenter">
                            <div class="inline t-mega" id="price"></div>
                            <button class="inline btn primary" id="enroll">ENROLL</button>
                            <div class="uppr t-base mart-xs t-primary strong">
                                <div class="inline" id="price-slot"><span></span> per slot </div>
                                <div class="inline" id="price-c2h"> / <span></span> per Connect2Hire </div>
                                <div class="inline" id="month-summary">each <span></span> billing period</div>
                            </div>
                        </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div><!-- end: jobs -->
    </div><!-- end: view -->
    <script src="/js/app/views/PlanSelectorView.js" type="text/javascript"></script>
    <script type="text/javascript">
        new App.PlanSelectorView({base_slot_price: <?= $base_slot_price; ?>, decay: <?= $decay; ?>})
    </script>
</body>
</html>