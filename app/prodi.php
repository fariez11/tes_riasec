<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class prodi extends Model
{
    protected $table = 'prodi';
    protected $fillable = [
        'PRODI_ID', 'PRODI','HAPUS'
        ];

    public $timestamps = false;

    public static function getId(){
        return $getId = DB::table('prodi')->orderBy('PRODI_ID','DESC')->take(1)->get();
    }
}
