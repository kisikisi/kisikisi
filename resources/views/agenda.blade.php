<!DOCTYPE html>
<html lang="en" ng-app="kisiApp">
<head>
    <meta charset="UTF-8">
    <title>Kisikisi.id - Agenda Pendidikan</title>
    <link rel="shortcut icon" href="{{ env('APP_URL') }}/img/logo/logo.png">
    <link rel="stylesheet" href="{{ env('APP_URL') }}/css/kisikisi.min.css" media="screen">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
  	<meta property="fb:app_id" content="607018229476252" />
  	<base href="/index.php"></base>
  	<style>
  	#mainNav{background: #763DB2 !important;}
  	.ui.horizontal.divider.header{color:#763DB2 !important;}
  	.ui.violet.bg-base.fluid.button{background:#763DB2 !important;}
  	</style>
</head>
<body ng-controller="agendaCtrl">
	<div class="uk-hidden-large">
	<?php include(public_path('views/partial/sidebar.html')) ?> <!-- main sidebar -->
	</div>
	<div class="pusher">
		<div data-uk-sticky>
			<div id="mainNav" class="ui icon secondary inverted attached menu">
			  <?php include(public_path('views/partial/navbar.html')) ?> <!-- main navbar -->
			</div>
			<div id="searchBar" class="ui attached segment" ng-show="onSearch"  ng-include="'views/agenda/filter.form.html'"></div>
		</div>
		<img src="{{ env('APP_URL') }}/img/header/agenda.jpg" class="ui image" />
	  <div class="ui container uk-margin-large-bottom" data-uk-observe>
		  <div class="uk-grid">
		   <div class="uk-width-large-3-4 uk-width-medium-1-1">
			  <div id="content" ui-view></div>
		   </div>
		   <div class="uk-width-large-1-4 uk-hidden-medium uk-margin-large-top">
			  <?php include(public_path('views/agenda/sidebar.html')) ?> <!-- content sidebar -->
		   </div>
		  </div>
	  </div>
	  <?php include(public_path('views/partial/footer.html')) ?>
	</div>
	<div id="siteModal" class="ui segments modal" ng-include="'views/agenda/agenda.detail.html'">
	</div>
	<div id="basicModal" class="ui small basic center aligned modal">
		 <ng-include src="smallModal"></ng-include>
	</div>

	<script src="{{ env('APP_URL') }}/js/kisikisi.min.js"></script>
    <script src="{{ env('APP_URL') }}/js/agenda.min.js"></script>

</body>
</html>
