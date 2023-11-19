
<table>
    <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Stock</th>
        <th>Sales</th>
        <th>Supplier Cost Price</th>
    </tr>
    @foreach($product as $view)
        <tr>
            <td>{{$view->image()->first() ? $view->image()->first()->image  :'' }}</td>
            <td>{{$view->name}}</td>
            <td>{{$view->stocks()->sum('total_stock')}}</td>
            <td>{{$view->stocks()->where('total_stock','<','0')->sum('total_stock')*-1}}</td>
            <td>{{$view->supplier_cost_price}}</td>

        </tr>
    @endforeach
</table>

