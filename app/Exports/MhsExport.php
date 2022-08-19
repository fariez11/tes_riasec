<?php

namespace App\Exports;

use App\Exports\MhsExport;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MhsExport implements FromView
{
	public function __construct($hasil){
		$this->hasil = $hasil;
	}

	public function view(): View{
		return view('exports.hasil',[
			'hasil' => $this->hasil
		]);		
		
	}
}
