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
									<li><a href='{{url("/post-classified-ad/".$category->maincategory."/".$category->id)}}'>{!!html_entity_decode($category->icons)!!}{{$category->maincategory}}</a></li>
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
						<ul class="nav nav-tabs">
							<li class="nav-item">
								<a href="#home" class="nav-link" data-togle="tab">Electronics</a>
							</li>
						</ul>
						<div class="tab-content" id="myTabContent">
							<div id="home">
								
							</div>
						</div>

						<div id="myTabContent" class="tab-content">
							<div class="" id="home">
							<h1></h1>
							<form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{url('/postCarsBikes')}}" style="padding-left: 20px;">
								{{csrf_field()}}
								<div class="row">
									<div class="col-lg-6">
										@if(count($errors)>0)
											@foreach($errors->all() as $error)
											
											@endforeach
										@endif
									</div>
								</div>

								<div class="row">
									<div class="col-lg-6">
										<div class="col-lg-12">
											<div class="form-group">
											<input type="hidden" name="maincategory" value="{{Request::segment(3) }}">
											<label><strong>Select Subcategory</strong></label>
											<select class="form-control" name="subcategoryid">
												<option value="">Select</option>
												@if(count($subcategories)>0)
													@foreach($subcategories as $subcategory)
														<option value="{{$subcategory->id}}">{{$subcategory->subcategory}}</option>
													@endforeach
												@else
												
												@endif
											</select>
											</div>
										</div>
										<label></label>
										@if($errors->has('subcategoryid'))
											<span class="alert alert-danger" style="margin-left: 13px; padding: 5px;">                            {{$errors->first('subcategoryid')}}</span>
										@endif
									</div>

									<div class="col-lg-6">
										<div class="col-lg-12">
											<div class="form-group">
											<label><strong>Product Name</strong></label>
											<input type="text" class="form-control" name="productname" placeholder="Product Name">
											</div>
										</div>
										<label></label>
										@if($errors->has('subcategoryid'))
											<span class="alert alert-danger" style="margin-left: 13px; padding: 5px;">                            {{$errors->first('productname')}}</span>
										@endif
									</div>
								</div>

								<div class="row">
									<div class="col-lg-6">
										<div class="col-lg-12">
											<div class="form-group">
											<label><strong>Year of Purchase</strong></label>
											<input type="text" class="form-control" name="yearofpurchase" placeholder="Year of Purchase">
											</div>
										</div>
										<label></label>
										@if($errors->has('subcategoryid'))
											<span class="alert alert-danger" style="margin-left: 13px; padding: 5px;">                            {{$errors->first('yearofpurchase')}}</span>
										@endif
									</div>
									<div class="col-lg-6">
										<div class="col-lg-12">
											<div class="form-group">
											<label><strong>Expected Selling Price</strong></label>
											<input type="text" class="form-control" name="expsellprice" placeholder="Expected Selling Price">
											</div>
										</div>
										<label></label>
										@if($errors->has('subcategoryid'))
											<span class="alert alert-danger" style="margin-left: 13px; padding: 5px;">                            {{$errors->first('expsellprice')}}</span>
										@endif
									</div>
								</div>

								<div class="row">
									<div class="col-lg-6">
										<div class="col-lg-12">
											<div class="form-group">
											<label><strong>Your Name</strong></label>
											<input type="text" class="form-control" name="name" placeholder="Your Name">
											</div>
										</div>
										<label></label>
										@if($errors->has('subcategoryid'))
											<span class="alert alert-danger" style="margin-left: 13px; padding: 5px;">                            {{$errors->first('name')}}</span>
										@endif
									</div>
									<div class="col-lg-6">
										<div class="col-lg-12">
											<div class="form-group">
											<label><strong>Your Mobile</strong></label>
											<input type="text" class="form-control" name="mobile" placeholder="Your Mobile">
											</div>
										</div>
										<label></label>
										@if($errors->has('subcategoryid'))
											<span class="alert alert-danger" style="margin-left: 13px; padding: 5px;">                            {{$errors->first('mobile')}}</span>
										@endif
									</div>
								</div>

								<div class="row">
									<div class="col-lg-6">
										<div class="col-lg-12">
											<div class="form-group">
											<label><strong>Your Email</strong></label>
											<input type="text" class="form-control" name="email" placeholder="Your Email">
											</div>
										</div>
										<label></label>
										@if($errors->has('subcategoryid'))
											<span class="alert alert-danger" style="margin-left: 13px; padding: 5px;">                            {{$errors->first('email')}}</span>
										@endif
									</div>
									<div class="col-lg-6">
										<div class="col-lg-12">
											<div class="form-group">
											<label><strong>State</strong></label>
											<select class="form-control" name="state">
												<option value="">Select</option>
												@if(count($states)>0)
													@foreach($states as $state)
														<option value="{{$state->id}}">{{$state->stateName}}</option>
													@endforeach
												@else

												@endif
											</select>
											</div>
										</div>
										<label></label>
										@if($errors->has('subcategoryid'))
											<span class="alert alert-danger" style="margin-left: 13px; padding: 5px;">                            {{$errors->first('state')}}</span>
										@endif
									</div>
								</div>

								<div class="row">
									<div class="col-lg-6">
										<div class="col-lg-12">
											<div class="form-group">
											<label><strong>City</strong></label>
											<input type="text" class="form-control" name="city" placeholder="City">
											</div>
										</div>
										<label></label>
										@if($errors->has('subcategoryid'))
											<span class="alert alert-danger" style="margin-left: 13px; padding: 5px;">                            {{$errors->first('city')}}</span>
										@endif
									</div>
									<div class="col-lg-6">
										<div class="col-lg-12">
											<div class="form-group">
											<label><strong>Photos of Your Vehicle</strong></label>
											<input type="file" class="form-control" name="photo[]" multiple="true">
											</div>
										</div>
										<label></label>
										@if($errors->has('subcategoryid'))
											<span class="alert alert-danger" style="margin-left: 13px; padding: 5px;">                            {{$errors->first('photo')}}</span>
										@endif
									</div>
								</div>

								<div class="row">
									<div class="col-lg-12">
										<div class="form-group" style="text-align: center; margin-top: 20px;">
											<button type="submit" class="btn btn-primary">Ad Your Post</button>
											<button id="reset" class="btn btn-default">Reset</button>
										</div>
									</div>
								</div>

							</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection