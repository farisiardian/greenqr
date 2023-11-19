
<table>
    <tr>
        <th>Product Name</th>
        <th>Total</th>
        <th>Status</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Reason</th>
    </tr>
    @foreach($return as $view)
        <tr>
            <td>{{$view->name}}</td>
            <td>{{$view->amount_return}}</td>
            <td>{{$view->status_r}}</td>
            <td>{{$view->username}}</td>
            <td>{{$view->userphone}}</td>
            <td>{{$view->reason}}</td>
        </tr>
    @endforeach
</table>

