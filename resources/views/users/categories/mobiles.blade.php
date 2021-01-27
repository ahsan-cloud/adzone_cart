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
						<strong>Advertisements</strong>
					</div>
					<div class="card-body">
						<div class="row">
							@if(count($mobiles)>0)
								@foreach($mobiles as $row)
								<div class="col-md-3">
									<div class="productCard">
										<img src=<?php echo strtok($row->photo, ',')?> 
										style= "padding:10px !important; width: 100%; height: 182px;"/>
										<h3>{{$row->productname}}</h3>
										<p>{{$row->expsellprice}}</p>
										<p>{{$row->city}}</p>
										<p><a href='{{url("/product/view/{$row->id}")}}'>VIEW</a></p>
									</div>
								</div>
								@endforeach
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection