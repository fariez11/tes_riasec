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
		<li class="nav-item active">
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
						<a href="#">Data Soal</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Data Soal</h4>
								<?php 
									

									if(count($soal) == 42){
								?>	
									<button class="btn btn-dark btn-round ml-auto" disabled="">
										<i class="fa fa-plus-circle"> </i> Tambah Soal
									</button>
								<?php }else{ ?>
									<button class="btn btn-dark btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
										<i class="fa fa-plus-circle"> </i> Tambah Soal
									</button>
								<?php } ?>

								<button class="btn btn-dark btn-round ml-auto" data-toggle="modal" data-target="#waktu">
									<i class="fa fa-stopwatch"> </i> Waktu 
								</button>
							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="add-row" class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th>No</th>
											<!-- <th>KATEGORI</th> -->
											<th style="text-align: center">Soal</th>
											<th style="text-align: center">Kategori</th>
											<th style="text-align: center;">Aksi</th>
										</tr>
									</thead>
									<style type="text/css">
										tbody tr td{
											padding: -30px;
										}
									</style>
									<tbody>
										@foreach($soal as $soal)
										<tr>
											<td style="width: 10px;">{{$soal->SOAL_ID}}</td>
											<td>{{$soal->SOAL}}</td>
											<td>{{$soal->KATEGORI}}</td>
											<td>
												<a class="btn btn-warning btn-round ml-auto btn-sm" data-toggle="modal" data-target="#edit{{$soal->SOAL_ID}}" style="color: white;"><i class="fa fa-pencil-alt" style="margin: -3px;"></i></a>
												<a href="/soal:del={{$soal->SOAL_ID}}" onclick="return confirm('Apakah anda yakin akan menghapus soal ini? ');"class="btn btn-danger btn-round ml-auto btn-sm" style="color: white;"><i class="fa fa-trash" style="margin: -3px;"></i></a>
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
						Tambah Soal</span>
					</h5>
					<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button> -->
				</div>
				<form action="{{url('/add_soal')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
				<div class="modal-body">
						<div class="row">
							@foreach($ids as $ids)
							<input type="hidden" name="id" value="{{$ids->SOAL_ID+1}}" readonly="">
							@endforeach
							<div class="col-sm-12">
								<div class="form-group form-group-default">
									<label>Soal</label>
									<textarea id="addName" type="text" name="soal" class="form-control" placeholder="soal" style="resize: none;height: 100px;" required=""></textarea>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group form-group-default">
									<label>KATEGORI</label>
									<select class="form-control" name="kat">
										<option></option>
										@foreach($kat as $ka)
											<option>{{$ka}}</option>
										@endforeach
									</select>
								</div>
							</div>
							
						</div>
				</div>
				<div class="modal-footer no-bd">
					<button class="btn btn-danger btn-round" data-dismiss="modal"><i class="fa fa-times-circle"></i> Batal</button>
					<button class="btn btn-dark btn-round"><i class="fa fa-check-circle"></i> Simpan</button>
				</div>
				</form>
			</div>
		</div>
	</div>

	@foreach($eid as $id)
	<div class="modal fade" id="edit{{$id->SOAL_ID}}" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h5 class="modal-title">
						<span class="fw-mediumbold">
						Edit Soal</span>
					</h5>
					<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button> -->
				</div>
				<?php 

					$edit = DB::SELECT("select * from soal where SOAL_ID = '$id->SOAL_ID'");

					foreach($edit as $upd){
				?>
				<form action="/soal:upd={{$upd->SOAL_ID}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
				<div class="modal-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group form-group-default">
									<label>Soal</label>
									<textarea id="addName" type="text" name="soal" class="form-control" style="resize: none;height: 100px;" required="">{{$upd->SOAL}}</textarea>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group form-group-default">
									<label>KATEGORI</label>
									<select class="form-control" name="kat">
										@foreach($kat as $ka)
				                          	<?php if ($ka == $upd->KATEGORI){ ?>
				                               <option value="{{$ka}}" selected="">{{$ka}}</option>
				                            <?php }else{ ?>
				                              <option value="{{$ka}}">{{$ka}}</option>
				                            <?php }?>
				                        @endforeach
				                    </select>
								</div>
							</div>
						</div>
				</div>
				<div class="modal-footer no-bd">
					<button class="btn btn-danger btn-round" data-dismiss="modal"><i class="fa fa-times-circle"></i> Batal</button>
					<button class="btn btn-dark btn-round"><i class="fa fa-check-circle"></i> Ubah</button>
				</div>
				</form>
				<?php } ?>
			</div>
		</div>
	</div>
	@endforeach

	
	<div class="modal fade" id="waktu" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h5 class="modal-title">
						<span class="fw-mediumbold">Pengaturan Waktu</span>
					</h5>
				</div>
				<?php 

					$wkt = DB::SELECT("SELECT * FROM waktu WHERE WKT_ID = '1'");

					foreach($wkt as $upd){
				?>
				<form action="/update_waktu" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
				<div class="modal-body">
						<div class="row">
							<!-- <div class="col-md-6" style="text-align:center;font-weight: bold;">
								Mulai Pada <?= date('d M Y H:i',strtotime($upd->MULAI)); ?>
							</div>
							<div class="col-md-6" style="text-align:center;font-weight: bold;">
								Selesai Pada <?= date('d M Y H:i',strtotime($upd->SELESAI)); ?>
							</div>
							<br><br> -->
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Mulai</label>
									<input type="datetime-local" name="mulai" class="form-control" required="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Selesai</label>
									<input type="datetime-local" name="selesai" class="form-control" required="">
								</div>
							</div>
							
						</div>
				</div>
				<div class="modal-footer no-bd">
					<button class="btn btn-danger btn-round" data-dismiss="modal"><i class="fa fa-times-circle"></i> Batal</button>
					<button class="btn btn-dark btn-round"><i class="fa fa-check-circle"></i> Ubah</button>
				</div>
				</form>
				<?php } ?>
			</div>
		</div>
	</div>

@endsection