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
						<div class="col-lg-12">
						@if(session('info'))
							<div class="alert alert-success" style="">
								{{session('info')}}
							</div>
						@endif
						</div>
						<div class="row" id="Advertisements">
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection