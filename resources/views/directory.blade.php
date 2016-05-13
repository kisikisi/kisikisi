<!DOCTYPE html>
<html lang="en" ng-app="kisiDirApp">
<head>
    <meta charset="UTF-8">
    <title>Direktori Sekolah</title>
    <link rel="stylesheet" href="{{ asset('css/directory.min.css') }}">
    <base href="/index.php"></base>
    <script src="{{ asset('js/lib.directory.min.js') }}"></script>
    <script src="{{ asset('js/directory.min.js') }}"></script>
</head>
<body ng-controller="dirCtrl">
    <?php include(public_path('views/directory/navbar.html')) ?> <!-- main navbar -->
    
    <div class="ui container">
        <div class="ui grid">
         <div class="twelve wide column">
             
            <?php include(public_path('views/directory/sidebar.html')) ?> <!-- main navbar -->
            
            <div ui-view></div>

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
