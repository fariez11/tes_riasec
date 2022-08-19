<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\mhs;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


     public function login()
    {
        $data = DB::SELECT("SELECT * FROM mhs WHERE LEVEL = 'admin' ");
        $prodi = DB::SELECT("SELECT * FROM prodi WHERE HAPUS = 0 ORDER BY PRODI");
        $gend = array('Laki-laki','Perempuan');

        return view('/login',['data'=>$data,'prodi'=>$prodi,'gend'=>$gend]);
        
    }

    public function addadmin(Request $request)
    {
        
        $id = $request->id;            
        $na = $request->nama;
        $em = $request->email;
        $us = $request->user;
        $pa = $request->pass;
       
        $data = new mhs();
            $data->NIM = $id;
            $data->NAMA = $na;
            $data->EMAIL = $em;
            $data->USERNAME = $us;
            $data->PASSWORD = $pa;
            $data->LEVEL = 'admin';
            $data->HAPUS = 1;
            $data->save();

        return redirect('/')->with('error','.');
      
    }

    public function addmhs(Request $request)
    {
        
        $id = $request->id;
        $na = $request->nama;
        $em = $request->email;
        $us = $request->user;
        $pa = $request->pass;
        $ni = $request->nim;
        $pr = $request->prodi;
        $ge = $request->gend;
        $no = $request->no;
        // $tahun = date('y');
        // $nim  = '36'.date('y').''.$request->prodi.'00001';
        $cek = DB::SELECT("SELECT*FROM mhs WHERE NIM = '$ni'");

        if($cek == null){
        
            $data = new mhs();
                $data->EMAIL = $em;
                $data->USERNAME = $us;
                $data->PASSWORD = $pa;
                $data->LEVEL = 'mahasiswa';
                $data->HAPUS = 1;

                $data->NIM = $ni;
                $data->NAMA = ucfirst($na);
                $data->KODE = $pr;
                $data->GENDER = $ge;
                $data->NO_PONSEL = $no;
                $data->save();

                return redirect('/')->with('addmhs','.');
        }else{
            return redirect('/')->with('gagal','.');
        }

        
    }

    public function sendpass(Request $request)
    {    
        $email = $request->email;
        $cek = DB::SELECT("SELECT*FROM mhs WHERE EMAIL = '$email'");

        if($cek == null){

            return redirect('/forpass')->with('gagal','.');

        }else{

            foreach($cek as $dum){
                $data = array(
                    'email' => $dum->EMAIL,
                    'username' => $dum->USERNAME,
                    'password' => $dum->PASSWORD,
                    'tanggal' => date('Y-m-d H:i:s'),
                );
            }


            \Mail::send('email.email_pass',$data, function($message) use ($data)
                {
                    $message->from('noreply@riasec.poliwangi.co.id');
                    $message->to($data['email'])->subject('Tes Riasec');
                }
            );

            return redirect('/forpass')->with('berhasil','.');

        }
    }


    public function actlog(Request $request){
        $username = $request->user;
        $password = $request->pass;
        
        Session::flush();
        $data = DB::table('mhs')->where([['USERNAME',$username],['PASSWORD',$password]])->get();
        foreach ($data as $key) {
            $nama = $key->USERNAME;
            $level = $key->LEVEL;
        };

        if (count($data) == 0){
            return redirect('/')->with('salah','.');
        }else{

	        if($level == 'admin') {
	        	$na = DB::SELECT("SELECT*FROM mhs WHERE USERNAME LIKE '$username'");
	        	foreach ($na as $nam) {
	        		Session::put('nim',$nam->NIM);
                    Session::put('nama',$username);
                    Session::put('email',$nam->EMAIL);
	        		Session::put('level',$nam->LEVEL);
	        	}

	            return redirect('/admin');
	        }
	        else if($level == 'mahasiswa') {

                // $na = DB::SELECT("select*from pengguna a, mhs b where a.USER_ID = b.USER_ID and a.USERNAME like '$username'");
                $na = DB::SELECT("SELECT*FROM  mhs b, prodi c WHERE b.KODE = c.KODE AND b.USERNAME LIKE '$username'");
	        	foreach ($na as $nam) {
	        		Session::put('nama',$username);
                    Session::put('nim',$nam->NIM);
                    Session::put('prodi',$nam->PRODI);
                    Session::put('nam',$nam->NAMA);
                    Session::put('email',$nam->EMAIL);
	        		Session::put('level',$nam->LEVEL);
	        	

                    $sel = DB::SELECT("SELECT*FROM mhs a, jawab b WHERE a.NIM = b.NIM AND a.NIM = $nam->NIM");

                        if(count($sel) == 0){

                            return redirect('/masuk');
                        }else{

                            return redirect('/hasil');
                        }

                }


	        }
			else {

            return redirect('/')->with('error','.');
        	}
	    }

    }

    public function logsoal(){

        $ses = Session::get('nim');

        $cek = DB::SELECT("SELECT*FROM jawab WHERE NIM = '$ses'");

        if($cek != null){

            DB::table('jawab')->where('NIM',$ses)->delete();
            Session::flush();
            return redirect('/')->with('keluar','.');;

        }else{

            Session::flush();
            return redirect('/')->with('keluar','.');;

        }

        
    }

    public function logout(){

        Session::flush();
        return redirect('/');
    }
}
