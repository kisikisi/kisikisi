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
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=1496399374007633";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    
    <?php include(public_path('views/directory/navbar.html')) ?> <!-- main navbar -->
    
    <div class="ui container">
        <div class="ui grid">
         <div class="twelve wide column">
             
            <?php include(public_path('views/directory/sidebar.html')) ?> <!-- main navbar -->
            
            <div ui-view></div>
            
            <div id="content" class="ui three cards" ng-include="'views/directory/school.list.html'">

            </div>
         </div>
        </div>        
    </div>
<!--    <div class="ui container">
        
    </div>-->
    <script>
        $('.ui.sticky').sticky();
        $('.menu .item').tab();
        $('.ui.rating').rating();
    </script>
</body>
</html>