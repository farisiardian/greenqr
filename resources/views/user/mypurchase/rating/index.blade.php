<div class="modal-body">

    @foreach($orderView as $orderViews)
    <div class="d-flex p-2">
        <div class="media">
            <div class="d-flex">
                <img src="{{$orderViews->productImages ? asset('storage/'.$orderViews->productImages->image) : asset('img/product/p1.jpg')}}" alt=""  width="80px" height="80px">
            </div>
            <div class="media-body">
                <span><Strong>{{$orderViews->products ? $orderViews->products->name :''}}</Strong></span><br>
{{--                <span>Variation: Red</span>--}}
                <p>RM{{$orderViews->products ? $orderViews->products->list_price_on_store :''}} X{{$orderViews->carts ? $orderViews->carts->quantity : ''}}</p>
            </div>
        </div>
        <div class="ml-auto p-2">
            <button type="button" class="btn btn-primary editviewModal" data-id="{{$orderViews->id}}" data-toggle="modal" data-target="#editviewrating">Edit</button>
        </div>
    </div>

    <hr>
    @if($orderViews->ratings()->first())
    <div class="review_list p-2">
        <div class="review_item">
            <div class="media">
                <div class="d-flex">
                    <img src="{{Auth::user()->profile_image != null ? asset('storage/'.Auth::user()->profile_image)  : asset('img/product/review-1.png')}}" class="img-fluid" width="80" height="80" alt="">
                </div>
                <div class="media-body">
                    <h4>{{Auth::user()->name}}</h4>
                   @if($orderViews->ratings()->first()->rating >=1) <i class="fa fa-star"></i> @endif
                    @if($orderViews->ratings()->first()->rating >=2)  <i class="fa fa-star"></i>@endif
                    @if($orderViews->ratings()->first()->rating >=3) <i class="fa fa-star"></i> @endif
                    @if($orderViews->ratings()->first()->rating >=4) <i class="fa fa-star"></i> @endif
                    @if($orderViews->ratings()->first()->rating >=5)  <i class="fa fa-star"></i> @endif
                </div>
            </div>
            <p>{{$orderViews->ratings()->first()->comments}}</p>
        </div>


    </div>
        @else

            <div class="review_list p-2">
                <div class="review_item">
                    <p>No Rating</p>
                </div>
            </div>


        @endif
        <hr>
        <hr>
    @endforeach

</div>

<script>
    $(document).ready(function() { 

        $(document).on("click", ".editviewModal", function (e) {

            var eventId = $(this).data('id');

            var url = `{{route('editRating')}}`;


            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    '_token': '<?php echo csrf_token() ?>',
                    'order_id': eventId,

                },
                success: function (data) {
                    $('#editviewrating').modal('show');
                    $("#modal-editviewrating").html(data);

                },
                error: function (data) {
                    // alert('error');
                    alert(JSON.stringify(data));
                }
            });
        });
    });
</script>
