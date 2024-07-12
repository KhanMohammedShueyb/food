<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class InventoryExport implements FromView
{
    public $data;
    function __construct($data){
        $this->data = $data; 
    }
    public function view(): View
    {
        return view('excel.inventory_excel', [
            'data' => $this->data
        ]);
    }
}
