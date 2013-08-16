<!DOCTYPE html>
<html lang="en">
<?php
/* @var $this UsersController */
/* @var $dataProvider CActiveDataProvider */

//$this->layout = 'protected/views/layouts/main_bootstrap.php';
//$this->layout = 'main_bootstrap.php';

//$this->breadcrumbs=array(
//	'Voice',
//);
?>
<head>
<meta charset="utf-8">
<title>Voicemails - Your Voice, Our Support</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Your Voice, Our Support">
<meta name="author" content="Your Voice, Our Support">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<!-- Le styles -->
<link href="/assets/bootstrap/css/bootstrap.css" rel="stylesheet">
<style type="text/css">
/* body { */
/* 	padding-top: 20px; */
/* 	padding-bottom: 60px; */
/* } */

/* Custom container */
.container {
	margin: 0 auto;
	max-width: 1000px;
}

.container>hr {
	margin: 60px 0;
}

/* Main marketing message and sign up button */
.jumbotron {
	margin: 80px 0;
	text-align: center;
}

.jumbotron h1 {
	font-size: 100px;
	line-height: 1;
}

.jumbotron .lead {
	font-size: 24px;
	line-height: 1.25;
}

.jumbotron .btn {
	font-size: 21px;
	padding: 14px 24px;
}

/* Supporting marketing content */
.marketing {
	margin: 60px 0;
}

.marketing p+h4 {
	margin-top: 28px;
}

/* Customize the navbar links to be fill the entire space of the .navbar */
.navbar .navbar-inner {
	padding: 0;
}

.navbar .nav {
	margin: 0;
	display: table;
	width: 100%;
}

.navbar .nav li {
	display: table-cell;
	width: 1%;
	float: none;
}

.navbar .nav li a {
	font-weight: bold;
	text-align: center;
	border-left: 1px solid rgba(255, 255, 255, .75);
	border-right: 1px solid rgba(0, 0, 0, .1);
}

.navbar .nav li:first-child a {
	border-left: 0;
	border-radius: 3px 0 0 3px;
}

.navbar .nav li:last-child a {
	border-right: 0;
	border-radius: 0 3px 3px 0;
}

/* Sticky footer styles
      -------------------------------------------------- */
html,body {
	height: 100%;
	/* The html and body elements cannot have any padding or margin. */
}

/* Wrapper for page content to push down footer */
#wrap {
	min-height: 100%;
	height: auto !important;
	height: 100%;
	/* Negative indent footer by it's height */
	margin: 0 auto -60px;
}

/* Set the fixed height of the footer here */
#push,#footer {
	height: 60px;
}

#footer {
	background-color: #f5f5f5;
}

#divWorkspace {
	min-height: 100%;
	/* 	height: auto !important; */
	height: 100%;
}

#westPanel {
	min-height: 100%;
	/* 	height: auto !important; */
	height: 100%;
}

#divVoicemailsPanelDockLayout {
	min-height: 100%;
	/* 	height: auto !important; */
	height: 100%;
}

.div {
	border: 1px dotted;
}

#EditVoicemailTranscriptions {
/* 	min-height: 400px; */
/* 	height:100%; */
}

#divVoicemailRelatedStackPanel{
/* 	min-height: 400px; */
/* 	height: 100%; */
}

.Height400px{
	min-height: 450px;
	height: 100%;
}

.Border1{
	border: 1px solid black;
}

.Width100pc{
	width: 100%;
}

#divContainerVoicemailTranscriptions{
/* 	border: 1px dotted red; */
	height: 100%;
}

#divContainerVoicemailFollowUps{
 	border: 1px dotted red;
	height: 100%;
}


</style>
<link href="/assets/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements 
[if lt IE 9]>
      <script src="/assets/js/html5shiv.js"></script>
    <![endif]-->

 <!--Fav and touch icons--> 
<link rel="apple-touch-icon-precomposed" sizes="144x144"
	href="/assets/ico/apple-touch-icon-144-precomposed.png"></link>
<link rel="apple-touch-icon-precomposed" sizes="114x114"
	href="/assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72"
	href="/assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed"
	href="/assets/ico/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="/assets/ico/favicon.png">
</head>

<body>
	<noscript>
		<div
			style="width: 22em; position: absolute; left: 50%; margin-left: -11em; color: red; background-color: white; border: 1px solid red; padding: 4px; font-family: sans-serif">
			Your web browser must have JavaScript enabled in order for this
			application to display correctly.</div>
	</noscript>
	<div class="container" id="wrap">

		<div class="masthead">
			<h3 class="muted">Your Voice, Our Support</h3>
			<div class="navbar">
				<div class="navbar-inner">
					<div class="container">
						<ul class="nav">
							                 <!--<li class="active"><a href="#">Home</a></li>--> 
							<li><a href="#">Home</a></li>
							<li class="active"><a href="/voicemails2.html">Transcriptions</a></li>
							<li><a href="/voicemail_followups2.html">FollowUps</a></li>
							<li><a href="#">About</a></li>
							<li><a href="#">Contact</a></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /.navbar -->
		</div>
<!-- 		<hr> -->
		<div id="divWorkspace" class="row-fluid Height400px">
			<div id="divColWest" class="span4">
				<div id="divColWestHeader">
					<div id="divContainerVoicemailsListHeader"></div>
					<div id="divContainerRefreshVoicemailsButton"></div>
				</div>
				<div id="divContainerVoicemailsList"></div>
			</div>
			<!-- <div id="divContainerVoicemailTranscriptions" class="span8" style="min-height: 400px; height: 100%;"></div> -->
			<div id="divVoicemailRelated" class="span8 Height400px Width100pc"></div>
		</div>
		<div id="push"></div>
	</div>
	<!-- /container -->

	<div id="footer">
		<div class="container">
			<div id="divContainerStatusLabel"></div>
		</div>
	</div>

	<!-- Le javascript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
<!--	<script src="/assets/jQuery/jquery-2.0.3.min.js"></script>
	<script src="/assets/bootstrap/js/bootstrap.min.js"></script>-->
	<!--     <script src="/assets/js/bootstrap-transition.js"></script> -->
	<!--     <script src="/assets/js/bootstrap-alert.js"></script> -->
	<!--     <script src="/assets/js/bootstrap-modal.js"></script> -->
	<!--     <script src="/assets/js/bootstrap-dropdown.js"></script> -->
	<!--     <script src="/assets/js/bootstrap-scrollspy.js"></script> -->
	<!--     <script src="/assets/js/bootstrap-tab.js"></script> -->
	<!--     <script src="/assets/js/bootstrap-tooltip.js"></script> -->
	<!--     <script src="/assets/js/bootstrap-popover.js"></script> -->
	<!--     <script src="/assets/js/bootstrap-button.js"></script> -->
	<!--     <script src="/assets/js/bootstrap-collapse.js"></script> -->
	<!--     <script src="/assets/js/bootstrap-carousel.js"></script> -->
	<!--     <script src="/assets/js/bootstrap-typeahead.js"></script> -->


<!--	<script type="text/javascript" language="javascript"
		src="/module_voicemails/module_voicemails.nocache.js"></script>-->
</body>
</html>