<?php

namespace App\Exports;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;

use Maatwebsite\Excel\Concerns\FromCollection;

class SalesExport implements FromView,WithTitle,ShouldAutoSize
{

    public function view(): View
    {
//        return view('admin.exports.assessmentcategory', [
//            'assessmentcategory' => AssessmentCategory::leftJoin('assessments','assessments.assessment_categories_id','assessment_categories.id')
//            ->where('assessments.deleted_at','=',NULL)
//            ->where('assessment_categories.deleted_at','=',NULL)
//             ->select('assessments.id AS assessmentID','assessment_categories.name','assessment_categories.description','assessment_categories.image','assessment_categories.bg_color','assessments.assessment_categories_id','assessments.title','assessments.description AS learn_more','assessments.type')
//             ->get()
//        ]);
        return view('admin.exports.sales', [
            'sales' => Order::join('users as users_a','users_a.id','orders.vendor_id')
                ->join('users as users_b','users_b.id','orders.user_id')
                ->join('products','orders.product_id','products.id')
                ->join('shopping_carts','orders.user_id','shopping_carts.user_id')
                ->select('users_a.name as merchantName',
                    'users_b.name as userName','users_b.email as userEmail','users_b.phone as userPhone',
                    'orders.updated_at as updated_at','orders.transaction_id as orderID','orders.shipping_total as feeShip','orders.status as status',
                    'products.name as productName','products.list_price_on_store as unitPrice','shopping_carts.user_id','shopping_carts.quantity as quantity',
                )
                ->where('users_a.role','vendor')->where('orders.status','Completed')->
                get()
        ]);
    }

    public function title(): string
    {
        return 'Sales';
    }
}
