@extends('master')
@section('page-head-title')
	{{ trans('lang.suppliers') }}
@stop
@section('page-title')
	<h1 class="{{ trans('lang.direction') }}-font text-{{trans('lang.page-direction')}}"> {!! trans('lang.suppliersList') !!}</h1>
@stop
@section('content')
	@include('partials.session.message')
	<div id="suppliers" v-cloak>
		<div class="row">
			<div class="col-md-12">
				<div class="panel">
					<div class="panel-heading">
						<div class="panel-title pull-{{trans('lang.page-direction')}}" >
							<h4 class="text-{{trans('lang.page-direction')}}">
								<span class="text-teal">( @{{count}} )</span> {!! trans('lang.suppliersList') !!}
							</h4>
						</div>
						<div class=" panel-title pull-{{trans('lang.!page-direction')}} text-{{trans('lang.!page-direction')}}">
							<a href="{{ route('suppliers.create')}}" class="btn btn-sm btn-teal button-striped button-full-striped btn-ripple" >
								{!! trans('lang.addSupplier') !!}
							</a>
						</div>
					</div><!--.panel-heading-->
					<div class="panel-body">
						<div class="row">
							<div class="pull-{{trans('lang.page-direction')}} search ">
								<div class="form-group">
									<div class="col-md-12">
										<div class="col-md-3 pull-{{trans('lang.page-direction')}} text-teal hidden-xs hidden-sm"><label><i class="material-icons">search</i></label></div>
										<div class="col-md-9 col-sm-12 col-xs-12">
											<input class="form-control text-{{trans('lang.page-direction')}} text-teal" dir="{{ trans('lang.direction') }}" type="text" placeholder="{{ trans('lang.search') }}" v-model='query'>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-1 pull-{{trans('lang.!page-direction')}} ">
								<select name="" id="" v-model="limit" class="form-control input-sm">
									<option value="10" selected>10</option>
									<option value="25">25</option>
									<option value="50">50</option>
									<option value="100">100</option>
									<option value="500">500</option>
									<option value="1000">1000</option>
								</select>
							</div>
						</div>
							<hr>
						<div class="no-more-tables">
							<table class="table table-bordered table-striped table-condensed table-hover" dir="{{ trans('lang.direction') }}">
								<thead>
									<tr>
										<th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.supplier-id') }}</center></th>
										<th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.name') }}</center></th>
										<th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.address') }}</center></th>
										<th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.phone') }}</center></th>
										<th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.actions') }}</center></th>
									</tr>
								</thead>
								<tbody align="center">
									<tr v-show="@{{ suppliers.length > 0}}" v-for="supplier in suppliers | filterBy query in 'name' 'id' 'xid' 'address' 'phone'| limitBy limit | paginate">

										<td class="{{trans('lang.direction')}}-font font-sm" data-title="{{ trans('lang.supplier-id') }}">@{{ supplier.xid }}</td>
										<td class="{{trans('lang.direction')}}-font font-sm" data-title="{{ trans('lang.name') }}">@{{ supplier.name }}</td>
										<td class="{{trans('lang.direction')}}-font font-sm" data-title="{{ trans('lang.address') }}">@{{ supplier.address }}</td>
										<td class="{{trans('lang.direction')}}-font font-sm" data-title="{{ trans('lang.phone') }}">@{{ supplier.phone }}</td>
										<td class="{{trans('lang.direction')}}-font font-sm" data-title="{{ trans('lang.actions') }}">
											<a href="/suppliers/@{{supplier.id}}"  data-toggle="tooltip" data-placement="top" title="{{ trans('lang.view') }}" class="btn btn-xs btn-primary button-striped button-full-striped btn-ripple">
												<i class="material-icons md-18">remove_red_eye</i>
											</a>
											<a href="/suppliers/@{{supplier.id}}/edit"  data-toggle="tooltip" data-placement="top" title="{{ trans('lang.edit') }}" class="btn btn-xs btn-warning button-striped button-full-striped btn-ripple">
												<i class="material-icons md-18">mode_edit</i>
											</a>
											<a   onclick="return confirm(trans('lang.delete are you sure ?'));"data-toggle="tooltip" data-placement="top" title="{{ trans('lang.delete') }}" class="btn btn-xs btn-danger button-striped button-full-striped btn-ripple">
												<i class="material-icons md-18">delete</i>
											</a>
										</td>
									</tr>
									<tr v-show="suppliers.length == 0" >
										<td colspan="5">
											{{ trans('lang.noData') }}
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
	<script src={{ asset('js/suppliers.js') }}></script>
	<script>
		Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
	</script>
@endpush
