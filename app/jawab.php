<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class jawab extends Model
{
    protected $table = 'jawab';
    protected $fillable = [
        'JAWAB_ID', 'NO_SOAL','NIM','JAWAB'
        ];

    public $timestamps = false;

    public static function getId(){
        return $getId = DB::table('jawab')->orderBy('JAWAB_ID','DESC')->take(1)->get();
    }
}
