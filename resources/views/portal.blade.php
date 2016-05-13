<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="image_src" type="image/jpeg" href="img/logo/logo.png" />
    <link rel="shortcut icon" href="img/logo/logo.png">
    <link rel="stylesheet" href="{{asset('css/portal.min.css')}}" />
    <title>Kisikisi.id - Portal pendidikan</title>
    <meta content='width=device-width, height=device-height, minimum-scale=1.0, initial-scale=1.0, user-scalable=0' name='viewport'/>
    <meta content='IE=Edge' http-equiv='X-UA-Compatible'/>
    <meta content='website' property='og:type'/>
    <meta content='Kisikisi.id - Portal pendidikan' property='og:title'/>
    <meta content='Kisikisi.id merupakan portal pendidikan terbesar di Indonesia yang menyajikan informasi terlengkap dan terupdate mengenai direktori pendidikan, agenda pendidikan, berita pendidikan dan informasi beasiswa. Dibangun oleh putra-putri bangsa untuk para pelaku pendidikan seperti guru, siswa dan orangtua untuk mempermudah akses informasi yang terkait pendidikan.' property='og:description'/>
    <meta content='id_ID' property='og:locale'/>
    <meta content='http://kisikisi.id/' property='og:url'/>
    <meta content='Kisikisi.id - Portal pendidikan' property='og:site_name'/>
    <meta content='http://kisikisi.id/img/background/background_portal.jpg' property='og:image'/>

    <base href="/index.php"></base>
    <script src="{{ asset('js/lib.portal.min.js') }}"></script>
    <script src="{{ asset('js/portal.min.js') }}"></script>
</head>
<body>

<div id="section-1">

	<div class="ui grid container section-2">

		<div class="centered row" style="margin-top:190px;" data-uk-parallax="{y:'50'}" data-uk-scrollspy="{cls:'uk-animation-fade',delay:150}">
			<span id="landing-title" class="title kisi"></span>
		</div>
		<div class="centered row my-icon" style="margin-top:65px;" data-uk-parallax="{y:'100'}" data-uk-scrollspy="{cls:'uk-animation-fade',delay:300}" >
			<center><a class="button-scroll" href="#menu" data-uk-smooth-scroll>Memulai KisiKisi</a></center>
		</div>
	</div>
</div>
<div id="menu" class="ui inverted menu"  data-uk-smooth-scroll>
	<div class="ui container">
	    <div class="item">
	       <img src="{{asset('img/logo/logo.png')}}" class="logo" />
	    </div>
		<a href="dir.kisikisi.id" class="item">Direktori Sekolah</a>
		<a href="learn.kisikisi.id" class="item">E-Learning</a>
		<a href="kisikisi.id" class="item">Bank Soal</a>
		<a href="kisikisi.id" class="item">Klinik Pendidikan</a>
		<a href="news.kisikisi.id" class="item">Berita Pendidikan</a>
		<a href="#" class="item">Agenda Pendidikan</a>
		<a href="#" class="item">Artikel Pendidikan</a>
		<a href="#" class="item">Forum</a>
		<a href="#" class="item">Beasiswa</a>
	</div>
</div>

<div id="section-min-1">
	<div class="ui grid container">
		<div class="row konten">
			<div class="ten wide column">
				<img src="{{asset('img/mascot/education_clinic.png')}}" class="mascot-1" data-uk-parallax="x:'150',target:'#section-min-1'" />
			</div>
			<div class="six wide column shape">
				<h1 class="title">Latar Belakang</h1>
				<p>Di tengah era globalisasi dan teknologi informasi yang makin menjamur, 
				para pelaku pendidikan yang tidak terbatas pada guru dan murid membutuhkan suatu sarana dan wadah 
				untuk ketersediaan informasi yang cepat, 
				tepat dan akurat yang menunjang bagi peran, tugas dan tanggung jawab masing-masing</p>
				<p>Layanan Portal Pendidikan berbasiskan teknologi informasi dipandang sebagai solusi yang sangat 
				bermanfaat bagi para pelaku pendidikan. Dengan adanya Portal Pendidikan berbasiskan teknologi 
				informasi maka para pelaku pendidikan yang bisa mengakses segala informasi tidak hanya terbatas pada guru 
				dan murid saja 
				tetapi seluruh elemen masyarakat bisa mengakses informasi yang dibutuhkan secara real time</p>
				<p>Maka dari itu <b>Kisikisi.id</b> di ciptakan</p>
				<a href="#section-2" class="ui button inverted white read" data-uk-smooth-scroll>Baca Lagi</a>
			</div>
			
		</div>
	</div>
</div>

<div id="section-2" data-uk-smooth-scroll >
	<div class="ui grid container" >
		<div class="centered row "  >
				<h1 class="title" data-uk-scrollspy="{cls:'uk-animation-fade',delay:50}" >Apa itu KisiKisi.id?</h1>
		</div>
		<div style="margin-top:80px;height:10px;width:100%"></div>
		<div class="row">
			<div class="eleven wide column text" data-uk-parallax="{x:'50',y:'-50',target:'#section-2'}" data-uk-scrollspy="{cls:'uk-animation-fade',delay:530}" >
				<img src="{{asset('img/icon/chat_baloon.svg')}}" class="chat" />
				<div class="texting"> <p><b>Kisikisi.id </b>merupakan portal pendidikan terbesar di Indonesia yang menyajikan
				informasi terlengkap dan terupdate mengenai direktori pendidikan, agenda pendidikan, berita
				pendidikan dan informasi beasiswa. Dibangun oleh putra-putri bangsa untuk para pelaku pendidikan seperti
				guru, siswa dan orangtua untuk mempermudah akses informasi yang terkait pendidikan.</p>
				</div>
			</div>
			<div class="five wide column" >
				<img src="{{asset('img/mascot/geek_mascot.png')}}" class="mascot-1"  data-uk-parallax="{x:'-200',y:'40',target:'#section-2'}" data-uk-scrollspy="{cls:'uk-animation-fade',delay:150}" />
			</div>
		</div>

		<div class="row icon-master">
			<!--<div class="twelve wide column">
				<img src="{{asset('img/icon/directory.png')}}" class="icon" />
				<img src="{{asset('img/icon/elearning.png')}}" class="icon" />
				<img src="{{asset('img/icon/banksoal.png')}}" class="icon" />
				<img src="{{asset('img/icon/clinic.png')}}" class="icon" />
				<img src="{{asset('img/icon/news.png')}}" class="icon" />
				<img src="{{asset('img/icon/agenda.png')}}" class="icon" />
				<img src="{{asset('img/icon/article.png')}}" class="icon" />
				<img src="{{asset('img/icon/forum.png')}}" class="icon" />
				<img src="{{asset('img/icon/beasiswa.png')}}" class="icon" />
			</div>-->
		</div>
	</div>
</div>

<div id="section-3">
<div class="mask"></div>
	<div class="ui container">
		<h1 class="uk-text-center title">Apa saja yang ada di KisiKisi.id</h1>
			<div class="uk-slidenav-position" data-uk-slideshow="animation:'scroll'" width="100%" data-uk-scrollspy="{cls:'uk-animation-fade',repeat:true}">
				<ul class="uk-slideshow uk-text-center" width="100%">
					<li style="animation-duration: 500ms;" class="uk-active" aria-hidden="false">
					 	<div class="uk-grid">
						 	<div class="uk-width-1-1">
						 	<div class="ui special cards slide-content" style="">
								<div class="blurring dimmable image">
									<div class="ui dimmer">
										<div class="content">
											<div class="center">
											<div class="ui inverted button">View</div>
											</div>
										</div>
									</div>
								<img src="{{asset('img/website.png')}}" class="web-image" />
							</div>
						</div>
						 		
						 	</div>
						 	<div class="uk-width-1-1 text">
						 		<h1 class="title-slide">Direktori Sekolah</h1>
						 	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						 	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						 	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						 	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						 	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						 	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						 	<h3>Fitur :</h3>
						 	<ul class="fitur">
						 		<li><i class="ui icon search"></i><a href="#">Mencari Sekolah</a></li>
						 		<li><i class="ui icon unhide"></i><a href="#">Melihat Detail Sekolah</a></li>
						 		<li><i class="ui icon empty star"></i><a href="#">Melihat Kualitas Sekolah</a></li>
						 		<li><i class="ui icon plus"></i><a href="#">Mendaftarkan Sekolah</a></li>
						 	</ul>
						 	</div>
					 	</div>
                     </li>

					<li>
						<div class="uk-grid">
						 	<div class="ui special cards slide-content" style="">
								<div class="blurring dimmable image">
									<div class="ui dimmer">
										<div class="content">
											<div class="center">
											<div class="ui inverted button">View</div>
											</div>
										</div>
									</div>
								<img src="{{asset('img/website.png')}}" class="web-image" />
							</div>
						</div>
						 	<div class="uk-width-1-1 text">
						 		<h1 class="title-slide">E-Learning</h1>
						 	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						 	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						 	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						 	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						 	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						 	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						 	<h3>Fitur :</h3>
						 	<ul class="fitur">
						 		<li><i class="ui icon add user"></i><a href="#">Login & Registrasi</a></li>
						 		<li><i class="ui icon search"></i><a href="#">Mencari Materi</a></li>
						 		<li><i class="ui icon upload"></i><a href="#">Upload</a></li>
						 		<li><i class="ui icon plus"></i><a href="#">Berlangganan</a></li>
						 	</ul>
						 	</div>
					 	</div>
					</li>
					<li>
						<div class="uk-grid">
						 	<div class="ui special cards slide-content" style="">
								<div class="blurring dimmable image">
									<div class="ui dimmer">
										<div class="content">
											<div class="center">
											<div class="ui inverted button">View</div>
											</div>
										</div>
									</div>
								<img src="{{asset('img/website.png')}}" class="web-image" />
							</div>
						</div>
						 	<div class="uk-width-1-1 text">
						 		<h1 class="title-slide">Bank Soal</h1>
						 	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						 	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						 	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						 	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						 	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						 	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						 	<h3>Fitur :</h3>
						 	<ul class="fitur">
						 		<li><i class="ui icon search"></i><a href="#">Mencari Soal SD</a></li>
						 		<li><i class="ui icon search"></i><a href="#">Mencari Soal SMP</a></li>
						 		<li><i class="ui icon search"></i><a href="#">Mencari Soal SMA/SMK</a></li>
						 		<li><i class="ui icon search"></i><a href="#">Mencari Soal Perguruan Tinggi</a></li>
						 	</ul>
						 	</div>
					 	</div>
					</li>
					<li>
						<div class="uk-grid">
						 	<div class="ui special cards slide-content" style="">
								<div class="blurring dimmable image">
									<div class="ui dimmer">
										<div class="content">
											<div class="center">
											<div class="ui inverted button">View</div>
											</div>
										</div>
									</div>
								<img src="{{asset('img/website.png')}}" class="web-image" />
							</div>
						</div>
						 	<div class="uk-width-1-1 text">
						 		<h1 class="title-slide">Klinik Pendidikan</h1>
						 	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						 	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						 	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						 	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						 	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						 	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						 	<h3>Fitur :</h3>
						 	<ul class="fitur">
						 		<li><i class="ui icon plus"></i><a href="#">Berlangganan</a></li>
						 		<li><i class="ui icon search"></i><a href="#">Mencari Soal SMP</a></li>
						 		<li><i class="ui icon search"></i><a href="#">Mencari Soal SMA/SMK</a></li>
						 		<li><i class="ui icon search"></i><a href="#">Mencari Soal Perguruan Tinggi</a></li>
						 	</ul>
						 	</div>
					 	</div>
					</li>
					<li>
						<div class="uk-grid">
						 	<div class="ui special cards slide-content" style="">
								<div class="blurring dimmable image">
									<div class="ui dimmer">
										<div class="content">
											<div class="center">
											<div class="ui inverted button">View</div>
											</div>
										</div>
									</div>
								<img src="{{asset('img/website.png')}}" class="web-image" />
							</div>
						</div>
						 	<div class="uk-width-1-1 text">
						 		<h1 class="title-slide">Berita Pendidikan</h1>
						 	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						 	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						 	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						 	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						 	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						 	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						 	<h3>Fitur :</h3>
						 	<ul class="fitur">
						 		<li><i class="ui icon announcement"></i><a href="#">Update Berita Terkini Pendidikan</a></li>
						 		<li><i class="ui icon search"></i><a href="#">Mencari Berita Pendidikan</a></li>
						 		<li><i class="ui icon new"></i><a href="#">Melihat Berita Pendidikan</a></li>
						 		<li><i class="ui icon comments outline"></i><a href="#">Berkomentar Pada Berita</a></li>
						 	</ul>
						 	</div>
					 	</div>
					</li>
					<li>
						<div class="uk-grid">
						 	<div class="ui special cards slide-content" style="">
								<div class="blurring dimmable image">
									<div class="ui dimmer">
										<div class="content">
											<div class="center">
											<div class="ui inverted button">View</div>
											</div>
										</div>
									</div>
								<img src="{{asset('img/website.png')}}" class="web-image" />
							</div>
						</div>
						 	<div class="uk-width-1-1 text">
						 		<h1 class="title-slide">Agenda Pendidikan</h1>
						 	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						 	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						 	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						 	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						 	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						 	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						 	<h3>Fitur :</h3>
						 	<ul class="fitur">
						 		<li><i class="ui icon calendar"></i><a href="#">Melihat Kalender Pendidikan</a></li>
						 		<li><i class="ui icon info"></i><a href="#">Melihat Hari Libur</a></li>
						 		<li><i class="ui icon announcement"></i><a href="#">Update Terkini Jadwal Pendidikan</a></li>
						 	</ul>
						 	</div>
					 	</div>
					</li>
					<li>
						<div class="uk-grid">
						 	<div class="ui special cards slide-content" style="">
								<div class="blurring dimmable image">
									<div class="ui dimmer">
										<div class="content">
											<div class="center">
											<div class="ui inverted button">View</div>
											</div>
										</div>
									</div>
								<img src="{{asset('img/website.png')}}" class="web-image" />
							</div>
						</div>
						 	<div class="uk-width-1-1 text">
						 		<h1 class="title-slide">Artikel Pendidikan</h1>
						 	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						 	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						 	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						 	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						 	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						 	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						 	<h3>Fitur :</h3>
						 	<ul class="fitur">
						 		<li><i class="ui icon announcement"></i><a href="#">Tutorial</a></li>
						 		<li><i class="ui icon search"></i><a href="#">Mencari Berita Pendidikan</a></li>
						 		<li><i class="ui icon unhide"></i><a href="#">Melihat Berita Pendidikan</a></li>
						 		<li><i class="ui icon comments outline"></i><a href="#">Berkomentar Pada Berita</a></li>
						 	</ul>
						 	</div>
					 	</div>
					</li>
					<li>
						<div class="uk-grid">
						 	<div class="ui special cards slide-content" style="">
								<div class="blurring dimmable image">
									<div class="ui dimmer">
										<div class="content">
											<div class="center">
											<div class="ui inverted button">View</div>
											</div>
										</div>
									</div>
								<img src="{{asset('img/website.png')}}" class="web-image" />
							</div>
						</div>
						 	<div class="uk-width-1-1 text">
						 		<h1 class="title-slide">Forum Pendidikan</h1>
						 	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						 	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						 	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						 	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						 	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						 	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						 	<h3>Fitur :</h3>
						 	<ul class="fitur">
						 		<li><i class="ui icon add user"></i><a href="#">Login & Registrasi User</a></li>
						 		<li><i class="ui icon student"></i><a href="#">Berinteraksi Dengan User Lain</a></li>
						 		<li><i class="ui icon write"></i><a href="#">Membuat Artikel</a></li>
						 		<li><i class="ui icon search"></i><a href="#">Mencari Artikel Oleh User Lain</a></li>
						 	</ul>
						 	</div>
					 	</div>
					</li>
					<li>
						<div class="uk-grid">
						 	<div class="ui special cards slide-content" style="">
								<div class="blurring dimmable image">
									<div class="ui dimmer">
										<div class="content">
											<div class="center">
											<div class="ui inverted button">View</div>
											</div>
										</div>
									</div>
								<img src="{{asset('img/website.png')}}" class="web-image" />
							</div>
						</div>
						 	<div class="uk-width-1-1 text">
						 		<h1 class="title-slide">Beasiswa</h1>
						 	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						 	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						 	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						 	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						 	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						 	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						 	<h3>Fitur :</h3>
						 	<ul class="fitur">
						 		<li><i class="ui icon announcement"></i><a href="#">Melihat Kumpulan Beasiswa Se-Indonesia</a></li>
						 		<li><i class="ui icon search"></i><a href="#">Mendaftarkan Beasiswa</a></li>
						 		<li><i class="ui icon unhide"></i><a href="#">Mencari Beasiswa Berdasarkan Sekolah/Daerah</a></li>
						 		<li><i class="ui icon comments outline"></i><a href="#"></a></li>
						 	</ul>
						 	</div>
					 	</div>
					</li>
				</ul>
				<ul>
					
				</ul>
				<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
				<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
				
			</div>
	</div>
</div>

<div id="section-4">
	<div class="ui container">
		<h1 class="uk-text-center title">Kelebihan KisiKisi.id</h1>
		<div class="ui three column grid">
			<div class="column">
				<div class="ui card"  data-uk-scrollspy="{cls:'uk-animation-fade',repeat:true,delay:100}">
					<div class="content ">
						<center><img src="{{asset('img/icon/elearning.png')}}" style="height:150px !important;" /></center>
						<h2 class="header ">TERLENGKAP</h2>
						<div class="description">Kisikisi merupakan website dengan cakupan tema pendidikan dengan fitur
						yang terluas yang di dukung langsung oleh Kementerian Pendidikan.
						</div>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="ui card"  data-uk-scrollspy="{cls:'uk-animation-fade',repeat:true,delay:200}">
					<div class="content ">
						<center><img src="{{asset('img/icon/elearning.png')}}" style="height:150px !important;" /></center>
						<h2 class="header">TERAKTUAL</h2>
						<div class="description">Informasi yang ada selalu di update oleh para kontributor dan staff.
						</div>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="ui card"  data-uk-scrollspy="{cls:'uk-animation-fade',repeat:true,delay:300}">
					<div class="content ">
						<center><img src="{{asset('img/icon/elearning.png')}}" style="height:150px !important;" /></center>
						<h2 class="header ">TERAKURAT</h2>
						<div class="description">Informasi di dapat dari sumber terpercaya secara langsung.
						</div>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="ui card"  data-uk-scrollspy="{cls:'uk-animation-fade',repeat:true,delay:400}">
					<div class="content ">
						<center><img src="{{asset('img/icon/elearning.png')}}" style="height:150px !important;" /></center>
						<h2 class="header ">1 AKUN UNTUK SEMUA</h2>
						<div class="description">Hanya perlu mendaftarkan satu akun, kamu bisa menggunakan fitur sesuai
						keperluan.
						</div>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="ui card"  data-uk-scrollspy="{cls:'uk-animation-fade',repeat:true,delay:500}">
					<div class="content ">
						<center><img src="{{asset('img/icon/elearning.png')}}" style="height:150px !important;" /></center>
						<h2 class="header ">KEAMANAN</h2>
						<div class="description">Privasi user terjaga dengan maksimal, dan semua konten di dalam website ini
						 memiliki hak cipta.
						</div>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="ui card"  data-uk-scrollspy="{cls:'uk-animation-fade',repeat:true,delay:600}">
					<div class="content ">
						<center><img src="{{asset('img/icon/elearning.png')}}" style="height:150px !important;" /></center>
						<h2 class="header ">KARYA ANAK BANGSA</h2>
						<div class="description">Dibuat oleh anak bangsa yang memiliki kemampuan handal, dan bercita cita
						memajukan bangsa indonesia dalam bidang pendidikan melalui sarana online yang cepat,tepat dan teraktual.
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

<div id="section-5">
	<div class="ui container" data-uk-parallax="y:'100',target:'#section-5'">
		<h1 class="uk-text-center title">Apa kata orang tentang KisiKisi.id</h1>
	<div class="uk-grid uk-grid-collapse" data-uk-scrollspy="{cls:'uk-animation-fade',repeat:true,delay:100}">
		<div class="uk-width-1-3">
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
		
		<ul id="switch-content" class="uk-switcher uk-width-2-3">
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
	</div>
</div>

<script>

</script>

</body>
</html>
