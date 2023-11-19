
@foreach($tab_products as $allproduct)
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-product" style="height:420px">
            <a class="card-product__img " href="{{route('showProduct',['id'=>$allproduct->id])}}">
                @if($allproduct->image()->first())
                    <img
                        src="{{asset('storage/'.$allproduct->image()->first()->image)}}"
                        style="height:100%; width: 100%; object-fit: cover;border-radius:10px"/>
                @else
                    <img
                        src="{{asset('admin/assets/img/avatars/default_product.png')}}"
                        style="height:100%; width: 100%; object-fit: cover;border-radius:10px"/>
                @endif
            </a>
            <div class="py-2">
                <p class="card-cate">{{$allproduct->mainCategory()->first() ? $allproduct->mainCategory()->first()->name :''}}</p>
                <p><a href="{{route('showProduct',['id'=>$allproduct->id])}}" class="title text-truncate">{{$allproduct->name}}</a></p>
                <div class="d-flex align-items-center mb-1">
                    @php
                        $rating = $allproduct->ratings()->avg('rating');
                        $full_stars = floor($rating);
                        $half_stars = ceil($rating - $full_stars);
                        $empty_stars = 5 - $full_stars - $half_stars;
                    @endphp
                    @for($i=0; $i<$full_stars; $i++)
                        <small class="fa fa-star btn-star mr-1"></small>
                    @endfor
                    @for($i=0; $i<$half_stars; $i++)
                        <small class="fa fa-star-half-o btn-star mr-1"></small>
                    @endfor
                    @for($i=0; $i<$empty_stars; $i++)
                        <small class="fa fa-star-o btn-star mr-1"></small>
                    @endfor
                    <small>({{$allproduct->ratings()->count()}})</small>
                </div>

                <p class=" price">RM{{$allproduct->list_price_on_store}}</p>
            </div>
        </div>
    </div>
@endforeach
