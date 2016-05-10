<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"></head>
<link rel="stylesheet" href="{{asset('css/portal.min.css')}}" />
<base href="/index.php"></base>
<script src="{{ asset('js/lib.portal.min.js') }}"></script>
<script src="{{ asset('js/portal.min.js') }}"></script>
	<title>Portal pendidikan</title>
</head>
<body>

<div id="section-1">

	<div class="ui grid container section-2">

		<div class="centered row" style="margin-top:190px;" data-uk-parallax="{y:'100'}">
			<span class="title kisi">Informasi pendidikan anak bangsa</span>
		</div>
		<div class="centered row my-icon" style="margin-top:65px;" data-uk-parallax="{y:'100'}" >
			<center><a class="button-scroll" href="#menu" data-uk-smooth-scroll>Memulai KisiKisi</a></center>
		</div>
	</div>
</div>
<div id="menu" class="ui inverted menu" data-uk-smooth-scroll>
	<div class="ui container">
		<img src="{{asset('img/logo.png')}}" width="40" height="40" class="logo" />
		<a href="#" class="item aktif">Home</a>
		<a href="#" class="item">Direktori Sekolah</a>
		<a href="#" class="item">E-Learning</a>
		<a href="#" class="item">Bank Soal</a>
		<a href="#" class="item">Klinik Pendidikan</a>
		<a href="#" class="item">Berita Pendidikan</a>
		<a href="#" class="item">Agenda Pendidikan</a>
		<a href="#" class="item">Artikel Pendidikan</a>
		<a href="#" class="item">Forum</a>
		<a href="#" class="item">Beasiswa</a>
	</div>
</div>

<div id="section-2" >
	<div class="ui grid container" >
		<div class="centered row "  >
				<h1 class="title" data-uk-parallax="{y:'120'}" >Apa itu KisiKisi.id?</h1>
		</div>
		<div style="margin-top:80px;height:10px;width:100%"></div>
		<div class="row">
			<div class="eleven wide column text" data-uk-parallax="{x:'-300',y:'-50',target:'#section-2'}" >
				<img src="{{asset('img/chat_baloon.svg')}}" class="chat" />
				<div class="texting"><b>Kisikisi.id</b> merupakan portal pendidikan terbesar di Indonesia yang menyajikan
				informasi terlengkap dan terupdate mengenai direktori pendidikan, agenda pendidikan, berita
				pendidikan dan informasi beasiswa. Dibangun oleh putra-putri bangsa untuk para pelaku pendidikan seperti
				guru, siswa dan orangtua untuk mempermudah akses informasi yang terkait pendidikan.
				</div>
			</div>
			<div class="five wide column" >
				<img src="{{asset('img/Geek maskot.png')}}" class="mascot-1"  data-uk-parallax="{x:'-150',y:'-50'}" />
			</div>
		</div>

		<div class="row icon-master">
			<div class="twelve wide column">
				<img src="{{asset('img/icon/directory.png')}}" class="icon" />
				<img src="{{asset('img/icon/elearning.png')}}" class="icon" />
				<img src="{{asset('img/icon/banksoal.png')}}" class="icon" />
				<img src="{{asset('img/icon/clinic.png')}}" class="icon" />
				<img src="{{asset('img/icon/news.png')}}" class="icon" />
				<img src="{{asset('img/icon/agenda.png')}}" class="icon" />
				<img src="{{asset('img/icon/article.png')}}" class="icon" />
				<img src="{{asset('img/icon/forum.png')}}" class="icon" />
				<img src="{{asset('img/icon/beasiswa.png')}}" class="icon" />
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
			<div class="uk-slidenav-position" data-uk-slideshow="">
				<ul class="uk-slideshow uk-text-center" style="height:232px;">
					<li style="animation-duration: 500ms; height: 232px;" class="" aria-hidden="true">
						 lorem
                     </li>

					<li>aa</li>
					<li>aa</li>
				</ul>
				<ul>
					
				</ul>
				<a href="" class="uk-slidenav uk-slidenav-next" data-uk-slideshow-item="next"></a>
				<a href="" class="uk-slidenav uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
				
			</div>

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


</body>
</html>