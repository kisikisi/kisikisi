<!DOCTYPE html>
<html lang="en" ng-app="kisiNewsApp">
<head>
    <meta charset="UTF-8">
    <title>Kisikisi.id - Berita Pendidikan</title>
    <link rel="shortcut icon" href="{{ env('APP_URL') }}/img/logo/logo.png">
    <link rel="stylesheet" href="{{ env('APP_URL') }}/css/kisikisi.min.css" media="screen">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
  	<base href="/index.php"></base>
</head>
<body ng-controller="newsCtrl">
	<?php include(public_path('views/partial/sidebar.html')) ?> <!-- main sidebar -->
	<div class="pusher">
		<div data-uk-sticky>
			<div id="mainNav" class="ui icon secondary inverted attached menu">
			  <?php include(public_path('views/partial/navbar.html')) ?> <!-- main navbar -->
			</div>
			<div id="searchBar" class="ui attached segment" ng-show="onSearch"  ng-include="'views/news/filter.form.html'"></div>
		</div>

	  <div class="ui container" data-uk-observe>
		  <div class="uk-grid">
		   <div class="uk-width-large-3-4 uk-width-medium-1-1">
			  <div id="content" ui-view></div>
		   </div>
		   <div class="uk-width-large-1-4 uk-hidden-medium">
			  <?php include(public_path('views/news/sidebar.html')) ?> <!-- content sidebar -->
		   </div>
		  </div>
	  </div>
	</div>
	<div id="siteModal" class="ui segments modal" ng-include="'views/news/news.detail.html'">
	</div>
	<div id="basicModal" class="ui small basic center aligned modal" ng-include="'views/partial/login.html'">
	</div>

	<script src="{{ env('APP_URL') }}/js/kisikisi.min.js"></script>
    <script src="{{ env('APP_URL') }}/js/news.min.js"></script>
</body>
</html>
