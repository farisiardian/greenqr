<form method="post" action="{{route('storeRating')}}">

    @csrf
    <div class="modal-body">
        <div class="d-flex p-2">
            <div class="media">
                <div class="d-flex">
                    <img src="{{$editOrder->productImages ? asset('storage/'.$editOrder->productImages->image) : asset('img/product/p1.jpg')}}}}" alt=""  width="80px" height="80px">
                </div>
                <div class="media-body">
                    <span><Strong>{{$editOrder->products ? $editOrder->products->name :''}}</Strong></span><br>
{{--                    <span>Variation: Red</span>--}}
                    <p>RM{{$editOrder->products ? $editOrder->products->list_price_on_store :''}} X{{$editOrder->carts ? $editOrder->carts->quantity : ''}}</p>
                </div>
            </div>
        </div>

        <div class="media mb-2">
            <div class="d-flex mr-2">
                <h4>Product Quantity :</h4>
            </div>
            <div class="media-body star">

                <div id="no-rated-msg"></div>
                <div>
                    <input type="hidden" class="form-control" name="rating" id="scorerating">
                    <input type="hidden" class="form-control" name="order_id" value="{{$editOrder->id}}" id="scorerating">
                </div>
            </div>
        </div>
        <div class="form-group">
            <textarea class="form-control different-control w-100" name="comments" id="textarea" cols="30" rows="5" placeholder="Comments"></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#" data-dismiss="modal" class="btn">Cancel</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

<script>
    $(document).ready(function(){

        $.fn.raty.defaults.path = "raty/";

// No Rated Message
        $('#no-rated-msg').raty({

            click: function(score) {
                document.getElementById("scorerating").value = score;
            }


        });



    });
</script>
