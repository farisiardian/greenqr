<!---------Modal Detail----------->
<div class="modal-header">
    <h5 class="modal-title" id="orderReturnTitle">Order #{{isset($orders) ? $orders->id : ''}}</h5>
    <input hidden type="text" id="trans_id" name="trans_id" value="{{isset($orders) ?  $orders->id : ''}}">

    <button
        type="button"
        class="btn-close"
        data-bs-dismiss="modal"
        aria-label="Close"
    ></button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col mb-3">
            <strong>Shipping Detail</strong>
            <p>{{isset($useraddress) ?  $useraddress->name : ''}}<br>{{isset($useraddress) ?  $useraddress->phone : ''}}<br>
                {{isset($useraddress) ?  $useraddress->address : ''}}</p>
        </div>
    </div>
    <div class="row g-2">
        <div class="col mb-3">
            <strong>Products</strong>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                @if($order->image()->first())
                                    <img
                                        src="{{isset($order) ? asset('storage/'.$order->image()->first()->image) : ''}}"
                                        class="d-block rounded"
                                        height="100"
                                        width="100"/>
                                @else
                                    <img
                                        src="{{asset('admin/assets/img/products/Iberet-Folic-500.jpg')}}"
                                        class="d-block rounded"
                                        height="100"
                                        width="100"/>
                                @endif
                                {{$order->name}}</div>
                        </td>
{{--                        <td>{{$quantities->quantity}}</td>--}}
{{--                        <td>RM{{$order->cart_total}}</td>--}}
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot class="table-border-bottom-0">
                    <tr>
                        <th></th>
                        <th>Shipping Fee</th>
{{--                        <th>RM {{$orders->shipping_total}}</th>--}}
                    </tr>
                    <tr>
                        <th></th>
                        <th>Total</th>
{{--                        <th>RM {{$orders->shipping_total + $orders->cart_total}}</th>--}}
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="row mx-3 my-4">
        <div class="col mb-3 d-flex justify-content-between">
            <strong>Payment Method</strong><span class="text-primary">FPX</span>
        </div>
    </div>
    <div class="row mx-3">
        <div class="col mb-3">
            <div class="card border border-primary">
                <div class="card-body">
                    <strong  class="form-label mb-3">Reason</strong>
{{--                    <h6>{{$reasons->reason}}</h6>--}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
    {{--                <button type="button" class="btn btn-outline-danger">Reject</button>--}}
    {{--                <button type="button" class="btn btn-primary">Accept</button>--}}
</div>

