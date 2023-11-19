<?php

namespace App\Exports;

use App\Models\Order;
use App\Models\Product;
use App\Models\ReturnRequest;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;

use Maatwebsite\Excel\Concerns\FromCollection;

class AllProductExport implements FromView, WithTitle, ShouldAutoSize
{

    public function view(): View
    {
        return view('vendor.exports.allproduct', [
            'product' => Product::get()
        ]);
    }

    public function title(): string
    {
        return 'All Product';
    }
}

