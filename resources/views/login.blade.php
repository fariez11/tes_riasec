<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/img/logo.png" type="image/x-icon"/>
    <title>Tes Riasec - Log In</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
   
</head>
<style type="text/css">
body{
    background-image: url(assets/img/back.jpg);
    background-size: 100% 100%;
}

.registration-form{
    padding: 50px 0;
}

.registration-form form{
    background-color: #fff;
    max-width: 400px;
    margin: auto;
    padding: 30px 30px;
    border-top-left-radius: 30px;
    border-top-right-radius: 30px;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
}

.registration-form .form-icon{
    text-align: center;
    background-color: #5891ff;
    border-radius: 50%;
    font-size: 40px;
    color: white;
    width: 100px;
    height: 100px;
    margin: auto;
    margin-bottom: 40px;
    line-height: 100px;
}

.registration-form .item{
    border-radius: 20px;
    margin-bottom: 25px;
    padding: 10px 20px;
}

.registration-form .create-account{
    border-radius: 30px;
    padding: 10px 20px;
    font-size: 18px;
    font-weight: bold;
    background-color: #5791ff;
    border: none;
    color: white;
    margin-top: 20px;
}

.registration-form .social-media{
    max-width: 400px;
    background-color: #fff;
    margin: auto;
    padding: 35px 0;
    text-align: center;
    border-bottom-left-radius: 30px;
    border-bottom-right-radius: 30px;
    color: #9fadca;
    border-top: 1px solid #dee9ff;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
}

.registration-form .social-icons{
    margin-top: 20px;
    margin-bottom: 16px;
}

.registration-form .social-icons a{
    font-size: 23px;
    margin: 0 3px;
    color: #5691ff;
    border: 1px solid;
    border-radius: 50%;
    width: 45px;
    display: inline-block;
    height: 45px;
    text-align: center;
    background-color: #fff;
    line-height: 45px;
}

.registration-form .social-icons a:hover{
    text-decoration: none;
    opacity: 0.6;
}

@media (max-width: 566px) {
    .registration-form form{
        padding: 50px 20px;
    }

    .registration-form .form-icon{
        width: 70px;
        height: 70px;
        font-size: 30px;
        line-height: 70px;
    }
}
</style>
<body>
    <div class="registration-form">
        <div class="row" style="margin: 0px;">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                
                <form action="/actlog" method="get" style="background-color: rgba(0,0,0,0.3);">
                    <div class="form-icon" style="background-color:#0D386B;">
                        <span><i class="icon icon-user"></i></span>
                    </div>
                    <?php if(Session::get('addmhs')){ ?>
                        <div class="alert" style=" color: #004085; background-color: #cce5ff; border-color: #b8daff;margin-bottom: 0px;margin-top: -10px;">
                            <button type="button" class="close" data-dismiss="alert" style="color: #004085;"><span aria-hidden="true" >&times;</span></button>
                                 akun anda telah tardaftar, silahkan masuk untuk memulai tes!!!
                            </div>
                    <?php }elseif(Session::get('gagal')){ ?>
                        <div class="alert" style=" color: #721c24; background-color: #f8d7da; border-color: #f5c6cb;margin-bottom: 0px;">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
                            mohon maaf NIM yang anda masukkan telah terpakai, mohon untuk mengecek NIM anda kembali !!!
                        </div>

                    <?php }elseif(Session::get('salah')){ ?>
                        <div class="alert" style=" color: #721c24; background-color: #f8d7da; border-color: #f5c6cb;margin-bottom: 0px;">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
                            Username dan Password yang anda masukkan salah !!!
                        </div>
                    <?php }elseif(Session::get('keluar')){ ?>
                        <div class="alert" style=" color: #721c24; background-color: #f8d7da; border-color: #f5c6cb;margin-bottom: 0px;">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
                            Anda Telah Keluar Dari Tes !!!
                        </div>
                        
                    <?php }else{ }?>
                    <br>
                    <div class="form-group">
                        <input type="text" name="user" class="form-control item" id="username" placeholder="Username" required="" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass" class="form-control item" id="password" placeholder="Password" required="">
                    </div>
                   
                    <div class="form-group">
                        <div class="row">

                            @if($data == null)
                                <div class="col-md-12">
                                    <a class="btn btn-block create-account" style="background-color:#0D386B;color: white;" data-toggle="modal" data-target="#addadmin">Daftar Admin</a>
                                </div>
                            @else
                                <div class="col-md-12">
                                    <button class="btn btn-block create-account" style="background-color:#0D386B;">Login</button>
                                </div>
                            
                            <div class="col-md-6">
                                <a class="btn btn-block create-account" style="background-color:#114685;color: white;" data-toggle="modal" data-target="#addmhs">Daftar </a>
                            </div>
                            <div class="col-md-6" style="text-align: center;padding-top: 5px;">
                                <br>
                                <a href="/forpass" style="color:white;text-decoration: none;">Lupa Password ?</a>
                            </div>
                            @endif

                        </div>                  
                    </div>
                </form>
                <div class="social-media" style="background-color:rgba(0,0,0,0.3);">
                
                </div>
            </div>
            
        </div>
    </div>

    <div class="modal fade" id="addadmin" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">
                        Daftar Admin</span>
                    </h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <form action="{{url('/add_admin')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                <div class="modal-body">
                    <div class="row">
                        
                        <input type="hidden" name="id" value="1" readonly="">
                        
                        <div class="col-md-12">

                            <div class="form-group form-group-default">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="admin" autocomplete="off" required="">
                            </div>
                            <div class="form-group form-group-default">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="admin@admin.com" autocomplete="off" required="">
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
                        
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button  type="button" class="btn btn-danger btn-round" data-dismiss="modal"><i class="icon icon-close"></i> Batal</button>
                    <button class="btn btn-round" style="background-color:#0D386B;color:white;"><i class="icon icon-check"></i> Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="addmhs" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">
                        Daftar Mahasiswa</span>
                    </h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <form action="{{url('/create_mhs')}}" method="post" enctype="multipart/form-data">
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
                                    @foreach($gend as $ge)
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
                    <button class="btn btn-round" style="background-color:#0D386B;color:white;"><i class="icon icon-check"></i> Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <script src="assets/back/js/core/jquery.3.2.1.min.js"></script>
    <script src="assets/back/js/core/popper.min.js"></script>
    <script src="assets/back/js/core/bootstrap.min.js"></script>

    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="assets/js/script.js">
        
        $(document).ready(function(){
            $('#birth-date').mask('00/00/0000');
            $('#phone-number').mask('0000-0000');
        })

    </script>
</body>
</html>
