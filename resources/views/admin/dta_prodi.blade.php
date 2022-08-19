@extends('layout.layadm')


@section('menu')
	<ul class="nav nav-primary">
		<li class="nav-item">
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
		<li class="nav-item active">
			<a href="/dataprodi">
				<i class="fas fa-id-badge" style="-webkit-transform: rotate(13deg);transform: rotate(13deg);"></i>
				<p>Data Prodi</p>
			</a>
		</li>
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
						<a href="#">Data Prodi</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-7">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Data Program Studi</h4>
								
								<button class="btn btn-dark btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
									<i class="fa fa-plus-circle"> </i> Tambah Prodi
								</button>
						
							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="add-row" class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th style="text-align: center">Kode</th>
											<th style="text-align: center">Nama Program Studi</th>
											<th style="text-align: center;">Aksi</th>
										</tr>
									</thead>
									<style type="text/css">
										tbody tr td{
											padding: -30px;
										}
									</style>
									<tbody>
										@foreach($data as $dat)
										<tr>
											<td style="width: 10px;">{{$dat->KODE}}</td>
											<td>{{$dat->PRODI}}</td>
											<td style="width:70px;">
												<a class="btn btn-warning btn-round ml-auto btn-sm" data-toggle="modal" data-target="#edit{{$dat->KODE}}" style="color: white;"><i class="fa fa-pencil-alt" style="margin: -3px;"></i></a>
												<a href="/prodi:del={{$dat->KODE}}" onclick="return confirm('Apakah anda yakin akan menghapus Prodi ini? ');"class="btn btn-danger btn-round ml-auto btn-sm" style="color: white;"><i class="fa fa-trash" style="margin: -3px;"></i></a>
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

	<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h5 class="modal-title">
						<span class="fw-mediumbold">
						Tambah Prodi</span>
					</h5>
					<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button> -->
				</div>
				<form action="{{url('/add_prodi')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
				<div class="modal-body">
						<div class="row">
							
														
							<div class="col-sm-12">
								<div class="form-group form-group-default">
									<label>Kode Program Studi</label>
									<input type="text" name="kode" class="form-control" placeholder="K00000" autocomplete="off">
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group form-group-default">
									<label>Nama Program Studi</label>
									<input type="text" name="nama" class="form-control" placeholder="Manajemen" autocomplete="off">
								</div>
							</div>
						</div>
				</div>
				<div class="modal-footer no-bd">
					<button type="button" class="btn btn-danger btn-round" data-dismiss="modal"><i class="fa fa-times-circle"></i> Batal</button>
					<button class="btn btn-dark btn-round"><i class="fa fa-check-circle"></i> Simpan</button>
				</div>
				</form>
			</div>
		</div>
	</div>

	@foreach($data as $id)
	<div class="modal fade" id="edit{{$id->KODE}}" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h5 class="modal-title">
						<span class="fw-mediumbold">
						Edit Prodi</span>
					</h5>
				</div>
				<?php 

					$edit = DB::SELECT("select * from prodi where KODE = '$id->KODE'");

					foreach($edit as $upd){
				?>
				<form action="/prodi:upd={{$upd->KODE}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
				<div class="modal-body">
						<div class="row">
							<input type="hidden" name="id" value="{{$upd->KODE}}" readonly="">
							<div class="col-sm-12">
								<div class="form-group form-group-default">
									<label>Nama Program Studi</label>
									<input type="text" name="nama" class="form-control" value="{{$upd->PRODI}}" autocomplete="off">
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

@endsection