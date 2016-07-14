@extends('master')
@section('page-head-title')
	{{ trans('lang.productst') }}
@stop
@section('page-title')
	<h1 class="{{ trans('lang.direction') }}-font text-{{trans('lang.page-direction')}}"> {!! trans('lang.productsList') !!}</h1>
@stop
@section('content')
	@include('partials.session.message')
	<div id="products" v-cloak>
		<div class="row">

			<div class="col-md-12">
				<div class="panel">
					<div class="panel-heading">
						<div class="panel-title pull-{{trans('lang.page-direction')}}" >
							<h4 class="text-{{trans('lang.page-direction')}}">
								<span class="text-teal">( @{{count}} )</span> {!! trans('lang.productsList') !!}
							</h4>
						</div>
						<div class=" panel-title pull-{{trans('lang.!page-direction')}} text-{{trans('lang.!page-direction')}}">
							<a href="{{ route('products.create')}}" class="btn btn-sm btn-teal button-striped button-full-striped btn-ripple" >
								{!! trans('lang.addProduct') !!}
							</a>
						</div>
					</div><!--.panel-heading-->
					<div class="panel-body">
						<div class="row">
							<div class="col-md-3 pull-{{ trans('lang.page-direction')}}">
								<select class='form-control' dir="{{ trans('lang.direction')}}" v-model="selected" v-on:change="fetchProducts(selected)">
								  <option value="" disabled selected>{{ trans('lang.please select')}}</option>
								  <option value="@{{ category.id}}" v-for="category in categories"  >@{{ category.name }}</option>
								</select>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="pull-{{trans('lang.page-direction')}} search ">
								<div class="form-group">
									<div class="col-md-12">
										<div class="col-md-3 pull-{{trans('lang.page-direction')}} text-teal  hidden-sm hidden-xs"><label><i class="material-icons">search</i></label></div>
										<div class="col-md-9 col-xs-12 col-sm-12">
											<input class="form-control text-{{trans('lang.page-direction')}} text-teal" dir="{{ trans('lang.direction') }}" type="text" placeholder="{{ trans('lang.search') }}" v-model='query'>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-1 pull-{{trans('lang.!page-direction')}} ">
									<select name="" id="" v-model="limit" class="form-control input-sm" >
										<option value="10" selected>10</option>
										<option value="25">25</option>
										<option value="50">50</option>
										<option value="100">100</option>
										<option value="500">500</option>
										<option value="1000">1000</option>
									</select>
								</div>
							</div>
						</div>
						<hr>
						<div class="no-more-tables">
							<table class="table table-bordered table-striped table-condensed table-hover" dir="{{ trans('lang.direction') }}">
								<thead>
									<tr>
										<th class="th-{{trans('lang.direction')}} hidden-xs hidden-sm">{{ trans('lang.productId') }}</th>
										<th class="th-{{trans('lang.direction')}}">{{ trans('lang.productName') }}</th>
										<th class="th-{{trans('lang.direction')}} hidden-xs hidden-sm">{{ trans('lang.productDescription') }}</th>
										<th class="th-{{trans('lang.direction')}} hidden-xs hidden-sm">{{ trans('lang.productNotes') }}</th>
										<th class="th-{{trans('lang.direction')}}">{{ trans('lang.productPrice') }}</th>
										<th class="th-{{trans('lang.direction')}}">{{ trans('lang.productQuantity') }}</th>
										<th class="th-{{trans('lang.direction')}}">{{ trans('lang.actions') }}</th>
									</tr>
								</thead>
								<tbody>
									<tr v-show="@{{ products.length > 0}}" v-for="product in products | filterBy query in 'name' 'id' 'xid' 'price' 'quantity'| limitBy limit | paginate">

										<td class="{{trans('lang.direction')}}-font font-sm hidden-xs hidden-sm" data-title="{{ trans('lang.productId') }}">@{{ product.xid }}</td>
										<td class="{{trans('lang.direction')}}-font font-sm" data-title="{{ trans('lang.productName') }}">@{{ product.name }}</td>
										<td class="{{trans('lang.direction')}}-font font-sm hidden-xs hidden-sm" data-title="{{ trans('lang.productDescription') }}">@{{ product.description }}</td>
										<td class="{{trans('lang.direction')}}-font font-sm hidden-xs hidden-sm" data-title="{{ trans('lang.productNotes') }}">@{{ product.notes }}</td>
										<td class="{{trans('lang.direction')}}-font font-sm" data-title="{{ trans('lang.productPrice') }}">@{{ product.price }}</td>
										<td class="{{trans('lang.direction')}}-font font-sm" data-title="{{ trans('lang.productQuantity') }}">@{{ product.quantity }}</td>

										<td data-title="{{ trans('lang.actions') }}">
											<a href="#"  data-toggle="tooltip" data-placement="top" title="{{ trans('lang.view') }}" class="btn btn-xs btn-primary button-striped button-full-striped btn-ripple">
												<i class="material-icons md-18">remove_red_eye</i>
											</a>
											<a href="/product/@{{product.id}}/edit"  data-toggle="tooltip" data-placement="top" title="{{ trans('lang.edit') }}" class="btn btn-xs btn-warning button-striped button-full-striped btn-ripple">
												<i class="material-icons md-18">mode_edit</i>
											</a>
											<a @click="deleteProduct(product)" data-toggle="tooltip" data-placement="top" title="{{ trans('lang.delete') }}" class="btn btn-xs btn-danger button-striped button-full-striped btn-ripple">
												<i class="material-icons md-18">delete</i>
											</a>
										</td>
									</tr>
									<tr v-show="products.length == 0" >
										<td colspan="7" >
											<center>{{ trans('lang.noData') }}</center>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div><!--.panel-body-->
				</div><!--.panel-->
			</div><!--.col-md-12-->
		</div><!--.row-->
	</div>
	</div>
@stop

@push('scripts')
	<script src={{ asset('js/products.js') }}></script>
	<script>
		Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
	</script>
@endpush
