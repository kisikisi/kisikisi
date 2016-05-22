<!DOCTYPE html>
<html lang="en" ng-app="kisiDirApp">
<head>
    <meta charset="UTF-8">
    <title>Kisikisi.id - Direktori Sekolah</title>
    <link rel="shortcut icon" href="{{ env('APP_URL') }}/img/logo/logo.png">
    <link rel="stylesheet" href="{{ env('APP_URL') }}/css/kisikisi.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
  	<base href="/index.php"></base>
    <script src="{{ env('APP_URL') }}/js/kisikisi.min.js"></script>
    <script src="{{ env('APP_URL') }}/js/directory.min.js"></script>
</head>
<body ng-controller="dirCtrl">
	<?php include(public_path('views/partial/sidebar.html')) ?> <!-- main sidebar -->
	<div class="pusher">
		<div id="mainNav" data-uk-sticky class="ui icon blue inverted secondary pointing menu">
		  <?php include(public_path('views/partial/navbar.html')) ?> <!-- main navbar -->
		</div>
		<div class="ui attached segment"  data-uk-sticky ng-if="onSearch"  ng-include="'views/directory/filter.form.html'"></div>

	  <div class="ui container" data-uk-observe>
		  <div class="uk-grid">
		   <div class="uk-width-large-3-4 uk-width-medium-1-1">
			  <div id="content" ui-view></div>
		   </div>
		   <div class="uk-width-large-1-4 uk-hidden-medium">
			  <?php include(public_path('views/directory/sidebar.html')) ?> <!-- content sidebar -->
		   </div>
		  </div>
	  </div>
	</div>
	<div id="siteModal" class="ui segments modal" ng-include="'views/directory/school.detail.html'">
	</div>
	<div id="basicModal" class="ui small basic center aligned modal" ng-include="'views/partial/login.html'">
	</div>
</body>
</html>
