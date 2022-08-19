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
		<li class="nav-item active">
			<a data-toggle="collapse" href="#tables2">
				<i class="fas fa-table"  style="-webkit-transform: rotate(15deg);transform: rotate(15deg);"></i>
				<p>Data Hasil</p>
				<span class="caret"></span>
			</a>
			<div class="collapse" id="tables2">
				<ul class="nav nav-collapse">
					@foreach($mprodi as $mpro)
						<?php if ($mpro->KODE == $idpro){ ?>
							<li class="active">
								<a href="/prodi:mhs={{$mpro->KODE}}">
									<span class="sub-item">{{$mpro->PRODI}}</span>
								</a>
							</li>
						<?php }else{ ?>
							<li>
								<a href="/prodi:mhs={{$mpro->KODE}}">
									<span class="sub-item">{{$mpro->PRODI}}</span>
								</a>
							</li>
						<?php }?>
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
				<div class="col-md-9">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<form action="/prodi:mhs={{$idpro}}" style="width:100%;">
									{{csrf_field()}}
									<div class="row" style="width:100%;">
										<div class="col-md-7" style="padding-top:11px;">
											<h4 class="card-title">Data Hasil</h4>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<!-- <label for="email2">Prodi</label> -->
												<select name="tahun" class="form-control">
		                                                <?php
		                                                $thn_skr = date('Y');
		                                                for ($x = $thn_skr; $x >= 2016; $x--) {
		                                                ?>
		                                                    <option value="<?php echo $x ?>"><?php echo $x ?></option>
		                                                <?php
		                                                }
		                                                ?>
		                                            </select> 
											</div>
										</div>	
										<div class="col-md-2" style="padding-top: 8px;">
											<button class="btn btn-dark"><i class="fas fa-search" ></i> Cari</button>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="add-row" class="display table table-striped table-hover">
									<thead>
										<tr>
											<th style="text-align: center">NIM</th>
											<th style="text-align: center">Nama</th>
											<th style="text-align: center">Karakter</th>
											<!-- <th style="text-align: center">Tanggal</th> -->
											<th style="text-align: center">Reset</th>
										</tr>
									</thead>
									<style type="text/css">
										tbody tr td{
											padding: -30px;
										}
									</style>
									<tbody>
										@foreach($hmhs as $detmhs)
										<tr>
											<td style="width: 10px;">{{$detmhs->NIM}}</td>
											<td>{{$detmhs->NAMA}}</td>
											<td style="text-align: center">{{$detmhs->KARAKTER}}</td>
											<!-- <td style="text-align: center"> <?= date('d M Y',strtotime($detmhs->TGL)); ?> </td> -->
											
											<td style="text-align: center;width: 10%;">
												<a href="/hasil:res={{$detmhs->NIM}}" onclick="return confirm('Apakah anda yakin akan mereset hasil  mahasiswa ini? ');" style="color: red;">
													<i class="fa fa-redo-alt"></i>
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

				<div class="col-md-3">
							<div class="card card-profile">
								
								<div class="card-header" style="padding-bottom: -15px;">
									<center>
									<div class="name" style="font-size: 16px;margin-bottom:8px;">@foreach($prodi as $prod) {{$prod->PRODI}} @endforeach</div>
									
									
									<div class="number">@foreach($jmhs as $jmh) {{$jmh->jum}} Mahasiswa @endforeach</div>
									</center>
								</div>
								<div class="card-body">
									<div class="user-profile text-center">
										
										
										<!-- <div class="job">Frontend Developer</div> -->
										<div class="desc">
											<canvas id="mychart" height="250px"></canvas>
										</div>
									</div>
								</div>
								<div class="card-footer">
									<div class="row user-stats text-center">
										@foreach($sql as $tampil)
										<div class="col-md-9">
											<div class="number" style="text-align: left;">{{$tampil->kar}}</div>
											<!-- <div class="title">Jurusan</div> -->
										</div>
										<div class="col-md-3">
											<!-- <div class="number">{{$tampil->hasil}}</div> -->
											<div class="title">
												@if($tampil->hasil == null)
													
													<span style="color:lightgrey;">0</span>
												
												@else
													
													{{$tampil->hasil}}
												
												@endif
											</div>
										</div>

										@endforeach
									</div>
								</div>

							</div>
						</div>

			</div>

		</div>
	</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>
<script type="text/javascript">
	

var chartData = [<?php foreach($sql as $ju){?>{"visitor": '<?php echo $ju->per; ?>', "visit": '<?php echo $ju->kar; ?>'}, <?php } ?>]

var visitorData = [],
    sum = 0,
    visitData = [];

for (var i = 0; i < chartData.length; i++) {
    visitorData.push(chartData[i]['visitor'])
    visitData.push(chartData[i]['visit'])
  
    sum += chartData[i]['visitor'];
}

var textInside = sum.toString();

var myChart = new Chart(document.getElementById('mychart'), {
    type: 'doughnut',
    animation:{
        animateScale:true
    },
    data: {
        labels: visitData,
        datasets: [{
            label: 'Visitor',
            data: visitorData,
            backgroundColor: [
                "#3ba1ff",
                "#40a6ff",
                "#47adff",
                "#4fb5ff",
                "#57bdff",
                "#5ec4ff",
                "#66ccff"
            ]
        }]
    },
    options: {
        elements: {
          center: {
            text: textInside
          }
        },
        responsive: true,
        legend: false,
        tooltips: {
             enabled: true,
             mode: 'label',
             callbacks: {
                label: function(tooltipItem, data) {
                    var indice = tooltipItem.index;
                    return  data.labels[indice] + " : " + data.datasets[0].data[indice] + '%';
                }
             }
         },
    }
});


</script>
@endsection