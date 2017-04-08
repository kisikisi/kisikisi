<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="image_src" type="image/jpeg" href="img/logo/logo.png" />
    <link rel="shortcut icon" href="img/logo/logo.png">
    <link rel="stylesheet" href="{{ asset('css/portal.min.css') }}?<?= time(); ?>" />
    <title>Kisikisi.id - Portal pendidikan</title>
    <meta content="width=device-width, height=device-height, minimum-scale=1.0, initial-scale=1.0, user-scalable=0" name="viewport"/>
    <meta content="IE=Edge" http-equiv="X-UA-Compatible"/>
    <meta content="website" property="og:type"/>
    <meta content="607018229476252" property="fb:app_id"/>
    <meta content="Kisikisi.id - Portal pendidikan" property="og:title"/>
    <meta content="Kisikisi.id merupakan portal pendidikan terbesar di Indonesia yang menyajikan informasi terlengkap dan terupdate mengenai direktori pendidikan, agenda pendidikan, berita pendidikan dan informasi beasiswa. Dibangun oleh putra-putri bangsa untuk para pelaku pendidikan seperti guru, siswa dan orangtua untuk mempermudah akses informasi yang terkait pendidikan." property="og:description"/>
    <meta content="id_ID" property="og:locale"/>
    <meta content="http://kisikisi.id/" property="og:url"/>
    <meta content="Kisikisi.id - Portal pendidikan" property="og:site_name"/>
    <meta content="http://kisikisi.id/img/background/profile.png" property="og:image"/>
    <meta content="http://kisikisi.id/img/background/profile.png" property="og:image:url"/>
    <meta content="923539880721-sprpmk4rgmjq1ht75govalre7gl86bbm.apps.googleusercontent.com" name="google-signin-client_id"/>

    {{-- <base href="/index.php"></base> --}}
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '607018229476252',
      xfbml      : true,
      version    : 'v2.6'
    });
  };
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
</head>
<body>
<div class="pusher">
@include('portal.header')
@include('portal.main')
@include('portal.main2')
@include('portal.main3')
@include('portal.main4')
</div>
<div class="uk-hidden-large">
@include('portal.sidebar')
</div>

<!-- script js -->
<script src="{{ asset('js/lib.portal.min.js') }}"></script>
<script src="{{ asset('js/portal.min.js') }}"></script>
</body>
</html>