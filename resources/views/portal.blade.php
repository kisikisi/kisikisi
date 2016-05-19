<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="image_src" type="image/jpeg" href="img/logo/logo.png" />
    <link rel="shortcut icon" href="img/logo/logo.png">
    <link rel="stylesheet" href="{{asset('css/portal.min.css')}}" />
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
    <meta content="http://kisikisi.id/img/background/background_portal.jpg" property="og:image"/>
    <meta content="http://kisikisi.id/img/background/background_portal.jpg" property="og:image:url"/>
    <meta content="923539880721-sprpmk4rgmjq1ht75govalre7gl86bbm.apps.googleusercontent.com" name="google-signin-client_id"/>

    <base href="/index.php"></base>
    <script src="{{ asset('js/lib.portal.min.js') }}"></script>
    <script src="{{ asset('js/portal.min.js') }}"></script>
</head>
<body>
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

<div class="mask all"></div>
<div id="section-1">

	<div class="ui grid container section-2">

		<div class="centered row" style="" data-uk-parallax="{y:'50'}" data-uk-scrollspy="{cls:'uk-animation-fade',delay:150,repeat:true}">
			<span id="landing-title" class="title kisi">Informasi Pendidikan Anak Bangsa</span>
		</div>
		<div class="centered row my-icon" style="" data-uk-parallax="{y:'100'}" data-uk-scrollspy="{cls:'uk-animation-fade',delay:300,repeat:true}" >
			
			<center><a class="button-scroll" href="#section-2" data-uk-smooth-scroll>Memulai KisiKisi</a></center>
		</div>
	</div>
</div>

{{-- <div id="menu-test" class="ui left fixed vertical menu">
	<span class="item menu-button" style="color:#fafafa;">MENU</span>
	<a href="dir.kisikisi.id"><div class="object">
		<img src="{{asset('img/icon/directory.png')}}" class="item" />
		<div class="object-content">Direktori Sekolah</div>
	</div></a>
	<a href="learn.kisikisi.id"><div class="object">
		<img src="{{asset('img/icon/elearning.png')}}" class="item" />
		<div class="object-content">E-Learning</div>
	</div></a>
	<a href="#"><div class="object">
		<img src="{{asset('img/icon/banksoal.png')}}" class="item" />
		<div class="object-content">Bank Soal</div>
	</div></a>
	<a href="#"><div class="object">
		<img src="{{asset('img/icon/clinic.png')}}" class="item" />
		<div class="object-content">Klinik Pendidikan</div>
	</div></a>
	<a href="#"><div class="object">
		<img src="{{asset('img/icon/news.png')}}" class="item" />
		<div class="object-content">Berita Pendidikan</div>
	</div></a>
	<a href="#"><div class="object">
		<img src="{{asset('img/icon/agenda.png')}}" class="item" />
		<div class="object-content">Agenda Pendidikan</div>
	</div></a>
	<a href="#"><div class="object">
		<img src="{{asset('img/icon/article.png')}}" class="item" />
		<div class="object-content">Artikel Pendidikan</div>
	</div></a>
	<a href="#"><div class="object">
		<img src="{{asset('img/icon/forum.png')}}" class="item" />
		<div class="object-content">Forum</div>
	</div>
	<a href="#"><div class="object">
		<img src="{{asset('img/icon/beasiswa.png')}}" class="item" />
		<div class="object-content">Beasiswa</div>
	</div></a>

</div> --}}

<div id="section-2" data-uk-smooth-scroll >
	{{-- <div class="masked masked-1"></div>
	<div class="masked masked-2"></div> --}}
	<div class="ui grid container" >
		<div class="row" >
			<div class="sixteen wide mobile twelve wide tablet twelve wide computer column text" >
				<div class="flex center" >
					<h1 class="title" >Apa itu Kisikisi.id?</h1>
				</div>
				<div class="texting"> <p><b>Kisikisi.id </b>merupakan portal pendidikan terbesar di Indonesia yang menyajikan
				informasi terlengkap dan terupdate mengenai direktori pendidikan, agenda pendidikan, berita
				pendidikan dan informasi beasiswa. Dibangun oleh putra-putri bangsa untuk para pelaku pendidikan seperti
				guru, siswa dan orangtua untuk mempermudah akses informasi yang terkait pendidikan.</p>
				</div>
			</div>
			<div class="sixteen wide mobile four wide tablet four wide computer column abc" >
				<img src="{{asset('img/mascot/geek_mascot.png')}}" class="mascot-1"  data-uk-parallax="{xp:'-30%',target:'#section-2'}" data-uk-scrollspy="{cls:'uk-animation-fade',delay:500}" />
			</div>
		</div>
	</div>
</div>

<div id="section-min-1">
	{{-- <div class="masked masked-1"></div>
	<div class="masked masked-2"></div> --}}
	<div class="ui grid container">
		<div class="row konten">
			<div class="sixteen wide mobile ten wide tablet ten wide computer column">
				<img src="{{asset('img/mascot/education_clinic.png')}}" class="mascot-1" data-uk-parallax="xp:'30%',viewport:'1',target:'#section-min-1'"
				data-uk-scrollspy="{cls:'uk-animation-fade',delay:500}" />
			</div>
			<div class="sixteen wide mobile six wide tablet six wide computer column shape">
				<div class="flex center" style="text-align:center;">
					<h1 class="title" data-uk-scrollspy="{cls:'uk-animation-fade',delay:50}" >Latar Belakang</h1>
				</div>
				<p>Di tengah era globalisasi dan teknologi informasi yang makin menjamur, 
				para pelaku pendidikan yang tidak terbatas pada guru dan murid membutuhkan suatu sarana dan wadah 
				untuk ketersediaan informasi yang cepat, 
				tepat dan akurat yang menunjang bagi peran, tugas dan tanggung jawab masing-masing.</p>
				<p>Layanan Portal Pendidikan berbasiskan teknologi informasi dipandang sebagai solusi yang sangat 
				bermanfaat bagi para pelaku pendidikan. Dengan adanya Portal Pendidikan berbasiskan teknologi 
				informasi maka para pelaku pendidikan yang bisa mengakses segala informasi tidak hanya terbatas pada guru 
				dan murid saja 
				tetapi seluruh elemen masyarakat bisa mengakses informasi yang dibutuhkan secara real time.<br><br>
				Maka dari itu <b>Kisikisi.id</b> di ciptakan.</p>
				<p></p>
				<a href="#section-2" class="ui button inverted white read" data-uk-smooth-scroll>Baca Lagi</a>
			</div>
			
		</div>
	</div>
</div>

<div id="section-min-2">
	<div class="ui container two column stackable grid">
		<div class="row">
			<div class="sixteen wide column"><center><h1 class="title">Apa yang ada di kisikisi.id</h1></center></div>
		</div>
		<div class="row">
			<div class="column content-detail" data-uk-tooltip="animation:true" title="Kunjungi Direktori Sekolah" data-uk-scrollspy="{cls:'uk-animation-slide-left',delay:200}">
				<a href="http://dir.kisikisi.id">
					<div class="ui piled segment">
						<h3 class="ui header"><img src="img/icon/directory.png" class="ui mini image"/>Direktori Sekolah</h3>
						<p>Sebagai search engine/mesin pencari untuk mencari lembaga pendidikan formal/non formal dari tingkat dasar, menengah hingga perguruan tinggi. Informasi yang ditampilkan diharapkan tidak sebatas hanya informasi umum, tapi juga menampilkan program-program unggulan yang bisa juga diupdate oleh lembaga bersangkutan.</p>
					</div>
				</a>
			</div>
			<div class="column content-image">
				<img src="img/icon/free/search.png" class="my-icon" />
			</div>
		</div>
		<div class="row">
			<div class="column content-image">
				<img src="img/icon/free/video-player.png" class="my-icon" />
			</div>
			<div class="column content-detail" data-uk-tooltip="animation:true,pos:'left'" title="Kunjungi E-Learning" data-uk-scrollspy="{cls:'uk-animation-slide-right',delay:200}">
				<a href="http://learn.kisikisi.id">
					<div class="ui piled segment">
						<h3 class="ui header"><img src="img/icon/elearning.png" class="ui mini image"/></i>E-Learning</h3>
						<p>Pengguna dapat mempelajari mata pelajaran sekolah secara online. Tidak terbatas hanya pada mata pelajaran umum, pengguna dapat mempelajari berbagai mata pelajaran Kejuruan.</p>
					</div>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="column content-detail" data-uk-tooltip="animation:true,pos:'left'" title="Kunjungi Bank Soal" data-uk-scrollspy="{cls:'uk-animation-slide-left',delay:200}">
				<a href="http://soal.kisikisi.id">
					<div class="ui piled segment">
						<h3 class="ui header"><img src="img/icon/banksoal.png" class="ui mini image"/></i>Bank Soal</h3>
						<p>Memuat dokumentasi soal-soal yang pernah ditampilkan dalam Ujian Nasional atau Ujian Daerah. Dokumentasi Bank Soal akan dikategorikan berdasarkan Tingkat Pendidikan, Mata Pelajaran dan Tahun Ujian sehingga akan memudahkan pengguna untuk mencari mata pelajaran yang dibutuhkan. Bank Soal ini akan menjadi salah satu unggulan pada portal pendidikan untuk menarik pengguna khususnya para pelajar dan juga akan disediakan fitur searching untuk mencari soal-soal pelajaran berdasarkan kata/kalimat tertentu.</p>
					</div>
				</a>
			</div>
			<div class="column content-image">
				<img src="img/icon/free/folder.png" class="my-icon" />
			</div>
		</div>
		<div class="row">
			<div class="column content-image">
				<img src="img/icon/free/pipette.png" class="my-icon" />
			</div>
			<div class="column content-detail" data-uk-tooltip="animation:true,pos:'left'" title="Kunjungi Klinik Pendidikan" data-uk-scrollspy="{cls:'uk-animation-slide-right',delay:200}">
				<a href="http://klinik.kisikisi.id">
					<div class="ui piled segment">
						<h3 class="ui header"><img src="img/icon/clinic.png" class="ui mini image"/></i>Klinik Pendidikan</h3>
						<p>Sebagai sarana bagi pelajar atau orang tua untuk bertanya mengenai permasalahan-permasalahan di bidang pendidikan. Modul ini nantinya akan dipandu oleh ahli atau pakar di bidang pendidikan yang bisa menjawab pertanyaan dari para pengguna sehingga diharapkan membuat portal pendidikan ini lebih hidup dan interaktif. Pada modul ini juga akan di sharing ebook/referensi yang berkaitan dengan pendidikan.</p>
					</div>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="column content-detail" data-uk-tooltip="animation:true,pos:'left'" title="Kunjungi Berita Pendidikan" data-uk-scrollspy="{cls:'uk-animation-slide-left',delay:200}">
				<a href="http://news.kisikisi.id">
					<div class="ui piled segment">
						<h3 class="ui header"><img src="img/icon/news.png" class="ui mini image"/></i>Berita Pendidikan</h3>
						<p>Memuat informasi terkini dan aktual mengenai berita yang terkait dengan pendidikan di Indonesia. Informasi yang muncul akan selalu di update setiap hari dan tidak terbatas hanya pada berita pendidikan nasional saja tetapi issue-issue terkait pendidikan nasional dan berita pendidikan mancanegara yang terkait dengan pendidikan nasional dapat ditampilkan juga.</p>
					</div>
				</a>
			</div>
			<div class="column content-image">
				<img src="img/icon/free/screen-1.png" class="my-icon" />
			</div>
		</div>
		<div class="row">
			<div class="column content-image">
				<img src="img/icon/free/color-circle.png" class="my-icon" />
			</div>
			<div class="column content-detail" data-uk-tooltip="animation:true,pos:'left'" title="Kunjungi Agenda Pendidikan" data-uk-scrollspy="{cls:'uk-animation-slide-right',delay:200}">
				<a href="http://agenda.kisikisi.id">
					<div class="ui piled segment">
						<h3 class="ui header"><img src="img/icon/agenda.png" class="ui mini image"/></i>Agenda Pendidikan</h3>
						<p>Berisikan informasi mengenai jadwal event-event pendidikan yang akan dilaksanakan di Indonesia. Event-event tersebut bisa berupa pameran, seminar, workshop/pelatihan, atau event-event lain yang terkait dengan pendidikan</p>
					</div>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="column content-detail" data-uk-tooltip="animation:true,pos:'left'" title="Kunjungi Artikel Pendidikan" data-uk-scrollspy="{cls:'uk-animation-slide-left',delay:200}">
				<a href="http://article.kisikisi.id">
					<div class="ui piled segment">
						<h3 class="ui header"><img src="img/icon/article.png" class="ui mini image"/></i>Artikel Pendidikan</h3>
						<p>Memuat artikel-artikel di bidang pendidikan. Artikel Pendidikan ini dapat dibuat menjadi 2 kategori yaitu Artikel Pakar Pendidikan (berisikan artikel ilmiah yang ditulis atau kontribusi dari pakar pendidikan) dan Artikel Publik (berisikan artikel yang merupakan hasil kontribusi dari publik bisa dari pelajar, orang tua ataupun pengamat pendidikan yang layak untuk dipublikasikan di depan umum)</p>
					</div>
				</a>
			</div>
			<div class="column content-image">
				<img src="img/icon/free/poster.png" class="my-icon" />
			</div>
		</div>
		<div class="row">
			<div class="column content-image">
				<img src="img/icon/free/chat.png" class="my-icon" />
			</div>
			<div class="column content-detail" data-uk-tooltip="animation:true,pos:'left'" title="Kunjungi Forum" data-uk-scrollspy="{cls:'uk-animation-slide-right',delay:200}">
				<a href="http://forum.kisikisi.id">
					<div class="ui piled segment">
						<h3 class="ui header"><img src="img/icon/forum.png" class="ui mini image"/></i>Forum</h3>
						<p>Sebagai tempat untuk sharing/diskusi bagi para pelaku pendidikan berdasarkan topik yang telah ditentukan. Modul ini juga akan membuat portal menjadi interaktif karena sesama pengguna akan bisa saling berdiskusi dan berkomentar mengenai suatu topik.</p>
					</div>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="column content-detail" data-uk-tooltip="animation:true,pos:'right'" title="Kunjungi Beasiswa" data-uk-scrollspy="{cls:'uk-animation-slide-left',delay:200}">
				<a href="">
					<div class="ui piled segment">
						<h3 class="ui header"><img src="img/icon/beasiswa.png" class="ui mini image"/></i>Beasiswa</h3>
						<p>Memuat informasi mengenai beasiswa baik yang diberikan oleh pemerintah, lembaga mancanegara atau swasta.</p>
					</div>
				</a>
			</div>
			<div class="column content-image">
				<img src="img/icon/free/statistics.png" class="my-icon" />
			</div>
		</div>

	</div>
</div>

<div id="section-4">
	<div class="ui container">
		<h1 class="uk-text-center title">Kelebihan Kisikisi.id</h1>
		<div class="ui three doubling stackable cards">
			<div class="ui card"  data-uk-scrollspy="{cls:'uk-animation-fade',repeat:true,delay:100}">
				<div class="content ">
					<center><img src="{{asset('img/icon/elearning.png')}}"  /></center>
					<h2 class="header ">TERLENGKAP</h2>
					<div class="description">Kisikisi merupakan website dengan cakupan tema pendidikan dengan fitur
					yang terluas yang di dukung langsung oleh Kementerian Pendidikan.
					</div>
				</div>
			</div>
			<div class="ui card"  data-uk-scrollspy="{cls:'uk-animation-fade',repeat:true,delay:200}">
				<div class="content ">
					<center><img src="{{asset('img/icon/elearning.png')}}"  /></center>
					<h2 class="header">TERAKTUAL</h2>
					<div class="description">Informasi yang ada selalu di update oleh para kontributor dan staff.
					</div>
				</div>
			</div>
			<div class="ui card"  data-uk-scrollspy="{cls:'uk-animation-fade',repeat:true,delay:300}">
				<div class="content ">
					<center><img src="{{asset('img/icon/elearning.png')}}"  /></center>
					<h2 class="header ">TERAKURAT</h2>
					<div class="description">Informasi di dapat dari sumber terpercaya secara langsung.
					</div>
				</div>
			</div>
			<div class="ui card"  data-uk-scrollspy="{cls:'uk-animation-fade',repeat:true,delay:400}">
				<div class="content ">
					<center><img src="{{asset('img/icon/elearning.png')}}"  /></center>
					<h2 class="header ">1 AKUN UNTUK SEMUA</h2>
					<div class="description">Hanya perlu mendaftarkan satu akun, kamu bisa menggunakan fitur sesuai
					keperluan.
					</div>
				</div>
			</div>
			<div class="ui card"  data-uk-scrollspy="{cls:'uk-animation-fade',repeat:true,delay:500}">
				<div class="content ">
					<center><img src="{{asset('img/icon/elearning.png')}}"  /></center>
					<h2 class="header ">KEAMANAN</h2>
					<div class="description">Privasi user terjaga dengan maksimal, dan semua konten di dalam website ini
					 memiliki hak cipta.
					</div>
				</div>
			</div>
			<div class="ui card"  data-uk-scrollspy="{cls:'uk-animation-fade',repeat:true,delay:600}">
				<div class="content ">
					<center><img src="{{asset('img/icon/elearning.png')}}"  /></center>
					<h2 class="header ">KARYA ANAK BANGSA</h2>
					<div class="description">Dibuat oleh anak bangsa yang memiliki kemampuan handal, dan bercita cita
					memajukan bangsa indonesia dalam bidang pendidikan melalui sarana online yang cepat,tepat dan teraktual.
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
{{-- <div class="wave-2"></div>
<div style="width:100%;height:15px;background-color:#fff;position:absolute;z-index:10;"></div> --}}
<div id="section-5">
	<div class="ui container" data-uk-parallax="y:'100',target:'#section-5'">
		<h1 class="uk-text-center title">Apa kata orang tentang Kisikisi.id</h1>
	<div class="uk-grid uk-grid-collapse" data-uk-scrollspy="{cls:'uk-animation-fade',repeat:true,delay:100}">
		<div class="uk-width-small-1-1 uk-width-medium-1-3 uk-width-large-1-3">
			<div id="side-menu" class="ui vertical text menu">
				<div class="header item">Menurut orang lainnya</div>
				<ul id="inside-menu" data-uk-switcher="{connect:'#switch-content',animation:'slide-right'}">
					<li aria-expanded="true"><a class="active item">Pengguna</a></li>
					<li aria-expanded="false"><a class="item">Pelajar</a></li>
					<li aria-expanded="false"><a class="item">Guru guru</a></li>
					<li aria-expanded="false"><a class="item">Para orang tua</a></li>
					<li aria-expanded="false"><a class="item">Tim kisikisi.id</a></li>
				</ul>
			</div>
		</div>
		
		<ul id="switch-content" class="uk-switcher uk-width-small-1-1 uk-width-medium-2-3 uk-width-large-2-3">
			<li> <!-- pengguna -->
				<div class="uk-slidenav-position" data-uk-slideshow="" width="100%">
					<ul class="uk-slideshow uk-text-center slide-5" width="100%" aria-hidden="false">
						<li class="uk-active" aria-hidden="false">
							<div class="uk-panel uk-panel-box">
								<div class="uk-grid">
									<div class="uk-width-2-3">
										<div class="uk-text-center uk-panel-title">Hariyanto Kosim</div>
										<p class="uk-text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
										consequat...</p>
									</div>
									<div class="uk-width-1-3">
										<img src="{{asset('img/sampleprofile.png')}}" class="ui medium rounded image" />
									</div>
								</div>
							</div>
						</li>
						<li>b</li>
						<li>c</li>
					</ul>
					<ul class="uk-dotnav uk-flex-center" aria-hidden="false">
						<li class="uk-active" data-uk-slideshow-item="0"><a href=""></a></li>
						<li data-uk-slideshow-item="1"><a href=""></a></li>	
						<li data-uk-slideshow-item="2"><a href=""></a></li>			
					</ul>
					<ul></ul>
				</div>
			</li>

			<li> <!-- Pelajar -->
				<div class="uk-slidenav-position" data-uk-slideshow="" width="100%">
					<ul class="uk-slideshow uk-text-center slide-5" width="100%" aria-hidden="false">
						<li class="uk-active">
							<div class="uk-panel uk-panel-box">
								<div class="uk-grid">
									<div class="uk-width-2-3">
										<div class="uk-text-center uk-panel-title">Mohammed Chen Mustofa</div>
										<p class="uk-text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
										consequat...</p>
									</div>
									<div class="uk-width-1-3">
										<img src="{{asset('img/sampleprofile.png')}}" class="ui medium rounded image" />
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="uk-panel uk-panel-box">
								<div class="uk-grid">
									<div class="uk-width-2-3">
										<div class="uk-text-center uk-panel-title">Chentong</div>
										<p class="uk-text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
										consequat...</p>
									</div>
									<div class="uk-width-1-3">
										<img src="{{asset('img/sampleprofile.png')}}" class="ui medium rounded image" />
									</div>
								</div>
							</div>
						</li>
						<li>c</li>
					</ul>
					<ul class="uk-dotnav uk-flex-center" aria-hidden="false">
						<li class="uk-active" data-uk-slideshow-item="0"><a href=""></a></li>
						<li data-uk-slideshow-item="1"><a href=""></a></li>	
						<li data-uk-slideshow-item="2"><a href=""></a></li>			
					</ul>
					<ul></ul>
				</div>
			</li>

			<li> <!-- Guru Guru -->
				<div class="uk-slidenav-position" data-uk-slideshow="" width="100%">
					<ul class="uk-slideshow uk-text-center slide-5" width="100%" aria-hidden="false">
						<li class="uk-active">
							<div class="uk-panel uk-panel-box">
								<div class="uk-grid">
									<div class="uk-width-2-3">
										<div class="uk-text-center uk-panel-title">Prof.Dr.Kompresor.Dafik Nurfatah</div>
										<p class="uk-text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
										consequat...</p>
									</div>
									<div class="uk-width-1-3">
										<img src="{{asset('img/sampleprofile.png')}}" class="ui medium rounded image" />
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="uk-panel uk-panel-box">
								<div class="uk-grid">
									<div class="uk-width-2-3">
										<div class="uk-text-center uk-panel-title">Chentong</div>
										<p class="uk-text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
										consequat...</p>
									</div>
									<div class="uk-width-1-3">
										<img src="{{asset('img/sampleprofile.png')}}" class="ui medium rounded image" />
									</div>
								</div>
							</div>
						</li>
						<li>c</li>
					</ul>
					<ul class="uk-dotnav uk-flex-center" aria-hidden="false">
						<li class="uk-active" data-uk-slideshow-item="0"><a href=""></a></li>
						<li data-uk-slideshow-item="1"><a href=""></a></li>	
						<li data-uk-slideshow-item="2"><a href=""></a></li>			
					</ul>
					<ul></ul>
				</div>
			</li>

			<li> <!-- Para Orang Tua -->
				<div class="uk-slidenav-position" data-uk-slideshow="" width="100%">
					<ul class="uk-slideshow uk-text-center slide-5" width="100%" aria-hidden="false">
						<li class="uk-active">
							<div class="uk-panel uk-panel-box">
								<div class="uk-grid">
									<div class="uk-width-2-3">
										<div class="uk-text-center uk-panel-title">Bapak Saya</div>
										<p class="uk-text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
										consequat...</p>
									</div>
									<div class="uk-width-1-3">
										<img src="{{asset('img/sampleprofile.png')}}" class="ui medium rounded image" />
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="uk-panel uk-panel-box">
								<div class="uk-grid">
									<div class="uk-width-2-3">
										<div class="uk-text-center uk-panel-title">Bapak Nico</div>
										<p class="uk-text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
										consequat...</p>
									</div>
									<div class="uk-width-1-3">
										<img src="{{asset('img/sampleprofile.png')}}" class="ui medium rounded image" />
									</div>
								</div>
							</div>
						</li>
						<li>c</li>
					</ul>
					<ul class="uk-dotnav uk-flex-center" aria-hidden="false">
						<li class="uk-active" data-uk-slideshow-item="0"><a href=""></a></li>
						<li data-uk-slideshow-item="1"><a href=""></a></li>	
						<li data-uk-slideshow-item="2"><a href=""></a></li>			
					</ul>
					<ul></ul>
				</div>
			</li>

			<li> <!-- Tim KisiKisi.id -->
				<div class="uk-slidenav-position" data-uk-slideshow="" width="100%">
					<ul class="uk-slideshow uk-text-center slide-5" width="100%" aria-hidden="false">
						<li class="uk-active">
							<div class="uk-panel uk-panel-box">
								<div class="uk-grid">
									<div class="uk-width-2-3">
										<div class="uk-text-center uk-panel-title">Rivai Amin</div>
										<p class="uk-text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
										consequat...</p>
									</div>
									<div class="uk-width-1-3">
										<img src="{{asset('img/sampleprofile.png')}}" class="ui medium rounded image" />
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="uk-panel uk-panel-box">
								<div class="uk-grid">
									<div class="uk-width-2-3">
										<div class="uk-text-center uk-panel-title">Arbiyanto Wijaya</div>
										<p class="uk-text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
										consequat...</p>
									</div>
									<div class="uk-width-1-3">
										<img src="{{asset('img/sampleprofile.png')}}" class="ui medium rounded image" />
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="uk-panel uk-panel-box">
								<div class="uk-grid">
									<div class="uk-width-2-3">
										<div class="uk-text-center uk-panel-title">Dafik Nurfatah</div>
										<p class="uk-text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
										consequat...</p>
									</div>
									<div class="uk-width-1-3">
										<img src="{{asset('img/sampleprofile.png')}}" class="ui medium rounded image" />
									</div>
								</div>
							</div>
						</li>
					</ul>
					<ul class="uk-dotnav uk-flex-center" aria-hidden="false">
						<li class="uk-active" data-uk-slideshow-item="0"><a href=""></a></li>
						<li data-uk-slideshow-item="1"><a href=""></a></li>	
						<li data-uk-slideshow-item="2"><a href=""></a></li>			
					</ul>
					<ul></ul>
				</div>
			</li>

		</ul>
		
		
	</div>
	</div>
</div>

<div id="footer">
	<div class="ui container">
		<div class="uk-text-center title"><h1>Footer</h1></div>
		<div
              class="fb-like"
              data-share="true"
              data-width="450"
              data-show-faces="true">
            </div>
	</div>
</div>

<script>
</script>

</body>
</html>