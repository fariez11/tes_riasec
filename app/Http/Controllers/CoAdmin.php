<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\MhsImport;
use App\Exports\MhsExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FROMCollection;
use App\Http\Requests;
use Session;
use DB;
use App\prodi;
use App\soal;
use App\mhs;
use App\waktu;

class CoAdmin extends Controller
{

    public function home()
    {
        if(Session::get('nama') == null || Session::get('level') != 'admin'){
            return redirect('/logout')->with('errlog','.');
        }else{

            $prodi = prodi::where('HAPUS', 0)->count();
            $soal = soal::count();
            $mhs = mhs::count();
            $hasil = DB::SELECT("SELECT COUNT(DISTINCT a.NIM) as jum FROM mhs a, jawab b WHERE a.NIM = b.NIM");
            $mprodi = DB::SELECT("SELECT*FROM prodi ORDER BY PRODI ASC");

            return view('/admin/home',['prodi'=>$prodi,'soal'=>$soal,'mhs'=>$mhs,'hasil'=>$hasil,'mprodi'=>$mprodi]);
        }

    }

    public function updakun(Request $request, $id)
    {
        if(Session::get('nama') == null || Session::get('level') != 'admin'){
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

    public function dtprodi()
    {
        if(Session::get('nama') == null || Session::get('level') != 'admin'){
            return redirect('/logout')->with('errlog','.');
        }else{

            
            $prodi = DB::SELECT("SELECT*FROM prodi WHERE HAPUS = 0 ORDER BY PRODI");
            $mprodi = DB::SELECT("SELECT*FROM prodi WHERE HAPUS = 0 ORDER BY PRODI ASC");

            return view('/admin/dta_prodi',['data'=>$prodi,'mprodi'=>$mprodi]);
        }

    }

    public function addprodi(Request $request)
    {
        if(Session::get('nama') == null || Session::get('level') != 'admin'){
            return redirect('/logout')->with('errlog','.');
        }else{

            
            $ko = $request->kode;
            $na = $request->nama;
       
        $data = new prodi();
            
            $data->KODE = $ko;
            $data->PRODI = ucfirst($na);
            $data->HAPUS = '0';
            $data->save();


            return redirect('dataprodi')->with('addmhs','.');

        }
    }

     public function updprodi(Request $request, $id)
    {
        if(Session::get('nama') == null || Session::get('level') != 'admin'){
            return redirect('/logout')->with('errlog','.');
        }else{

            $na = $request->nama;

            $data = DB::table('prodi')->where('KODE',$id)->update(['PRODI'=>$na]);

            return redirect('dataprodi')->with('updmhs','.');

        }
    }

    public function delprodi($id)
    {
        if(Session::get('nama') == null || Session::get('level') != 'admin'){
            return redirect('/logout')->with('errlog','.');
        }else{

            $data = DB::table('prodi')->where('KODE',$id)->update(['HAPUS'=>'1']);

            return redirect('dataprodi')->with('delsoal','.');

        }
    }

    public function dtmhs($id)
    {
        if(Session::get('nama') == null || Session::get('level') != 'admin'){
            return redirect('/logout')->with('errlog','.');
        }else{
            $idpro = $id;
            $sespro = DB::SELECT("SELECT * FROM prodi WHERE KODE = '$id'"); ;
            $emhs = mhs::where('KODE', $id)->where('HAPUS', '1')->get();
            $gen = array('Laki-laki','Perempuan');
            $prodi = DB::SELECT("SELECT * FROM prodi WHERE HAPUS = 0 ORDER BY PRODI");
            $mprodi = DB::SELECT("SELECT * FROM prodi WHERE HAPUS = 0 ORDER BY PRODI ASC");

            return view('/admin/dta_mhs',['emhs'=>$emhs,'gen'=>$gen,'prodi'=>$prodi,'mprodi'=>$mprodi,'idpro'=>$idpro,'sespro'=>$sespro]);
        }

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

                return back()->with('addmhs','.');
        }else{
            return back()->with('gagal','.');
        }

        
    }

    public function impmhs(Request $request)
    {
        $prodi = $request->prodi;
        
        Excel::import(new MhsImport,request()->file('file'),$prodi);
        return back();
    }

    public function updmhs(Request $request, $id)
    {
        if(Session::get('nama') == null || Session::get('level') != 'admin'){
            return redirect('/logout')->with('errlog','.');
        }else{

            $id = $request->id;
            $na = $request->nama;
            $em = $request->email;
            $us = $request->user;
            $pa = $request->pass;

            $ni = $request->nim;
            $pr = $request->prodi;
            $ge = $request->gend;
            $no = $request->telp;


            $data = DB::table('mhs')->where('NIM',$id)->update(['EMAIL'=>$em,'USERNAME'=>$us,'PASSWORD'=>$pa,'NIM'=>$ni,'NAMA'=>$na,'GENDER'=>$ge,'NO_PONSEL'=>$no,'KODE'=>$pr]);
      

            return back();

        }
    }

    public function delmhs($id)
    {
        if(Session::get('nama') == null || Session::get('level') != 'admin'){
            return redirect('/logout')->with('errlog','.');
        }else{

            $data = DB::table('mhs')->where('NIM',$id)->update(['HAPUS'=>'2']);

            return back();

        }
    }





    public function dtsoal()
    {
    	if(Session::get('nama') == null || Session::get('level') != 'admin'){
            return redirect('/logout')->with('errlog','.');
        }else{

            $soal = DB::SELECT("SELECT*FROM soal");
            $eid = DB::SELECT("SELECT*FROM soal");
            $kat = array('Realistis','Investigasi','Artistik','Sosial','Gigih','Konvensional');
            $ids = soal::getId();
            $mprodi = DB::SELECT("SELECT*FROM prodi WHERE HAPUS = 0 ORDER BY PRODI ASC");

	     	return view('/admin/dta_soal',['soal'=>$soal,'ids'=>$ids,'eid'=>$eid,'kat'=>$kat,'mprodi'=>$mprodi]);
	    }

    }

    public function addsoal(Request $request)
    {
        if(Session::get('nama') == null || Session::get('level') != 'admin'){
            return redirect('/logout')->with('errlog','.');
        }else{

            $id = $request->id;
            $so = $request->soal;
            $ka = $request->kat;
       
        $data = new soal();
            if($id == null){
                $data->SOAL_ID = 1;
            }else{
                $data->SOAL_ID = $id;
            }
            $data->SOAL = ucfirst($so);
            $data->KATEGORI = $ka;
            $data->save();

            return redirect('datasoal')->with('addpkl','.');

        }
    }

    public function updsoal(Request $request, $id)
    {
        if(Session::get('nama') == null || Session::get('level') != 'admin'){
            return redirect('/logout')->with('errlog','.');
        }else{

            $so = $request->soal;
            $ka = $request->kat;

            $data = DB::table('soal')->where('SOAL_ID',$id)->update(['SOAL'=>$so,'KATEGORI'=>$ka]);
      

            return redirect('datasoal')->with('updsoal','.');

        }
    }

    public function delsoal($id)
    {
        if(Session::get('nama') == null || Session::get('level') != 'admin'){
            return redirect('/logout')->with('errlog','.');
        }else{

            DB::table('soal')->where('SOAL_ID',$id)->delete();

            return redirect('datasoal')->with('delsoal','.');

        }
    }

    public function updwkt(Request $request)
    {
        if(Session::get('nama') == null || Session::get('level') != 'admin'){
            return redirect('/logout')->with('errlog','.');
        }else{

            $mli = $request->mulai;
            $sls = $request->selesai;

            $data = DB::table('waktu')->where('WKT_ID','1')->update(['MULAI'=>$mli,'SELESAI'=>$sls]);
      

            return redirect('datasoal')->with('updsoal','.');

        }
    }


    public function dthasil(Request $request,$id)
    {
        if(Session::get('nama') == null || Session::get('level') != 'admin'){
            return redirect('/logout')->with('errlog','.');
        }else{

            $tahun = $request->tahun;
            $cthn = '36'.substr($request->tahun, -2);

            
            $idpro = $id;
            $mprodi = DB::SELECT("SELECT*FROM prodi WHERE HAPUS = 0 ORDER BY PRODI ASC");
            $prodi = DB::SELECT("SELECT*FROM prodi WHERE KODE = '$id'");
            
            if($tahun == null){
                $sql = DB::SELECT("
                    SELECT KAR_ID as kar,
                        (SELECT COUNT(DISTINCT b.NIM) as jum 
                        FROM mhs b ,jawab c 
                        WHERE b.NIM = c.NIM 
                        AND b.KODE = '$id' 
                        AND b.KARAKTER = kar 
                        GROUP BY b.KARAKTER) as hasil,
                        ROUND(
                            (SELECT COUNT(DISTINCT b.NIM) as jum FROM mhs b ,jawab c WHERE b.NIM = c.NIM AND b.KODE = '$id' 
                            AND b.KARAKTER = kar GROUP BY b.KARAKTER) / 
                            (SELECT COUNT(DISTINCT a.NIM) FROM mhs a, jawab b WHERE a.NIM = b.NIM AND a.KODE = '$id') * 100) as per
                    FROM karakter");
                $jmhs = DB::SELECT("SELECT COUNT(DISTINCT a.NIM) as jum FROM mhs a, jawab b WHERE a.NIM = b.NIM AND a.KODE = '$id'");
                $hmhs = DB::SELECT("SELECT*, COUNT(DISTINCT a.NIM) as jum FROM mhs a, jawab b WHERE a.NIM = b.NIM AND a.KODE = '$id' GROUP BY a.NIM");
            }else{
                $sql = DB::SELECT("
                    SELECT KAR_ID as kar,
                        (SELECT COUNT(DISTINCT b.NIM) as jum 
                        FROM mhs b ,jawab c 
                        WHERE b.NIM = c.NIM 
                        AND b.KODE = '$id' 
                        AND b.KARAKTER = kar 
                        AND LEFT(b.NIM,4) = '$cthn'
                        GROUP BY b.KARAKTER) as hasil,
                        ROUND(
                            (SELECT COUNT(DISTINCT b.NIM) as jum FROM mhs b ,jawab c WHERE b.NIM = c.NIM AND b.KODE = '$id' 
                            AND b.KARAKTER = kar AND LEFT(b.NIM,4) = '$cthn' GROUP BY b.KARAKTER) / 
                            (SELECT COUNT(DISTINCT a.NIM) FROM mhs a, jawab b WHERE a.NIM = b.NIM AND a.KODE = '$id' AND LEFT(b.NIM,4) = '$cthn') * 100) as per
                    FROM karakter");
                $jmhs = DB::SELECT("SELECT COUNT(DISTINCT a.NIM) as jum FROM mhs a, jawab b WHERE a.NIM = b.NIM AND a.KODE = '$id' AND LEFT(a.NIM,4) = '$cthn'");
                $hmhs = DB::SELECT("SELECT*, COUNT(DISTINCT a.NIM) as jum FROM mhs a, jawab b WHERE a.NIM = b.NIM AND a.KODE = '$id' AND LEFT(a.NIM,4) = '$cthn' GROUP BY a.NIM");
            }

            return view('/admin/dta_hasil',['sql'=>$sql,'idpro'=>$idpro,'mprodi'=>$mprodi,'prodi'=>$prodi,'jmhs'=>$jmhs,'hmhs'=>$hmhs,'cthn'=>$cthn]);
        }

    }

    public function reshasil($id)
    {
        if(Session::get('nama') == null || Session::get('level') != 'admin'){
            return redirect('/logout')->with('errlog','.');
        }else{

            DB::table('jawab')->where('NIM',$id)->delete();

            return redirect()->back();

        }
    }

    public function exhasil(Request $request)
    {

        $tglm   = $request->tgm;
        $tgla   = $request->tga;

        $hasil = DB::SELECT("SELECT*FROM mhs a, jawab b WHERE a.NIM = b.NIM AND b.TGL BETWEEN '$tglm' and '$tgla' group by b.NIM");

        if($hasil == null){
            return redirect('datahasil')->with('kosong','.');
        }else{
            return Excel::download(new MhsExport($hasil), 'hasil.xlsx');
        }
    }
}
