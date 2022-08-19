<?php

namespace App\Imports;

use App\mhs;
use Maatwebsite\Excel\Concerns\ToModel;

class MhsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    

    public function model(array $row)
    {
        
        return new mhs([
            'NIM' =>$row[0],
            'KODE' => request('prodi'),
            'NAMA' => $row[1],
            'USERNAME' => $row[0],
            'PASSWORD' => $row[0],
            'GENDER' => $row[2],
            'LEVEL' => 'mahasiswa',
            'HAPUS' => '1',
        ]);
    }
}
