<div id="mainNav" class="ui icon secondary inverted  menu" data-uk-sticky>
	<div class="ui container uk-hidden-large">
		<a id="sidebarToggle" class="active logo item">
		   <img class="icon" src="{{asset('img/logo/logo.png')}}" width="30" alt="">
		   <i class="dropdown icon"></i>
		</a>
		<div class="right menu" ng-if="!isLogin()" >
			<a class="item" ng-click="loginForm()">
				<i class="unlock large icon"></i>
			</a>
		</div>
	</div>
	<div class="ui container uk-visible-large">
		  <a class="active item logo">
			<img src="{{asset('img/logo/logo.png')}}" alt="">
			<span class="content">isikisi</span>
		  </a>
		  <span class="hint--bottom" data-hint="Agenda Pendidikan">
			<a class="item" href="http://agenda.kisikisi.id">
				<i class="calendar large icon"></i>
			</a>
		  </span>
		  <span class="hint--bottom" data-hint="Beasiswa Pendidikan">
			<a class="item" href="http://beasiswa.kisikisi.id">
				<i class="student large icon"></i>
			</a>
		  </span>
		  <span class="hint--bottom" data-hint="Berita Pendidikan">
			<a class="item" href="http://berita.kisikisi.id">
				<i class="newspaper large icon"></i>
			</a>
		  </span>
		  <span class="hint--bottom" data-hint="Direktori Pendidikan">
			  <a class="item" href="http://direktori.kisikisi.id">
					<i class="university large icon"></i>
			  </a>
		  </span>
		  <span class="hint--bottom" data-hint="e-Learning">
			<a class="item" href="http://learning.kisikisi.id">
				<i class="book large icon"></i>
			</a>
		  </span>
		
		<div class="right menu" ng-if="!isLogin()" >
			<a class="item" ng-click="loginForm()">
				<i class="unlock large icon"></i>
			</a>
		</div>
	</div>
</div>
