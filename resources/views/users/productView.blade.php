@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-3">
				<div class="card">
					<div class="card-header">
						<strong>Categories</strong>
					</div>
					<div class="card-body cardcategories">
						<ul class="userpgcategory fa-ul">
							@if(isset($categories))
								@if(count($categories)>0)
									@foreach($categories as $category)
									<li><a href='{{url("/viewAds/".$category->maincategory."/".$category->id)}}'>{!!html_entity_decode($category->icons)!!}{{$category->maincategory}}</a></li>
									@endforeach
								@else

								@endif
							@endif
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="card">
					<div class="card-header">
						<strong>Product Detail</strong>
					</div>
					<div class="card-body">
							@if(count($product)>0)
								@foreach($product as $ad)
									<?php
										$img= [];
										$img= explode(",", $ad->photo)
									?>
						<div class="row">
							<div class="col-lg-6">
								<div class="row featured" id="featured-image" 
								style="border: 1px solid #ccc">
									<img src="{{$img[0]}}" alt="" style="width: 80%;">
									<p>
									@if(isset($img[1]))
									<img src="{{$img[1]}}" alt="" style="width: 100px; height: 100px;">
									@endif
									
									@if(isset($img[2]))
									<img src="{{$img[2]}}" alt="" style="width: 100px; height: 100px;">
									@endif
									
									@if(isset($img[3]))
									<img src="{{$img[3]}}" alt="" style="width: 100px; height: 100px">
									@endif
									</p>
								</div>
							</div>
						
							<div class="col-lg-6">
								<div class="card border-secondary wb-3" style="max-width: 20rem; 
								border: 1px solid #ccc !important">
									<div class="card-header">PRODUCT DETAILS</div>
									<div class="card-body">
										<h6>Name:
											<span class="xtra-large">{{$ad->productname}}</span>
										</h6>
										<hr>
										<h6>Purchased On:
											<span class="xtra-large">{{$ad->yearofpurchase}}</span>
										</h6>
										<hr>
										<h6>Price
											<span class="xtra-large">{{$ad->expsellprice}}</span>
										</h6>
										<hr>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="card border-secondary wb-3" style="max-width: 20rem; 
								border: 2px solid #ccc !important">
									<div class="card-header">SELLER DETAILS</div>
									<div class="card-body">
										<h6>Name:
											<span class="xtra-large">{{$ad->name}}</span>
										</h6>
										<hr>
										<h6>Mobile:
											<span class="xtra-large">{{$ad->mobile}}</span>
										</h6>
										<hr>
										<h6>Email:
											<span class="xtra-large">{{$ad->email}}</span>
										</h6>
										<hr>
										<h6>City:
											<span class="xtra-large">{{$ad->city}}</span>
										</h6>
									</div>
								</div>
							</div>
								@endforeach
							@else
								<p>Not Found!</p>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection