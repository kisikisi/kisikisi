<!DOCTYPE html>
<html lang="en" ng-app="kisiDirApp">
<head>
    <meta charset="UTF-8">
    <title>Direktori Sekolah</title>
    <link rel="shortcut icon" href="{{ env('APP_URL') }}/img/logo/logo.png">
    <link rel="stylesheet" href="{{ env('APP_URL') }}/css/kisikisi.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
  	<base href="/index.php"></base>
    <script src="{{ env('APP_URL') }}/js/kisikisi.min.js"></script>
    <script src="{{ env('APP_URL') }}/js/directory.min.js"></script>
</head>
<body ng-controller="dirCtrl">
<div class="ui visible inverted left vertical sidebar menu">
  <a class="item">
    <i class="home icon"></i>
    Home
  </a>
  <a class="item">
    <i class="block layout icon"></i>
    Topics
  </a>
  <a class="item">
    <i class="smile icon"></i>
    Friends
  </a>
  <a class="item">
    <i class="calendar icon"></i>
    History
  </a>
</div>
<div class="pusher">
  <?php include(public_path('views/directory/navbar.html')) ?> <!-- main navbar -->
  <div class="ui container">
      <div class="uk-grid">
       <div class="uk-width-large-3-4 uk-width-medium-1-1">
          <div id="content" ui-view></div>
       </div>
       <div class="uk-width-large-1-4 uk-hidden-medium">
          <?php include(public_path('views/directory/sidebar.html')) ?> <!-- main sidebar -->
       </div>
      </div>
  </div>
</div>
<div class="ui modal">
  <i class="close icon"></i>
  <ng-include src="modalTemplate">
  </ng-include>
</div>
</body>
</html>
