<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"></head>
<link rel="stylesheet" href="{{asset('css/portal.min.css')}}" />
<base href="/index.php"></base>
<script src="{{ asset('js/lib.portal.min.js') }}"></script>
	<title>Portal pendidikan</title>
</head>
<body>

<div id="section-1">

	<div class="ui grid container section-2">

		<div class="centered row" style="margin-top:190px;" data-uk-parallax="{y:'100'}">
			<span class="title kisi">Informasi pendidikan anak bangsa</span>
		</div>
		<div class="centered row my-icon" style="margin-top:65px;" data-uk-parallax="{y:'100'}" >
			<center><a class="button-scroll" href="#menu" data-uk-smooth-scroll>Getting Started</a></center>
		</div>
	</div>
</div>
<div id="menu" class="ui inverted menu" data-uk-smooth-scroll>
	<div class="ui container">
		<a href="#" class="item aktif">Home</a>
		<a href="#" class="item">Direktori Sekolah</a>
		<a href="#" class="item">E-Learning</a>
		<a href="#" class="item">Bank Soal</a>
		<a href="#" class="item">Klinik Pendidikan</a>
		<a href="#" class="item">Berita Pendidikan</a>
		<a href="#" class="item">Agenda Pendidikan</a>
		<a href="#" class="item">Klinik Pendidikan</a>
		<a href="#" class="item">Forum Pendidikan</a>
	</div>
</div>

<div id="section-2" >
	<div class="ui grid container" >
		<div class="centered row "  >
				<h1 class="title" data-uk-parallax="{y:'90'}" >Apa itu KisiKisi.id?</h1>
		</div>
		<div style="margin-top:80px;height:10px;width:100%"></div>
		<div class="row">
			<div class="eleven wide column text" data-uk-parallax="{x:'50'}" >
			KisiKisi.id merupakan website portal pendidikan terbesar di indonesia
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</div>
			<div class="five wide column" >
				<img src="{{asset('img/Geek maskot.png')}}" class="mascot-1"  data-uk-parallax="{x:'-150'}" />
			</div>
		</div>
	</div>
</div>

<div id="section-3">
	<div class="ui grid container">
		<div class="centered row ">
				<h1 class="title">Bagian dari KisiKisi.id</h1>
		</div>
		<div class="row">
			<ul class="uk-slideshow uk-overlay-active" data-uk-slideshow>
				<li>
					<img src="{{asset('img/photo1.png')}}" width="400" height="400" alt="">
					<div class="uk-overlay-panel uk-overlay-background uk-overlay-fade">...</div>
			 	</li>
			</ul>
		</div>
	</div>
</div>

<div id="footer">
	<div class="ui grid container">
		<div class="centered row ">
				<h1>Footer</h1>
		</div>
		<div class="row">

		</div>
	</div>
</div>

<script src="{{ asset('js/portal.min.js') }}"></script>
</body>
</html>