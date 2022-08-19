<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class soal extends Model
{
    protected $table = 'soal';
    protected $fillable = [
        'SOAL_ID', 'SOAL','KATEGORI'
        ];

    public $timestamps = false;

    public static function getId(){
        return $getId = DB::table('soal')->orderBy('SOAL_ID','DESC')->take(1)->get();
    }
}
