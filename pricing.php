<?
    function getTier($slots, $freq) {
        $months = array(1 => 1,2 => 2,3 => 3,6 => 4,12 => 5);
        return $slots*$month[$freq];
    }
    
    $blasts = array(
        1 => 69,
        2 => 49,
        3 => 39
    );
    
    $jobs = array(
        0 => array('Job' => array('title' => 'Ophthalmic Technician', 'city' => 'Raleigh', 'state' => 'NC', 'views' => 272, 'candidates' => 23, 'active' => 1)),
        1 => array('Job' => array('title' => 'Optometrist', 'city' => 'Newport', 'state' => 'VA', 'views' => 231, 'candidates' => 12, 'active' => 0)),
        2 => array('Job' => array('title' => 'Optometrist', 'city' => 'Houston', 'state' => 'TX', 'views' => 321, 'candidates' => 7, 'active' => 1)),
        3 => array('Job' => array('title' => 'Optician', 'city' => 'Austin', 'state' => 'TX', 'views' => 125, 'candidates' => 2, 'active' => 1)),
        4 => array('Job' => array('title' => 'Optometrist', 'city' => 'Austin', 'state' => 'TX', 'views' => 345, 'candidates' => 25, 'active' => 0)),
        5 => array('Job' => array('title' => 'Office Manager', 'city' => 'Charleston', 'state' => 'NC', 'views' => 257, 'candidates' => 23, 'active' => 0))
    );
?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="/css/styles.css" />
	<link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span data-current>1</span> <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                <li><a class="option-btn" href="#">1</a></li>
                                <li><a class="option-btn" href="#">2</a></li>
                                <li><a class="option-btn" href="#">3</a></li>
                              </ul>
                            </div> 
                            slots and 
                            <!-- C2H button -->
                            <div class="btn-group" data-field="blasts">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span data-current>1</span> <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                <li><a class="option-btn" href="#">0</a></li>
                                <li><a class="option-btn" href="#">1</a></li>
                                <li><a class="option-btn" href="#">2</a></li>
                              </ul>
                            </div> 
                            <span id="c2h">Connect2Hires</span><br>for 
                            <!-- Months button -->
                            <div class="btn-group" data-field="frequency">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span data-current>1</span> <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                <li><a class="option-btn" href="#">1</a></li>
                                <li><a class="option-btn" href="#">2</a></li>
                                <li><a class="option-btn" href="#">3</a></li>
                                <li><a class="option-btn" href="#">6</a></li>
                                <li><a class="option-btn" href="#">12</a></li>
                              </ul>
                            </div> 
                            months at a time.
                        </div>
                        <div id="summary" class="row">
                            <div class="padv-sm tcenter">
                            <div class="inline t-mega" id="price"></div>
                            <button class="inline btn primary" id="enroll">ENROLL</button>
                            <div class="uppr t-base mart-xs">
                                <div class="inline" id="price-slot"><span></span> per slot / </div>
                                <div class="inline" id="price-c2h"><span></span> per Connect2Hire </div>
                                each billing period
                            </div>
                        </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div><!-- end: jobs -->
    </div><!-- end: view -->
    
    <script src="/js/app/models/Job.js" type="text/javascript"></script>
    <script src="/js/app/collections/Jobs.js" type="text/javascript"></script>
    <script src="/js/app/views/JobView.js" type="text/javascript"></script>
    <script src="/js/app/views/JobListView.js" type="text/javascript"></script>
    <script src="/js/app/views/PlanSelectorView.js" type="text/javascript"></script>
    <script src="/js/app/App.js" type="text/javascript"></script>
    <script type="text/javascript">
        
    </script>
</body>
</html>