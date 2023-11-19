<style>
	#myBtn {
		display: none;
		position: fixed;
		bottom: 20px;
		right: 30px;
		z-index: 99;
		font-size: 12px;
		border: none;
		outline: none;
		background-color: #384AEB;
		color: white;
		cursor: pointer;
		border-radius: 50px;
		width:30px;
		height:30px
	}

	#myBtn:hover {
		background-color: #555;
	}
	@media (max-width: 441px) {
		#myBtn {
			display: none;
			position: fixed;
			bottom: 80px;
			right: 10px;
			z-index: 99;
			font-size: 12px;
			border: none;
			outline: none;
			background-color: #384AEB;
			color: white;
			cursor: pointer;
			border-radius: 50px;
			width:30px;
			height:30px
		}
	}
</style>

<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
	
	
@foreach($mobile_products as $allproduct)
<div class="col-sm-3 col-6 m-auto">
    <div class="card card-product" style="width:150px;height:auto">
        <a class="card-product__img" href="{{route('showProduct',['id'=>$allproduct->id])}}" style="width:150px;height:150px">
		<div class="card-product__img text-center" style="width:150px;height:150px">
            @if($allproduct->image()->first())
				
                <img class="card-img" style="height:100%; width: 100%; object-fit: cover;border-radius:10px" src="{{asset('storage/'.$allproduct->image()->first()->image)}}" alt="">
            @else
                <img class="card-img" style="height:100%;width: 100%; object-fit: cover;border-radius:10px" src="{{asset('admin/assets/img/avatars/default_product.png')}}" alt="">
            @endif
        </div>
		</a>
        <div class=" p-2 ">
            <p class="card-cate" style="font-size:10px">{{$allproduct->mainCategory()->first() ? $allproduct->mainCategory()->first()->name :''}}</p>
            <p><a href="{{route('showProduct',['id'=>$allproduct->id])}}" class="title text-truncate" style="font-size:14px">{{$allproduct->name}}</a></p>
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
            <p class="price" style="font-size:10px">RM {{$allproduct->list_price_on_store}}</p>
        </div>
    </div>
</div>
@endforeach


<script>
		// Get the button
		let mybutton = document.getElementById("myBtn");

		// When the user scrolls down 20px from the top of the document, show the button
		window.onscroll = function() {scrollFunction()};

		function scrollFunction() {
			if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
				mybutton.style.display = "block";
			} else {
			mybutton.style.display = "none";
			}
		}

		// When the user clicks on the button, scroll to the top of the document
		function topFunction() {
			document.body.scrollTop = 0;
			document.documentElement.scrollTop = 0;
		}
	</script>