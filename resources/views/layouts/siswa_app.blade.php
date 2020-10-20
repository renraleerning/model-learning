@if(Auth::user()->roles == 'siswa')

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Portal edukasi dengan model Reciprocal Teaching</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->
	<link href='https://fonts.googleapis.com/css?family=Karla' rel='stylesheet'>
    <link rel="icon" href="{{ asset('style/assets/images/logo2.svg') }}" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('style/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/plugins/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/dashboard_style.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/rangkuman_style.css') }}">
    

</head>
<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ navigation menu ] start -->
	<nav class="pcoded-navbar menu-light ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div " >
				
				<div class="">
					<div class="main-menu-header">
						<img class="img-radius" src="{{ asset('style/assets/images/blank-user-img.jpg') }}" alt="User-Profile-Image">
						<div class="user-details">
							<div id="more-details"> {{ Auth::user()->nama }}</div>
						</div>
					</div>
				</div>
				
				<ul class="nav pcoded-inner-navbar ">

					<li class="nav-item pcoded-menu-caption">
					    <label>Navigasi</label>
					</li>
					<li class="nav-item">
					    <a href="{{ route('dashboard') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Beranda</span></a>
                    </li>
                    <!-- Button materi -->
					<li class="nav-item pcoded-menu-caption">
					    <label>Reciprocal Teaching</label>
					</li>
					<li class="nav-item pcoded-hasmenu pcoded-trigger">
					    <a href="#!" class="nav-link has-ripple"><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Materi DDL dan DML</span><span class="ripple ripple-animate" style="height: 210px; width: 210px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255); opacity: 0.4; top: -76px; left: 37px;"></span></a>
					    <ul class="pcoded-submenu" style="display: block;">
					        <li><a href="{{ route('materi') }}">Pengantar</a></li>
					        <li><a href="/materi/ddl/{{1}}">Data Definition Language</a></li>
					        <li><a href="/materi/dml/{{1}}">Data Manipulation Language</a></li>
					    </ul>
					</li>
                    <li class="nav-item pcoded-hasmenu pcoded-trigger">
					    <a href="#!" class="nav-link has-ripple"><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Merangkum Materi</span><span class="ripple ripple-animate" style="height: 210px; width: 210px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255); opacity: 0.4; top: -76px; left: 37px;"></span></a>
					    <ul class="pcoded-submenu" style="display: block;">
					        <li><a href="{{ route('rangkum.ddl') }}">Materi DDL</a></li>
					        <li><a href="{{ route('rangkum.dml') }}">Materi DML</a></li>
					    </ul>
					</li>
                    <li class="nav-item pcoded-hasmenu pcoded-trigger">
					    <a href="#!" class="nav-link has-ripple"><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Menanyakan Materi</span><span class="ripple ripple-animate" style="height: 210px; width: 210px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255); opacity: 0.4; top: -76px; left: 37px;"></span></a>
					    <ul class="pcoded-submenu" style="display: block;">
					        <li><a href="{{ route('tanya.ddl') }}">Materi DDL</a></li>
					        <li><a href="{{ route('tanya.dml') }}">Materi DML</a></li>
					    </ul>
					</li>
                    <li class="nav-item pcoded-hasmenu pcoded-trigger">
					    <a href="#!" class="nav-link has-ripple"><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Memprediksi Materi</span><span class="ripple ripple-animate" style="height: 210px; width: 210px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255); opacity: 0.4; top: -76px; left: 37px;"></span></a>
					    <ul class="pcoded-submenu" style="display: block;">
					        <li><a href="{{ route('prediksi.ddl') }}">Materi DDL</a></li>
					        <li><a href="{{ route('prediksi.dml') }}">Materi DML</a></li>
					    </ul>
					</li>                   
				</ul>				
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
		
			
				<div class="m-header">
					<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
					<a href="#!" class="b-brand logo">
						<!-- ========   change your logo hear   ============ -->
						<img src="{{ asset('style/assets/images/logo2.svg') }}" alt="" class="logo">
						<img src="{{ asset('style/assets/images/logo-icon.png')}}" alt="" class="logo-thumb">
					</a>
					<a href="#!" class="mob-toggler">
						<i class="feather icon-more-vertical"></i>
					</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="navbar-nav ml-auto">
						<li>
							<div class="dropdown">
								<a class="dropdown-toggle notif" href="#" data-toggle="dropdown">
									<span><i class="icon feather icon-bell"></i></span>
									@foreach($rangkum as $r)
										@if($r->status != 'NC')
											<span class="badge"> </span>
											@break
										@endif
									@endforeach	
									@foreach($tanya as $t)
										@if($t->status != 'NC')
											<span class="badge"> </span>
											@break
										@endif
									@endforeach									
									@foreach($prediksi as $p)
										@if($p->status != 'NC')
											<span class="badge"> </span>
											@break
										@endif
									@endforeach
								</a>
								<div class="dropdown-menu dropdown-menu-right notification">
									<div class="noti-head">
										<h6 class="d-inline-block m-b-0">Pemberitahuan</h6>
									</div>
									<ul class="noti-body">
									@foreach($rangkum as $r)
										@if($r->status != 'NC' && $r->id_siswa == Auth::user()->id)
										<li class="notification">
											<div class="media">												
												<div class="media-body">
													<p><strong>{{$r->user->nama}}</strong></p>
													<p>
														@if($r->materi_rangkuman == 'ddl')
															Rangkuman ddl 
														@else
															Rangkuman dml 
														@endif
													</p>
													<p style="color: #3498db;">
														- {{$r->catatan}} !
													</p>
													@if($r->materi_rangkuman == 'ddl')
														<a href="{{route('rangkum.ddl')}}" 
															style="color: #3498db; float:right;">
															Tinjau
														</a>
													@else
														<a href="{{route('rangkum.dml')}}" 
															style="color: #3498db; float:right;">
															Tinjau
														</a>
													@endif
												</div>
											</div>
										</li>
										@endif
									@endforeach
									@foreach($tanya as $t)
										@if($t->status != 'NC' && $t->id_siswa == Auth::user()->id)
										<li class="notification">
											<div class="media">												
												<div class="media-body">
													<p><strong>{{$t->user->nama}}</strong></p>
													<p>
														@if($t->materi_pertanyaan == 'ddl')
															Pertanyaan ddl 
														@else
															Pertanyaan dml 
														@endif
													</p>
													<p style="color: #3498db;">
														- {{$t->catatan}} !
													</p>
													@if($t->materi_pertanyaan == 'ddl')
														<a href="{{route('tanya.ddl')}}" 
															style="color: #3498db; float:right;">
															Tinjau
														</a>
													@else
														<a href="{{route('tanya.dml')}}" 
															style="color: #3498db; float:right;">
															Tinjau
														</a>
													@endif
												</div>
											</div>
										</li>
										@endif
									@endforeach
									@foreach($prediksi as $p)
										@if($p->status != 'NC' && $p->id_siswa == Auth::user()->id)
										<li class="notification">
											<div class="media">												
												<div class="media-body">
													<p><strong>{{$p->user->nama}}</strong></p>
													<p>
														@if($p->materi_prediksi == 'ddl')
															Prediksi ddl 
														@else
															Prediksi dml 
														@endif
													</p>
													<p style="color: #3498db;">
														- {{$p->catatan}} !
													</p>
													@if($p->materi_prediksi == 'ddl')
														<a href="{{route('prediksi.ddl')}}" 
															style="color: #3498db; float:right;">
															Tinjau
														</a>
													@else
														<a href="{{route('prediksi.dml')}}" 
															style="color: #3498db; float:right;">
															Tinjau
														</a>
													@endif
												</div>
											</div>
										</li>
										@endif
									@endforeach
									</ul>
								</div>
							</div>
						</li>
						<li>
							<div class="dropdown drp-user">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="feather icon-user"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right profile-notification">
									<div class="pro-head">
										<img src="{{ asset('style/assets/images/blank-user-img.jpg') }}" class="img-radius" alt="User-Profile-Image">
										<span>{{ Auth::user()->nama }}</span>
										<a href="{{ route('user.logout') }}" 
											class="dud-logout" title="Logout" onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
												<i class="feather icon-log-out"></i>
										</a>
										<form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                        	@csrf
                                    	</form>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
				
			
	</header>
	<!-- [ Header ] end -->
	
	

<!-- [ Main Content ] start -->
	@yield('content')

    <!-- Required Js -->
    <script src="{{ asset('style/assets/js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/pcoded.min.js') }}"></script>



</body>

</html>
@else
	<?php 
		echo 'hehehe';
	?>
@endif
