<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Tes Riasec - Admin</title>
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
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="dark">
				
				<a href="/admin" class="logo" style="color:white;font-size: 20px;font-family: sans-serif;margin-bottom: -8px;">
					<!-- <img src="assets/back/img/logo.svg" alt="navbar brand" class="navbar-brand"> -->
					<img src="assets/img/logo.png" alt="navbar brand" class="navbar-brand" style="width:15%;margin-top:-8px;margin-right: 7px;"><b>TES</b>RIASEC
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<!-- <form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form> -->
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<!-- <li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li> -->
						<!-- s -->
						<li class="nav-item dropdown hidden-caret">
							<!-- <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bell"></i>
								<span class="notification">4</span>
							</a> -->
							<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
								<li>
									<div class="dropdown-title">You have 4 new notification</div>
								</li>
								<li>
									<div class="notif-scroll scrollbar-outer">
										<div class="notif-center">
											<a href="#">
												<div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
												<div class="notif-content">
													<span class="block">
														New user registered
													</span>
													<span class="time">5 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-icon notif-success"> <i class="fa fa-comment"></i> </div>
												<div class="notif-content">
													<span class="block">
														Rahmad commented on Admin
													</span>
													<span class="time">12 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-img"> 
													<img src="assets/back/img/profile2.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="block">
														Reza send messages to you
													</span>
													<span class="time">12 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-icon notif-danger"> <i class="fa fa-heart"></i> </div>
												<div class="notif-content">
													<span class="block">
														Farrah liked Admin
													</span>
													<span class="time">17 minutes ago</span> 
												</div>
											</a>
										</div>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
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
												<h4>{{Session::get('nama')}}</h4>
												<p class="text-muted">{{Session::get('email')}}</p><!-- <a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a> -->
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#" data-toggle="modal" data-target="#ed{{Session::get('nim')}}">Edit Profile</a>
										<!-- <a class="dropdown-item" href="#">My Balance</a>
										<a class="dropdown-item" href="#">Inbox</a> -->
										<!-- <div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Account Setting</a> -->
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="/logout">Logout</a>
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
		<div class="sidebar sidebar-style-2" data-background-color="dark2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="assets/back/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									{{Session::get('nama')}}
									<span class="user-level">{{Session::get('level')}}</span>
									<!-- <span class="caret"></span> -->
								</span>
							</a>
							<div class="clearfix"></div>

							<!-- <div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div> -->
						</div>
					</div>
					
					
					@yield('menu')
				</div>
			</div>
		</div>

		<div class="main-panel">



		@yield('content')



		<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="https://www.themekita.com">
									ThemeKita
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Help
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Licenses
								</a>
							</li>
						</ul>
					</nav>
					<div class="copyright ml-auto">
						2018, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.themekita.com">ThemeKita</a>
					</div>				
				</div>
			</footer>
		</div>


		<?php $ed = DB::SELECT("SELECT*FROM mhs"); ?>	
		@foreach($ed as $emh)
		<div class="modal fade" id="ed{{$emh->NIM}}" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header no-bd">
						<h5 class="modal-title">
							<span class="fw-mediumbold">
							Edit Profil</span>
						</h5>
					</div>

					<?php 

						$edit = DB::SELECT("SELECT * FROM mhs WHERE NIM = '$emh->NIM'");
						$gen = array("Laki-laki","Perempuan");

						foreach($edit as $upd){
					?>
					<form action="/admin:upd={{$upd->NIM}}" method="post" enctype="multipart/form-data">
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
		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	<script src="assets/back/js/core/jquery.3.2.1.min.js"></script>
	<script src="assets/back/js/core/popper.min.js"></script>
	<script src="assets/back/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="assets/back/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="assets/back/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="assets/back/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="assets/back/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="assets/back/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>


	<!-- Datatables -->
	<script src="assets/back/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<!-- <script src="assets/back/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script> -->

	<!-- jQuery Vector Maps -->
	<script src="assets/back/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="assets/back/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="assets/back/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="assets/back/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="assets/back/js/setting-demo.js"></script>
	<script src="assets/back/js/demo.js"></script>
	<script>


		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 10,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 10,
				"ordering": false,
			});


			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});

		
		

		var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

		var mytotalIncomeChart = new Chart(totalIncomeChart, {
			type: 'bar',
			data: {
				labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
				datasets : [{
					label: "Total Income",
					backgroundColor: '#ff9e27',
					borderColor: 'rgb(23, 125, 255)',
					data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					display: false,
				},
				scales: {
					yAxes: [{
						ticks: {
							display: false //this will remove only the label
						},
						gridLines : {
							drawBorder: false,
							display : false
						}
					}],
					xAxes : [ {
						gridLines : {
							drawBorder: false,
							display : false
						}
					}]
				},
			}
		});

		$('#lineChart').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#ffa534',
			fillColor: 'rgba(255, 165, 52, .14)'
		});


		
	</script>
</body>
</html>