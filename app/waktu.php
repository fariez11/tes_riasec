<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class waktu extends Model
{
    protected $table = 'waktu';
    protected $fillable = [
        'WKT_ID', 'MULAI','SELESAI'
        ];

    public $timestamps = false;

}
