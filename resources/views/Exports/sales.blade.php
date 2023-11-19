
<table>
    <tr>
        <th>DateTime</th>
        <th>Merchant Name</th>
        <th style="color:blue">User Name</th>
        <th style="color:blue">User Email</th>
        <th style="color:blue">User Phone</th>
        <th>Order ID</th>
        <th>Order Status</th>
        <th>Payment Type</th>
        <th>Product</th>
        <th>Unit Price</th>
        <th>Quantity</th>
        <th>Subtotal</th>
        <th>Shipping Fee</th>
        <th>Total</th>
    </tr>
    @foreach($sales as $view)
        <tr>
            <td>{{$view->updated_at}}</td>
            <td>{{$view->merchantName}}</td>
            <td>{{$view->userName}}</td>
            <td>{{$view->userEmail}}</td>
            <td>{{$view->userPhone}}</td>
            <td>#{{$view->orderID}}</td>
            <td><span class="badge bg-label-primary me-1">{{$view->status}}</span></td>
            <td>Online Banking</td>
            <td>{{$view->productName}}</td>
            <td>RM{{$view->unitPrice}}</td>
            <td>{{$view->quantity}}</td>
            <td>RM{{$view->unitPrice}}</td>
            <td>RM{{$view->feeShip}}</td>
            <td>RM{{$view->feeShip + $view->unitPrice}}</td>
        </tr>
    @endforeach
</table>
