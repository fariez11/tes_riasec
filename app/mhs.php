<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class mhs extends Model
{
    protected $table = 'mhs';
    protected $fillable = [
        'NIM','KODE','NAMA','EMAIL','USERNAME','PASSWORD','GENDER','KARAKTER','NO_PONSEL'
        ];

    public $timestamps = false;

    public static function getId(){
        return $getId = DB::table('mhs')->orderBy('NIM','DESC')->take(1)->get();
    }
}
