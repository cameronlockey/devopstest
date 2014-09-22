<?
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
	<title>Jobs</title>
</head>

<body style="padding: 30px 0;">
    <div id="app">
        <div class="container" id="jobs">
            <div class="row">
                <div class="col-md-12 padb-sm">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="pull-left">Your Ads</h1>
                        </div>
                        <div class="col-md-4">
                            <input id="search" type="text" class="form-control pull-right" placeholder="Job Title, City, State">
                        </div>
                        <div class="col-md-2">
                            <div id="filter" class="pull-right">
                                <div class="btn-group">
                                    <button class="filter-btn btn btn-default btn-small active" data-status="1" title="Active">Active</button>
                                    <button class="filter-btn btn btn-default btn-small" data-status="0" title="Inactive">Inactive</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <hr>
                    <div id="jobs-container"></div>
                    <script id="jobTemplate" type="text/template">
                        <h3 class="t-xl pull-left padt-xs"><%= Job.title %><span class="block t-gray t-md"><%= Job.city %>, <%= Job.state %></span></h3>
                        <ul class="pull-right list-unstyled list-inline">
                        	<li class="t-mega tcenter"><%= Job.views %><span class="block t-xs">VIEWS</span></li>
                        	<li class="t-mega tcenter"><%= Job.candidates %><span class="block t-xs">CANDIDATES</span></li>
                        	<li class="t-xs tcenter"><a href="/c2h.html" title="Send C2H">SEND C2H</a></li>
                        </ul>
                    </script>
                </div>
            </div>
        </div><!-- end: jobs -->
    </div><!-- end: view -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/js/underscore/underscore-min.js" type="text/javascript"></script>
    <script src="/js/backbone/backbone-min.js" type="text/javascript"></script>
    <script src="/js/backbone/backbone-deep-model.js" type="text/javascript"></script>
    <script src="/js/app/models/Job.js" type="text/javascript"></script>
    <script src="/js/app/collections/Jobs.js" type="text/javascript"></script>
    <script src="/js/app/views/JobView.js" type="text/javascript"></script>
    <script src="/js/app/views/JobListView.js" type="text/javascript"></script>
    <script src="/js/app/App.js" type="text/javascript"></script>
    <script type="text/javascript">
        // Set an object full of demo jobs to use in the app
        var jobs = <?= json_encode($jobs); ?>;
        
        // Initialize App.Jobs with data
        App.Jobs.set(jobs);
    </script>
</body>
</html>