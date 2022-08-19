<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/img/logo.png" type="image/x-icon"/>
    <title>Tes Riasec - Lupa Password</title>
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
    padding: 20px 0;
    text-align: center;
    border-bottom-left-radius: 30px;
    border-bottom-right-radius: 30px;
    /*color: #9fadca;*/
    /*border-top: 1px solid #dee9ff;*/
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
    <center>
    <div class="registration-form" >
        <div class="row" style="margin: 0px;">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                
                <form action="{{ url('/sendpass')}}" method="get" style="background-color: rgba(0,0,0,0.3);">
                    <div class="form-icon" style="background-color:#0D386B;">
                        <span><i class="icon icon-envelope"></i></span>
                    </div>

                    
                    <div>
                        <?php if(Session::get('gagal')){ ?>
                            <div class="alert" style=" color: #721c24; background-color: #f8d7da; border-color: #f5c6cb;margin-bottom: 0px;">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
                                email yang anda masukkan tidak cocok !!!
                            </div>
                        <?php }elseif(Session::get('berhasil')){ ?>
                            <div class="alert" style=" color: #004085; background-color: #cce5ff; border-color: #b8daff;margin-bottom: 0px;">
                                <button type="button" class="close" data-dismiss="alert" style="color: #004085;"><span aria-hidden="true" >&times;</span></button>
                                 silahkan cek password anda di email anda !!!
                            </div>
                        <?php }else{ ?>
                            <p class="px-2 mb-0 col-md-12" style="text-align:justify;color: white;">Silahkan masukkan alamat email akun anda yang telah terdaftar di sistem informasi kami dan kami akan mengirimkan beberapa informasi akun anda melalui email anda</p>
                        <?php }?>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control item" id="password" placeholder="emailanda@gmail.com" required="">
                    </div>
                    
                    <button class="btn btn-block create-account" style="background-color:#0D386B;">Kirim</button>

                    <a href="/" class="btn btn-block create-account" style="background-color:#114685; color: white;">Kembali</a>
                </form>
                <div class="social-media" style="background-color:rgba(0,0,0,0.3);">
                
                </div>
            </div>
            
        </div>
    </div>
    </center>

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
