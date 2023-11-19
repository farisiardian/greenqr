<?php

namespace App\Exports;

use App\Models\Order;
use App\Models\ReturnRequest;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;

use Maatwebsite\Excel\Concerns\FromCollection;

class ReturnExport implements FromView, WithTitle, ShouldAutoSize
{

    public function view(): View
    {
        return view('vendor.exports.return', [
            'return' => ReturnRequest::
//            ->select('user_address.name as username','user_address.phone as userphone','return_request.amount_return as amount_return','return_request.status_r as status_r','return_request.reason as reason')
            get()
        ]);
    }

    public function title(): string
    {
        return 'Order Return and Refund';
    }
}
