@extends('layout.layadm')


@section('menu')
	<ul class="nav nav-primary">
		<li class="nav-item active">
			<a href="/admin">
				<i class="fas fa-home"></i>
				<p>Dashboard</p>
			</a>
		</li>
		<li class="nav-section">
			<span class="sidebar-mini-icon">
				<i class="fa fa-ellipsis-h"></i>
			</span>
			<h4 class="text-section">Data</h4>
		</li>
		<li class="nav-item">
			<a href="/datasoal">
				<i class="fas fa-clipboard-list" style="-webkit-transform: rotate(15deg);transform: rotate(15deg);"></i>
				<p>Data Soal</p>
				<!-- <span class="caret"></span> -->
			</a>
		</li>
		<li class="nav-item">
			<a href="/dataprodi">
				<i class="fas fa-id-badge" style="-webkit-transform: rotate(13deg);transform: rotate(13deg);"></i>
				<p>Data Prodi</p>
				<!-- <span class="caret"></span> -->
			</a>
		</li>
		<!-- <li class="nav-item active">
			<a href="/datamhs">
				<i class="fas fa-user-friends" style="-webkit-transform: rotate(13deg);transform: rotate(13deg);"></i>
				<p>Data Mahasiswa</p>
			</a>
		</li> -->
		<li class="nav-item">
			<a data-toggle="collapse" href="#tables1">
				<i class="fas fa-user-friends" style="-webkit-transform: rotate(15deg);transform: rotate(15deg);"></i>
				<p>Data Mahasiswa</p>
				<span class="caret"></span>
			</a>
			<div class="collapse" id="tables1">
				<ul class="nav nav-collapse">
					@foreach($mprodi as $mpro)
					<li>
						<a href="/mhs:prodi={{$mpro->KODE}}">
							<span class="sub-item">{{$mpro->PRODI}}</span>
						</a>
					</li>
					@endforeach
				</ul>
			</div>
		</li>
		<li class="nav-item">
			<a data-toggle="collapse" href="#tables2">
				<i class="fas fa-table"  style="-webkit-transform: rotate(15deg);transform: rotate(15deg);"></i>
				<p>Data Hasil</p>
				<span class="caret"></span>
			</a>
			<div class="collapse" id="tables2">
				<ul class="nav nav-collapse">
					@foreach($mprodi as $mpro)
					<li>
						<a href="/prodi:mhs={{$mpro->KODE}}">
							<span class="sub-item">{{$mpro->PRODI}}</span>
						</a>
					</li>
					@endforeach
				</ul>
			</div>
		</li>
	</ul>
@endsection



@section('content')

		
			<div class="content">
				<div class="panel-header" style="background-color:#252b40;">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Beranda</h2>
								<!-- <h5 class="text-white op-7 mb-2">Free Bootstrap 4 Admin Dashboard</h5> -->
							</div>
							<!-- <div class="ml-md-auto py-2 py-md-0">
								<a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
								<a href="#" class="btn btn-secondary btn-round">Add Customer</a>
							</div> -->
						</div>
					</div>
				</div>
				
				<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-7">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Overall statistics</div>
									<div class="card-category">Daily information about statistics in system</div>
									<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-4"></div>
											<h6 class="fw-bold mt-3 mb-0">Jumlah Prodi</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-1"></div>
											<h6 class="fw-bold mt-3 mb-0">Jumlah Soal</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-2"></div>
											<h6 class="fw-bold mt-3 mb-0">Jumlah Mahasiswa</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-3"></div>
											<h6 class="fw-bold mt-3 mb-0">Mahasiswa Selesai</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
					
					</div>
				</div>
			</div>
			
			
	<!-- Chart Circle -->
	<script src="assets/back/js/plugin/chart-circle/circles.min.js"></script>
			<script type="text/javascript">
		
				Circles.create({
					id:'circles-1',
					radius:45,
					value:100,
					maxValue:100,
					width:7,
					text: <?php echo $soal ?>,
					colors:['#f1f1f1', '#252b40'],
					duration:400,
					wrpClass:'circles-wrp',
					textClass:'circles-text',
					styleWrapper:true,
					styleText:true
				})

			
				Circles.create({
					id:'circles-2',
					radius:45,
					value:100,
					maxValue:100,
					width:7,
					text: <?php echo $mhs?>,
					colors:['#f1f1f1', '#252b40'],
					duration:400,
					wrpClass:'circles-wrp',
					textClass:'circles-text',
					styleWrapper:true,
					styleText:true
				})
			

			<?php foreach($hasil as $hsl){ ?>	
				Circles.create({
					id:'circles-3',
					radius:45,
					value:100,
					maxValue:100,
					width:7,
					text: <?php echo $hsl->jum ?>,
					colors:['#f1f1f1', '#252b40'],
					duration:400,
					wrpClass:'circles-wrp',
					textClass:'circles-text',
					styleWrapper:true,
					styleText:true
				})
			<?php }?>

			
				Circles.create({
					id:'circles-4',
					radius:45,
					value:100,
					maxValue:100,
					width:7,
					text: <?php echo $prodi ?>,
					colors:['#f1f1f1', '#252b40'],
					duration:400,
					wrpClass:'circles-wrp',
					textClass:'circles-text',
					styleWrapper:true,
					styleText:true
				})
			</script>
@endsection