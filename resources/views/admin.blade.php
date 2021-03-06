<!DOCTYPE html>
<html ng-app="kisiApp">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kisikisi.id</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <base href="/index.php"></base>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.min.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body class="hold-transition skin-blue sidebar-mini login-page" ng-controller="kisiCtrl">
  <div class="wrapper" ng-if="isAuthenticated()">

    <!-- main header -->
    <?php include(public_path('views/admin/header.html')) ?>
    
    <!-- Left side column. contains the logo and sidebar -->
    <!-- main sidebar -->
    <?php include(public_path('views/admin/sidebar.main.html')) ?>
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" ui-view>
      
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
    </footer>
    
    <!-- Control Sidebar -->
    <?php //include(public_path('views/admin/sidebar.control.html')) ?>
    <!-- /.control-sidebar -->

    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- login page  -->
  <div ui-view ng-if="!isAuthenticated()">
      
  </div>
  <?php //include(public_path('views/admin/login.html')) ?>

  <script type="text/javascript" src="{{ asset('js/lib.admin.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script type="text/javascript" src="{{ asset('js/admin.min.js') }}"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
</body>
</html>
