
<table>
    <tr>
        <th>Product</th>
        <th>Product Name</th>
        <th>Total</th>
        <th>Status</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Quantity</th>
    </tr>
    @foreach($myorder as $view)
        <tr>
            <td>{{$view->productImages()->first() ? $view->productImages()->first()->image  :'' }}</td>
            <td>{{$view->products()->first() ? $view->products()->first()->name  :'' }}</td>
            <td>{{$view->cart_total}}</td>
            <td>{{$view->status}}</td>
            <td>{{$view->user_address()->first() ? $view->user_address()->first()->name  :'' }}</td>
            <td>{{$view->user_address()->first() ? $view->user_address()->first()->phone  :'' }}</td>
            <td>{{$view->carts()->first() ? $view->carts()->first()->quantity  :'' }}</td>
        </tr>
    @endforeach
</table>

