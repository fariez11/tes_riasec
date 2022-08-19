@extends('layout.laymhs')


@section('menu')
	<ul class="nav nav-primary">
		<li class="nav-item active">
			<a href="/hasil">
				<i class="fas fa-percent"></i>
				<p>Hasil</p>
			</a>
		</li>
		
	</ul>
@endsection



@section('content')

		
			<div class="content">
				<div class="panel-header" style="background-color:#252b40;">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Hasil Tes</h2>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-6">
							<div class="card full-height card-annoucement card-round" style="background-color: #1A2035;color: white;">

								@foreach($datm as $datm)
								<div class="card-body">
									<div class="card-opening">Selamat Untuk {{$datm->NAMA}}</div>
									<div class="card-desc">
										<!-- Congrats and best wishes for success in your brand new life!
										I knew that you would do this! -->
										<table>
											<tr>
												<td>No Induk Mahasiswa</td>
												<td style="padding: 0px 10px 0px 10px;">:</td>
												<td>{{$datm->NIM}}</td>
											</tr>
											<tr>
												<td>Program Studi</td>
												<td style="padding: 0px 10px 0px 10px;">:</td>
												<td>{{$datm->PRODI}}</td>
											</tr>
											<tr>
												<td>Email</td>
												<td style="padding: 0px 10px 0px 10px;">:</td>
												<td>{{$datm->EMAIL}}</td>
											</tr>
											<tr>
												<td>Gender</td>
												<td style="padding: 0px 10px 0px 10px;">:</td>
												<td>{{$datm->GENDER}}</td>
											</tr>
											<tr>
												<td>Nomor Ponsel</td>
												<td style="padding: 0px 10px 0px 10px;">:</td>
												<td>{{$datm->NO_PONSEL}}</td>
											</tr>
										</table>
									</div><!-- 
									<div class="card-detail">
										<div class="btn btn-light btn-rounded">View Detail</div>
									</div> -->
								</div>
								@endforeach
							</div>
						</div>
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title"></div>
									<div class="card-category">Berikut adalah 3 besar pilihan paling banyak</div>
									
									<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
										@foreach($result as $has)
											<div class="px-2 pb-2 pb-md-0 text-center">
												<div id="circles-<?php echo $has->JAWABAN?>"></div>
												<h6 class="fw-bold mt-3 mb-0">{{$has->JAWABAN}}</h6>
											</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
					<center>
					<div class="row row-card-no-pd">
						<div class="col-md-12">
							<div class="card">
								<?php 

								foreach ($lim as $lim) {
									$kat = $lim->JAWABAN;
								}

								$sql = DB::SELECT("select*from karakter where KAR_ID = '$kat'");
								foreach($sql as $sql){

								?>
								<div class="card-header">
									<div class="card-head-row card-tools-still-right">
										<h4 class="card-title">{{$sql->KAR_ID}}</h4>
									</div>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-3" style="background-image: url(assets/img/banner_bg.png);background-size: 100% 100%;">
											<center>
												<img src="assets/img/{{$sql->GAMBAR}}" height="240">
											</center>
										</div>
										<div class="col-md-6">
											<pre class="card-category" style="font-size: 17px;text-align: justify;font-family: lato;white-space: pre-line;">
													{{$sql->DESKRIPSI}}
											</pre>												
										</div>
										<div class="col-md-3">
											<pre class="card-category" style="font-size: 17px;text-align: left;font-family: lato;white-space: pre-line;">
												{{$sql->BIDANG}}
											</pre>
										</div>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
					</center>
				</div>

			</div>
			
		<script src="assets/back/js/plugin/chart-circle/circles.min.js"></script>
		<script type="text/javascript">
		
		<?php foreach($result as $has){ ?>	
		Circles.create({
			id:'circles-<?php echo $has->JAWABAN?>',
			radius:45,
			value:<?php echo $has->jum/7*100;?>,
			maxValue:100,
			width:7,
			text: <?php echo $has->jum?>,
			colors:['#f1f1f1', '#242b40'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		<?php }?>

		
		</script>

@endsection