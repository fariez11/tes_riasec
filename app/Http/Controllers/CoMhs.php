<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use DB;
use App\User;
use App\soal;
use App\jawab;
use App\waktu;

class CoMhs extends Controller
{   
    public function updakun(Request $request, $id)
    {
        if(Session::get('nama') == null || Session::get('level') != 'mahasiswa'){
            return redirect('/logout')->with('errlog','.');
        }else{

            $na = $request->nama;
            $em = $request->email;
            $us = $request->user;
            $pa = $request->pass;

            $ge = $request->gend;
            $no = $request->telp;


            $data = DB::table('mhs')->where('NIM',$id)->update(['EMAIL'=>$em,'USERNAME'=>$us,'PASSWORD'=>$pa,'NAMA'=>$na,'GENDER'=>$ge,'NO_PONSEL'=>$no]);
      
           return back();

        }
    }

    public function masuk()
    {
        if(Session::get('nama') == null || Session::get('level') != 'mahasiswa'){
            return redirect('/logout')->with('errlog','.');
        }else{

            $nim = Session::get('nim');
            $datm = DB::SELECT("SELECT* FROM mhs b, prodi c WHERE b.KODE = c.KODE AND b.NIM = '$nim'");
            $wsoal = DB::SELECT("SELECT*FROM waktu WHERE WKT_ID = 1");


            $sne = date('Y-m-d H:i:s');
            $mli = DB::SELECT("SELECT *FROM waktu WHERE WKT_ID = 1");

            

            return view('/mhs/masuk',['datm'=>$datm,'wsoal'=>$wsoal,'sne'=>$sne,'mli'=>$mli]);
        }

    }


    public function habis()
    {
        if(Session::get('nama') == null || Session::get('level') != 'mahasiswa'){
            return redirect('/logout')->with('errlog','.');
        }else{

            $ses = Session::get('nim');
            DB::table('jawab')->where('NIM',$ses)->delete();

            return redirect('/masuk')->with('habis','.');           
        }

    }
    
   
    public function soal(Request $request)
    {
        if(Session::get('nama') == null || Session::get('level') != 'mahasiswa'){
            return redirect('/logout')->with('errlog','.');
        }else{

            $data = DB::SELECT("SELECT*FROM soal WHERE SOAL_ID BETWEEN 1 AND 6 ORDER BY RAND()");
            $no = 1;
            $kat = 1;
            $bot = 'Berikutnya';

            return view('/mhs/soal',['data'=>$data,'no'=>$no,'kat'=>$kat,'bot'=>$bot]);
        }

    }

    public function soal2(Request $request)
    {
        if(Session::get('nama') == null || Session::get('level') != 'mahasiswa'){
            return redirect('/logout')->with('errlog','.');
        }else{

            $ni = $request->nik;
            $tg = date('Y-m-d');
            $no = 1;
            $jaw = array(
                        $request->j1,
                        $request->j2,
                        $request->j3,
                        $request->j4,
                        $request->j5,
                        $request->j6,
                    );
            foreach ($jaw as $key) {

                $data = new jawab();
                // $data->JAWAB_ID = $nos; 
                $data->NIM = $ni;
                $data->NO_SOAL = $no++;
                $data->JAWABAN = $key;
                $data->TGL = $tg;
                $data->save();

            }

            $data = DB::SELECT("SELECT*FROM soal WHERE SOAL_ID BETWEEN 7 AND 12 ORDER BY RAND()");
            $no = 7;
            $kat = 2;
            $bot = 'Berikutnya';

            return view('/mhs/soal',['data'=>$data,'no'=>$no,'kat'=>$kat,'bot'=>$bot]);
        }

    }

    public function soal3(Request $request)
    {
        if(Session::get('nama') == null || Session::get('level') != 'mahasiswa'){
            return redirect('/logout')->with('errlog','.');
        }else{

            $ni = $request->nik;
            $tg = date('Y-m-d');
            $no = 7;
            $jaw = array(
                        $request->j7,
                        $request->j8,
                        $request->j9,
                        $request->j10,
                        $request->j11,
                        $request->j12,
                    );
            foreach ($jaw as $key) {

                $data = new jawab();
                $data->NO_SOAL = $no++;
                $data->NIM = $ni;
                $data->JAWABAN = $key;
                $data->TGL = $tg;
                $data->save();

            }

            $data = DB::SELECT("SELECT*FROM soal WHERE SOAL_ID BETWEEN 13 AND 18 ORDER BY RAND()");
            $no = 13;
            $kat = 3;
            $bot = 'Berikutnya';

            return view('/mhs/soal',['data'=>$data,'no'=>$no,'kat'=>$kat,'bot'=>$bot]);
        }

    }

    public function soal4(Request $request)
    {
        if(Session::get('nama') == null || Session::get('level') != 'mahasiswa'){
            return redirect('/logout')->with('errlog','.');
        }else{

            $ni = $request->nik;
            $tg = date('Y-m-d');
            $no = 13;
            $jaw = array( 
                        $request->j13,
                        $request->j14,
                        $request->j15,
                        $request->j16,
                        $request->j17,
                        $request->j18,
                    );
            foreach ($jaw as $key) {

                $data = new jawab();
                $data->NO_SOAL = $no++;
                $data->NIM = $ni;
                $data->JAWABAN = $key;
                $data->TGL = $tg;
                $data->save();

            }

            $data = DB::SELECT("SELECT*FROM soal WHERE SOAL_ID BETWEEN 19 AND 24 ORDER BY RAND()");
            $no = 19;
            $kat = 4;
            $bot = 'Berikutnya';

            return view('/mhs/soal',['data'=>$data,'no'=>$no,'kat'=>$kat,'bot'=>$bot]);
        }

    }

    public function soal5(Request $request)
    {
        if(Session::get('nama') == null || Session::get('level') != 'mahasiswa'){
            return redirect('/logout')->with('errlog','.');
        }else{

            $ni = $request->nik;
            $tg = date('Y-m-d');
            $no = 19;
            $jaw = array(
                        $request->j19,
                        $request->j20,
                        $request->j21,
                        $request->j22,
                        $request->j23,
                        $request->j24,
                        
                    );
            foreach ($jaw as $key) {

                $data = new jawab();
                $data->NO_SOAL = $no++;
                $data->NIM = $ni;
                $data->JAWABAN = $key;
                $data->TGL = $tg;
                $data->save();

            }

            $data = DB::SELECT("SELECT*FROM soal WHERE SOAL_ID BETWEEN 25 AND 30 ORDER BY RAND()");
            $no = 25;
            $kat = 5;
            $bot = 'Berikutnya';

            return view('/mhs/soal',['data'=>$data,'no'=>$no,'kat'=>$kat,'bot'=>$bot]);
        }

    }

    public function soal6(Request $request)
    {
        if(Session::get('nama') == null || Session::get('level') != 'mahasiswa'){
            return redirect('/logout')->with('errlog','.');
        }else{

            $ni = $request->nik;
            $tg = date('Y-m-d');
            $no = 25;
            $jaw = array(
                        $request->j25,
                        $request->j26,
                        $request->j27,
                        $request->j28,
                        $request->j29,
                        $request->j30,
                        
                    );
            foreach ($jaw as $key) {

                $data = new jawab();
                $data->NO_SOAL = $no++;
                $data->NIM = $ni;
                $data->JAWABAN = $key;
                $data->TGL = $tg;
                $data->save();

            }

            $data = DB::SELECT("SELECT*FROM soal WHERE SOAL_ID BETWEEN 31 AND 36 ORDER BY RAND()");
            $no = 31;
            $kat = 6;
            $bot = 'Berikutnya';

            return view('/mhs/soal',['data'=>$data,'no'=>$no,'kat'=>$kat,'bot'=>$bot]);
        }

    }

    public function soal7(Request $request)
    {
        if(Session::get('nama') == null || Session::get('level') != 'mahasiswa'){
            return redirect('/logout')->with('errlog','.');
        }else{

            $ni = $request->nik;
            $tg = date('Y-m-d');
            $no = 31;
            $jaw = array(
                        $request->j31,
                        $request->j32,
                        $request->j33,
                        $request->j34,
                        $request->j35,
                        $request->j36,
                        
                    );
            foreach ($jaw as $key) {

                $data = new jawab();
                $data->NO_SOAL = $no++;
                $data->NIM = $ni;
                $data->JAWABAN = $key;
                $data->TGL = $tg;
                $data->save();

            }

            $data = DB::SELECT("SELECT*FROM soal WHERE SOAL_ID BETWEEN 37 AND 42 ORDER BY RAND()");
            $no = 37;
            $kat = 7;
            $bot = 'Selesai';

            return view('/mhs/soal',['data'=>$data,'no'=>$no,'kat'=>$kat,'bot'=>$bot]);
        }

    }

    public function kersoal(Request $request)
    {
        if(Session::get('nama') == null || Session::get('level') != 'mahasiswa'){
            return redirect('/logout')->with('errlog','.');
        }else{
         
            // $nos = $request->no;
            $ni = $request->nik;
            $tg = date('Y-m-d');
            $no = 37;
            $jaw = array(
                        $request->j37,
                        $request->j38,
                        $request->j39,
                        $request->j40,
                        $request->j41,
                        $request->j42,
                       
                    );

            foreach ($jaw as $key) {

                $data = new jawab();
                $data->NO_SOAL = $no++;
                $data->NIM = $ni;
                $data->JAWABAN = $key;
                $data->TGL = $tg;
                $data->save();

            }

            $kar = DB::SELECT("SELECT JAWABAN,TGL, COUNT(JAWABAN) as jum FROM jawab WHERE NIM = '$ni' AND JAWABAN NOT LIKE '-' GROUP BY JAWABAN ORDER BY COUNT(JAWABAN) DESC limit 1");

            foreach ($kar as $ins) {
                $data = DB::table('mhs')->where('NIM',$ni)->update(['KARAKTER'=>$ins->JAWABAN]);
            }

            return redirect('hasil')->with('addpkl','.');

        }
    }


    public function hasil()
    {
        if(Session::get('nama') == null || Session::get('level') != 'mahasiswa'){
            return redirect('/logout')->with('errlog','.');
        }else{

            $nim = Session::get('nim');
            $result = DB::SELECT("SELECT JAWABAN, count(JAWABAN) as jum FROM jawab WHERE NIM = '$nim' AND JAWABAN NOT LIKE '-' GROUP BY JAWABAN ORDER BY count(JAWABAN) DESC LIMIT 3");
            $lim = DB::SELECT("SELECT JAWABAN, count(JAWABAN) as jum FROM jawab WHERE NIM = '$nim' AND JAWABAN NOT LIKE '-' GROUP BY JAWABAN ORDER BY count(JAWABAN) DESC LIMIT 1");
            $datm = DB::SELECT("SELECT* FROM mhs b, prodi c WHERE b.KODE = c.KODE AND b.NIM = '$nim'");
            return view('/mhs/hasil',['result'=>$result,'datm'=>$datm,'lim'=>$lim]);
        }

    }
}
