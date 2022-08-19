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
			</a>
		</li>
		<li class="nav-item">
			<a href="/dataprodi">
				<i class="fas fa-id-badge" style="-webkit-transform: rotate(13deg);transform: rotate(13deg);"></i>
				<p>Data Prodi</p>
			</a>
		</li>
		<li class="nav-item">
			<a data-toggle="collapse" href="#tables">
				<i class="fas fa-user-friends" style="-webkit-transform: rotate(15deg);transform: rotate(15deg);"></i>
				<p>Data Mahasiswa</p>
				<span class="caret"></span>
			</a>
			<div class="collapse" id="tables">
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
			<a data-toggle="collapse" href="#tables">
				<i class="fas fa-table"  style="-webkit-transform: rotate(15deg);transform: rotate(15deg);"></i>
				<p>Data Hasil</p>
				<span class="caret"></span>
			</a>
			<div class="collapse" id="tables">
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
		
		<div class="page-inner">
			<div class="page-header">
				<!-- <h4 class="page-title">DataTables</h4> -->
				<ul class="breadcrumbs">
					<li class="nav-home">
						<a href="#">
							<i class="flaticon-home"></i>
						</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Data</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Data Hasil Tes</a>
					</li>
				</ul>
			</div>
			<div class="row">	
				<div class="col-md-12">
					<?php if(Session::get('kosong')){ ?>
		        		<div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 5px;">
						  <strong style="margin-right: 10px;">Mohon Maaf!!</strong>  Data yang anda cetak kosong
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top: -11px;">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>
					<?php }else{ ?>
						
					<?php }?>
	        	</div>
				<div class="col-md-12">
					<div class="card">
						
						<div class="card-body">
							<div class="table-responsive">
								<table id="add-row" class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th style="text-align: center">NIM</th>
											<th style="text-align: center">Nama</th>
											<th style="text-align: center">No Ponsel</th>
											<th style="text-align: center">Karakter</th>
											<th style="text-align: center">Tanggal</th>
											<th style="text-align: center">Aksi</th>
										</tr>
									</thead>
									<style type="text/css">
										tbody tr td{
											padding: -30px;
										}
									</style>
									<tbody>
										@foreach($sql as $mhs)
										<tr>
											<td style="width: 10px;">{{$mhs->NIM}}</td>
											<td style="text-align: center">{{$mhs->NAMA}}</td>
											<td style="text-align: center">{{$mhs->NO_PONSEL}}</td>
											<?php 
												$kat = DB::SELECT("SELECT JAWABAN,TGL, COUNT(JAWABAN) as jum FROM jawab WHERE NIM = '$mhs->NIM' AND JAWABAN NOT LIKE '-' GROUP BY JAWABAN ORDER BY count(JAWABAN) DESC limit 1");
												foreach($kat as $kat){
											?>
											<td style="text-align: center">{{$mhs->KARAKTER}}</td>
											<td style="text-align: center"> <?= date('d M Y',strtotime($kat->TGL)); ?> </td>
											<?php } ?>
											<td style="text-align: center">
												<a href="/hasil:res={{$mhs->NIM}}" onclick="return confirm('Apakah anda yakin akan mereset hasil  mahasiswa ini? '); "class="btn btn-danger btn-round ml-auto btn-sm" style="color: white;">
													<i class="fa fa-redo-alt" style="margin: -3px;"></i>
												</a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

@endsection