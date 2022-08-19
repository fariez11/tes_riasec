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
		<li class="nav-item">
			<a href="/dataprodi">
				<i class="fas fa-id-badge" style="-webkit-transform: rotate(13deg);transform: rotate(13deg);"></i>
				<p>Data Prodi</p>
			</a>
		</li>
		<li class="nav-item active">
			<a data-toggle="collapse" href="#tables1">
				<i class="fas fa-user-friends" style="-webkit-transform: rotate(15deg);transform: rotate(15deg);"></i>
				<p>Data Mahasiswa</p>
				<span class="caret"></span>
			</a>
			<div class="collapse" id="tables1">
				<ul class="nav nav-collapse">
					@foreach($mprodi as $mpro)
						<?php if ($mpro->KODE == $idpro){ ?>
							<li class="active">
								<a href="/mhs:prodi={{$mpro->KODE}}">
									<span class="sub-item">{{$mpro->PRODI}}</span>
								</a>
							</li>
						<?php }else{ ?>
							<li>
								<a href="/mhs:prodi={{$mpro->KODE}}">
									<span class="sub-item">{{$mpro->PRODI}}</span>
								</a>
							</li>
						<?php }?>
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
						<a href="#">Data Mahasiswa</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">@foreach($sespro as $sep) {{$sep->PRODI}} @endforeach</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Data Mahasiswa Program Studi @foreach($sespro as $sep) {{$sep->PRODI}} @endforeach</h4>
								
							</div>
						</div>
						<div class="card-body">
							<form action="{{ ('/imp_mhs') }}" method="post" enctype="multipart/form-data">
							{{csrf_field()}}
							<div class="row">
								<div class="col-sm-3">
									<div class="form-group">
										<label for="email2">Import File</label>
										<input type="file" name="file" class="form-control">
										
										<span style="color:red;margin-top: -10px;">ekstensi file : .xlsx </span>
									</div>
									<br>
								</div>
								
								<div class="col-sm-4">
									<div class="form-group">
										<label for="email2">Prodi</label>
										<select class="form-control" name="prodi" required="">
											<option></option>
											@foreach($prodi as $pro)
											<option value="{{$pro->KODE}}"> {{$pro->PRODI}}</option>
											@endforeach
										</select>
									</div>
								</div>	
								<div class="col-sm-3" style="padding-top: 37px;">
									<button class="btn btn-dark"><i class="fas fa-file-import" ></i> Import</button>
								</div>	
								<div class="col-sm-2" style="padding-top: 37px;">
									 <a class="btn btn-dark ml-auto" data-toggle="modal" data-target="#addmhs" style="color: white;">
										<i class="fa fa-plus-circle"> </i> Tambah data
									</a>
								</div>	
							</div>
							</form>
							<div class="table-responsive">
								<table id="add-row" class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th style="text-align: center">#</th>
											<th style="text-align: center">NIM</th>
											<th style="text-align: center">Nama</th>
											<th style="text-align: center">Email</th>
											<th style="text-align: center">Gender</th>
											<!-- <th style="text-align: center">Username</th> -->
											<th style="text-align: center;">Aksi</th>
										</tr>
									</thead>
									<style type="text/css">
										tbody tr td{
											padding: -30px;
										}
									</style>
									<tbody>
										@php $no = 1; @endphp
										@foreach($emhs as $dat)
										<tr>
											<td style="width: 5px;">{{$no++}}</td>
											<td style="width: 10px;">{{$dat->NIM}}</td>
											<td>{{$dat->NAMA}}</td>
											<td>{{$dat->EMAIL}}</td>
											<td>{{$dat->GENDER}}</td>
											<!-- <td style="text-align: center">{{$dat->USERNAME}}</td> -->
											<td style="text-align: center; width: 110px;">
												<a class="btn btn-info btn-round ml-auto btn-sm" data-toggle="modal" data-target="#det{{$dat->NIM}}" style="color: white;">
													<i class="fa fa-info" style="margin: -0.5px;"></i>
												</a>
												<a class="btn btn-warning btn-round ml-auto btn-sm" data-toggle="modal" data-target="#edit{{$dat->NIM}}" style="color: white;">
													<i class="fa fa-pencil-alt" style="margin: -3px;"></i>
												</a>
												<a href="/mhs:del={{$dat->NIM}}" onclick="return confirm('Apakah anda yakin akan menghapus data mahasiswa ini? ');"class="btn btn-danger btn-round ml-auto btn-sm" style="color: white;">
													<i class="fa fa-trash" style="margin: -3px;"></i>
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


	<div class="modal fade" id="addmhs" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">
                        Tambah Mahasiswa</span>
                    </h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <form action="{{url('/add_mhs')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                <div class="modal-body">
                    <div class="row">
                        
                        <div class="col-md-6">

                            <div class="form-group form-group-default">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Ahmad Abdul" autocomplete="off" required="">
                            </div>
                            <div class="form-group form-group-default">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="emailanda@gmail.com" autocomplete="off" required="">
                            </div>
                            <div class="form-group form-group-default">
                                <label>Username</label>
                                <input type="text" name="user" class="form-control" placeholder="admin" autocomplete="off" required="">
                            </div>
                            <div class="form-group form-group-default">
                                <label>Password</label>
                                <input type="text" name="pass" class="form-control" placeholder="admin" autocomplete="off" required="">
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="form-group form-group-default">
                                <label>Nama Program Studi</label>
                                <select class="form-control" name="prodi" required="">
                                    <option></option>
                                    @foreach($prodi as $prd)
                                        <option value="{{$prd->KODE}}">{{$prd->PRODI}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group form-group-default">
                                <label>Nomer Induk Mahasiswa</label>
                                <input type="number" name="nim" class="form-control"  placeholder="36XXXXXXXXXX" min="360000000000" autocomplete="off" required="">
                            </div>
                            
                            <div class="form-group form-group-default">
                                <label>Gender</label>
                                <select class="form-control" name="gend" required="">
                                    <option></option>
                                    @foreach($gen as $ge)
                                        <option>{{$ge}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group form-group-default">
                                <label>Nomer Ponsel</label>
                                <input type="number" name="no" class="form-control" placeholder="089XXXXXXX" autocomplete="off" required="">
                            </div>

                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button  type="button" class="btn btn-danger btn-round" data-dismiss="modal"><i class="icon icon-close"></i> Batal</button>
                    <button class="btn btn-dark btn-round"><i class="icon icon-check"></i> Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>


	@foreach($emhs as $emh)
	<div class="modal fade" id="det{{$emh->NIM}}" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h5 class="modal-title">
						<span class="fw-mediumbold">
						Detail Mahasiswa</span>
					</h5>
				</div>

				<?php 

					$edit = DB::SELECT("SELECT * FROM mhs b, prodi c WHERE b.KODE = c.KODE AND b.NIM = '$emh->NIM'");

					foreach($edit as $upd){
				?>
				<form action="/mhs:upd={{$upd->NIM}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
				<div class="modal-body">
						<div class="row">
							<input type="hidden" name="id" value="{{$upd->NIM}}" readonly="">
							
							<div class="col-md-12">

								<style>
									table tr td{
										padding: 10px;
									}
								</style>
								<table>
									<tr>
										<td>Nomor Induk Mahasiswa</td>
										<td>:</td>
										<td>{{$upd->NIM}}</td>
									</tr>
									<tr>
										<td>Nama Lengkap</td>
										<td>:</td>
										<td>{{$upd->NAMA}}</td>
									</tr>
									<tr>
										<td>Email</td>
										<td>:</td>
										<td>{{$upd->EMAIL}}</td>
									</tr>
									<tr>
										<td>Username</td>
										<td>:</td>
										<td>{{$upd->USERNAME}}</td>
									</tr>
									<tr>
										<td>Password</td>
										<td>:</td>
										<td>{{$upd->PASSWORD}}</td>
									</tr>
									<tr>
										<td>Program Studi</td>
										<td>:</td>
										<td>{{$upd->PRODI}}</td>
									</tr>
									<tr>
										<td>Gender</td>
										<td>:</td>
										<td>{{$upd->GENDER}}</td>
									</tr>
									<tr>
										<td>No Ponsel</td>
										<td>:</td>
										<td>{{$upd->NO_PONSEL}}</td>
									</tr>
								</table>
							</div>
							
						</div>
				</div>
				<div class="modal-footer no-bd">
					<button type="button" class="btn btn-dark btn-round" data-dismiss="modal"><i class="fa fa-times-circle"></i> Tutup</button>
				</div>
				</form>
				<?php } ?>
			</div>
		</div>
	</div>
	@endforeach



	@foreach($emhs as $emh)
		<div class="modal fade" id="edit{{$emh->NIM}}" tabindex="-1" role="dialog" aria-hidden="true">
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

						foreach($edit as $upd){
					?>
					<form action="/mhs:upd={{$upd->NIM}}" method="post" enctype="multipart/form-data">
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
										<label>No Induk Mahasiswa</label>
										<input type="number" name="nim" class="form-control" value="{{$upd->NIM}}" required="" autocomplete="off">
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
										<label>Program Studi</label>
										<select class="form-control" name="prodi" required="">
											@foreach($prodi as $pr)
					                          	<?php if ($pr->KODE == $upd->KODE){ ?>
					                               <option value="{{$pr->KODE}}" selected="">{{$pr->PRODI}}</option>
					                            <?php }else{ ?>
					                              <option value="{{$pr->KODE}}">{{$pr->PRODI}}</option>
					                            <?php }?>
					                        @endforeach
					                    </select>
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

		

@endsection