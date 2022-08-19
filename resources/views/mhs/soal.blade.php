<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Tes Riasec - Mahasiswa</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/logo.png" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="assets/back/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/back/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/back/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/back/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="assets/back/css/demo.css">
</head>
<body>
	<div class="wrapper overlay-sidebar">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="dark">
				
				<!-- <a href="index.html" class="logo">
					<center>
					<img src="assets/back/img/logo.svg" alt="navbar brand" class="navbar-brand">
					</center>
				</a> -->
				

				<!-- <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button> -->
			</div>

			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark">
				<center>
					<a href="#" class="logo" style="color:white;font-size: 20px;font-family: sans-serif;margin-bottom: -8px;text-decoration: none;">
						<!-- <img src="assets/back/img/logo.svg" alt="navbar brand" class="navbar-brand"> -->
						<img src="assets/img/logo.png" alt="navbar brand" class="navbar-brand" style="width:5%;margin-top:-8px;margin-right: 7px;"><b>TES</b>RIASEC
					</a>
				</center>
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="assets/back/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="assets/back/img/chadengle.jpg" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4>{{Session::get('nam')}}</h4>
												<p class="text-muted">{{Session::get('email')}}</p><!-- <a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a> -->
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#" data-toggle="modal" data-target="#ed{{Session::get('nim')}}">Edit Profile</a>
										
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="/logsoal">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="assets/back/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="panel-header" style="background-color:#252b40;">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<!-- <div>
								<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
								<h5 class="text-white op-7 mb-2">Premium Bootstrap 4 Admin Dashboard</h5>
							</div> -->
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row row-card-no-pd mt--2">
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-3">
											<div class="icon-big text-center">
												<i class="flaticon-user-4 text-dark" style="-webkit-transform: rotate(15deg);transform: rotate(-15deg);"></i>
											</div>
										</div>
										<div class="col-9 col-stats">
											<div class="numbers">
												<p class="card-category">Nomor Induk Mahasiswa</p>
												<h4 class="card-title">{{Session::get('nim')}}</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-3">
											<div class="icon-big text-center">
												<i class="flaticon-user text-dark" style="-webkit-transform: rotate(15deg);transform: rotate(-15deg);"></i>
											</div>
										</div>
										<div class="col-9 col-stats">
											<div class="numbers">
												<p class="card-category">Nama Mahasiswa</p>
												<h5>{{Session::get('nam')}}</h5>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- <div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-3">
											<div class="icon-big text-center">
												<i class="flaticon-google-plus text-dark" style="-webkit-transform: rotate(15deg);transform: rotate(-15deg);"></i>
											</div>
										</div>
										<div class="col-9 col-stats">
											<div class="numbers">
												<p class="card-category">Email</p>
												<h5>{{Session::get('email')}}</h5>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> -->
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-3">
											<div class="icon-big text-center">
												<i class="flaticon-shapes text-dark" style="-webkit-transform: rotate(15deg);transform: rotate(-15deg);"></i>
											</div>
										</div>
										<div class="col-9 col-stats">
											<div class="numbers">
												<p class="card-category">Program Studi</p>
												<h5>{{Session::get('prodi')}} </h5>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-3">
											<div class="icon-big text-center">
												<i class="flaticon-shapes text-dark" style="-webkit-transform: rotate(15deg);transform: rotate(-15deg);"></i>
											</div>
										</div>
										<div class="col-9 col-stats">
											<div class="numbers">
												<p class="card-category">Waktu Pengerjaan</p>
												<h4 class="card-title" id="demo"> </h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


			
	            <div class="col-md-12" style="margin-top: -10px;">
	                <div class=" col-md-12" style="background-color: rgba(224,226,227,0.7);padding: 30px;border-radius: 10px;margin-bottom: 30px;">
	                    <form action="/soal{{$kat}}"  enctype="multipart/form-data">
	                        <div class="row">
	                        @foreach ($data as $key)
	                        <div class="col-md-4" id="table_data" style="font-size:16px;">
	                            {{$no++}}. <font>{{$key->SOAL}}<br></font>
	                            <input type="hidden" name="no" value="{{$key->SOAL_ID}}">
	                            <input type="radio" class="radio" id="cek" name="j{{$key->SOAL_ID}}" value="{{$key->KATEGORI}}" style="margin-right: 10px;height: 15px; width: 15px;">Ya
	                            <br>
	                            <input type="radio" class="radio" id="cek" name="j{{$key->SOAL_ID}}" value="-" style="margin: 0px 10px 15px 0px;height: 15px; width: 15px;" required="">Tidak
	                            <br>
	                            
	                        </div>
	                        @endforeach
	                    	</div>


	                       <hr>

	                        <input type="hidden" name="nik" value="{{Session::get('nim')}}" style="width: 100px;">
	                        <!-- <input type="hidden" name="tahun" value="<?php echo date('Y'); ?>" style="width: 100px;"> -->
		                        <div class="col-md-12" style="text-align: right;">
		                      		<button class="btn btn-dark col-md-2" style="border-radius: 100px;margin-bottom: -10px"> {{$bot}} <i class="fas fa-arrow-circle-right"></i></button>
		                    	</div>
	                    </form>
	                </div>
	            </div>



	            <?php $ed = DB::SELECT("SELECT*FROM mhs"); ?>	
				@foreach($ed as $emh)
					<div class="modal fade" id="ed{{$emh->NIM}}" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header no-bd">
									<h5 class="modal-title">
										<span class="fw-mediumbold">
										Edit Mahasiswa</span>
									</h5>
								</div>

								<?php 

									$edit = DB::SELECT("SELECT * FROM mhs WHERE NIM = '$emh->NIM'");
									$gen = array("Laki-laki","Perempuan");

									foreach($edit as $upd){
								?>
								<form action="/akun:upd={{$upd->NIM}}" method="post" enctype="multipart/form-data">
				                    {{csrf_field()}}
								<div class="modal-body">
										<div class="row">
											<input type="hidden" name="id" value="{{$upd->NIM}}" readonly="">
											
											
											<div class="col-sm-6">
												<div class="form-group form-group-default">
													<label>Nama Lengkap</label>
													<input type="text" name="nama" class="form-control" value="{{$upd->NAMA}}" required="" autocomplete="off">
												</div>
											</div>
											
											<div class="col-sm-6">
												<div class="form-group form-group-default">
													<label>Email</label>
													<input type="text" name="email" class="form-control" value="{{$upd->EMAIL}}" required="" autocomplete="off">
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group form-group-default">
													<label>Username</label>
													<input type="text" name="user" class="form-control" value="{{$upd->USERNAME}}" required="" autocomplete="off">
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group form-group-default">
													<label>Gender</label>
													<select class="form-control" name="gend" required="">
														@foreach($gen as $ge)
								                          	<?php if ($ge == $upd->GENDER){ ?>
								                               <option value="{{$ge}}" selected="">{{$ge}}</option>
								                            <?php }else{ ?>
								                              <option value="{{$ge}}">{{$ge}}</option>
								                            <?php }?>
								                        @endforeach
								                    </select>
												</div>
											</div>
											
											<div class="col-sm-6">
												<div class="form-group form-group-default">
													<label>Password</label>
													<input type="text" name="pass" class="form-control" value="{{$upd->PASSWORD}}" required="" autocomplete="off">
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group form-group-default">
													<label>No Ponsel</label>
													<input type="number" name="telp" class="form-control" value="{{$upd->NO_PONSEL}}" required="" autocomplete="off">
												</div>
											</div>
											
										</div>
								</div>
								<div class="modal-footer no-bd">
									<button type="button" class="btn btn-danger btn-round" data-dismiss="modal"><i class="fa fa-times-circle"></i> Batal</button>
									<button class="btn btn-dark btn-round"><i class="fa fa-check-circle"></i> Ubah</button>
								</div>
								</form>
								<?php } ?>
							</div>
						</div>
					</div>
				@endforeach
            	
			</div>
			
		</div>
		
		
		
		</div>
		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	<script src="assets/back/js/core/jquery.3.2.1.min.js"></script>
	<script src="assets/back/js/core/popper.min.js"></script>
	<script src="assets/back/js/core/bootstrap.min.js"></script>

	<script src="assets/back/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="assets/back/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<script src="assets/back/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

	<script src="assets/back/js/plugin/chart.js/chart.min.js"></script>

	<script src="assets/back/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<script src="assets/back/js/plugin/chart-circle/circles.min.js"></script>

	<script src="assets/back/js/plugin/datatables/datatables.min.js"></script>

	<script src="assets/back/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="assets/back/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<script src="assets/back/js/plugin/sweetalert/sweetalert.min.js"></script>

	<script src="assets/back/js/atlantis.min.js"></script>

	<script src="assets/back/js/setting-demo.js"></script>
	<script src="assets/back/js/demo.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script type="text/javascript">

	    $(document).ready(function() {
	    $(window).keydown(function(event){
	        if(event.keyCode == 116) {
	          event.preventDefault();
	          return false;
	        }
	      });
	    });


	    $(document).ready(function() {
	    $(window).keydown(function(event){
	        if(event.keyCode == 27) {
	          event.preventDefault();
	          return false;
	        }
	      });
	    });
	    

	    $(document).keydown(function(e){
	    if(e.which === 122){
	       return false;
	    }
	 
	  });

	  $(document).bind("contextmenu",function(e) { 
	  e.preventDefault();

	  }); 



	  	<?php 

	  		$jam = DB::SELECT("SELECT SELESAI FROM waktu WHERE WKT_ID = 1");
	  		foreach ($jam as $key) {
	  		
	  	?>

		var countDownDate = new Date("{{$key->SELESAI}}").getTime();

		// Update the count down every 1 second
		var x = setInterval(function() {

		  // Get today's date and time
		  var now = new Date().getTime();
		    
		  // Find the distance between now and the count down date
		  var distance = countDownDate - now;
		    
		  // Time calculations for days, hours, minutes and seconds
		  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
		    
		  // Output the result in an element with id="demo"
		  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
		  + minutes + "m " + seconds + "s ";
		    
		  // If the count down is over, write some text 
		  if (distance < 0) {
		    clearInterval(x);
		    document.getElementById("demo").innerHTML = "waktu telah habis";
		    window.location = "/habis";
		  }
		}, 1000);

		<?php } ?>

	</script>
	<!-- 	<script type="text/javascript">
		function launchFullScreen(element) {
		  if(element.requestFullScreen) {
		    element.requestFullScreen();
		  } else if(element.mozRequestFullScreen) {
		    element.mozRequestFullScreen();
		  } else if(element.webkitRequestFullScreen) {
		    element.webkitRequestFullScreen();
		  }
		}

		// Launch fullscreen for browsers that support it!
		launchFullScreen(document.documentElement); // the whole page
		launchFullScreen(document.getElementById("videoElement")); // any individual element
	 
	</script> -->
	
</body>
</html>