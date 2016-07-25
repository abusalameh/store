@extends('master')

@section('page-head-title')
	{{ trans('lang.categories') }}
@stop

@section('page-title')
	<h1 class="{{ trans('lang.direction') }}-font text-{{trans('lang.page-direction')}}" > {!! trans('lang.categoriesh') !!}</h1>
@stop
@section('content')
	<div class="content" id="categories">
		<div class="row">
			<div class="col-md-12">
				<div class="panel">
					<div class="panel-heading">
						<div class="panel-title pull-{{trans('lang.page-direction')}}" >
							<h4 class="text-{{trans('lang.page-direction')}}">
								<span class="text-teal">( @{{count}} )</span> {!! trans('lang.categoriesh') !!}
							</h4>
						</div>
					</div><!--.panel-heading-->
					<div class="panel-body">
						<div class="fixed-table-toolbar">
							<div class="pull-{{trans('lang.page-direction')}} search ">
								<div class="form-group">
									<div class="col-md-12">
										<div class="col-md-3 pull-{{trans('lang.page-direction')}} text-teal hidden-sm hidden-xs"><label><i class="material-icons">search</i></label></div>
										<div class="col-md-9">
											<input class="form-control text-{{trans('lang.page-direction')}} text-teal" dir="{{ trans('lang.direction') }}" type="text" placeholder="{{ trans('lang.search') }}" v-model='query'>
										</div>
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
							<div class="pull-{{trans('lang.!page-direction')}} ">
								<a href="{{ route('categories.create')}}" class="btn btn-sm btn-teal button-striped button-full-striped btn-ripple" >
									{!! trans('lang.addCategory') !!}
								</a>
							</div>
						
						<table class="table table-hover" dir="{{ trans('lang.direction') }}">
							<thead>
								<tr>
									<th class="th-{{trans('lang.direction')}}">{{ trans('lang.id') }}</th>
									<th class="th-{{trans('lang.direction')}}">{{ trans('lang.name') }}</th>
									<th class="th-{{trans('lang.direction')}}">{{ trans('lang.description') }}</th>
									<th class="th-{{trans('lang.direction')}}">{{ trans('lang.actions') }}</th>
								</tr>
							</thead>
							<tbody>
								<tr v-show="@{{ categories.length > 0}}" v-for="category in categories | filterBy query in 'name' 'id' 'description'| limitBy limit ">
									<td class="{{trans('lang.direction')}}-font font-sm" v-cloak>@{{ category.id }}</td>
									<td class="{{trans('lang.direction')}}-font font-sm" v-cloak>@{{ category.name }}</td>
									<td class="{{trans('lang.direction')}}-font font-sm" v-cloak>@{{ category.description }}</td>
									<td>
										<a href="#"  data-toggle="tooltip" data-placement="top" title="{{ trans('lang.view') }}" class="btn btn-xs btn-primary button-striped button-full-striped btn-ripple">
											<i class="material-icons md-18">remove_red_eye</i>
										</a>
										<a href="/categories/@{{category.id}}/edit"  data-toggle="tooltip" data-placement="top" title="{{ trans('lang.edit') }}" class="btn btn-xs btn-warning button-striped button-full-striped btn-ripple">
											<i class="material-icons md-18">mode_edit</i>
										</a>
										<a href="#"  data-toggle="tooltip" data-placement="top" title="{{ trans('lang.delete') }}" class="btn btn-xs btn-danger button-striped button-full-striped btn-ripple">
											<i class="material-icons md-18">delete</i>
										</a>
									</td>
								</tr>
								<tr v-show="categories.length == 0" >
									<td colspan="5">
										{{ trans('lang.noData') }}
									</td>
								</tr>
							</tbody>
						</table>
					</div><!--.panel-body-->
				</div><!--.panel-->
			</div><!--.col-md-12-->
		</div><!--.row-->
	</div>
	</div>
@stop

@push('scripts')
	<script src={{ asset('js/categories.js') }}></script>
	<script>
		Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
	</script>
@endpush
