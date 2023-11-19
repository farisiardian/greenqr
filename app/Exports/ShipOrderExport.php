<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;

use Maatwebsite\Excel\Concerns\FromCollection;

class ShipOrderExport implements FromView, WithTitle, ShouldAutoSize
{

    public function view(): View
    {
        return view('vendor.exports.shiporder', [
            'shiporder' => Order::
            get()
        ]);
    }

    public function title(): string
    {
        return 'Ship Order';
    }
}
