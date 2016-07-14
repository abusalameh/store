@extends('master')
@section('page-head-title')
	{{ trans('lang.Invoices') }}
@stop
@section('page-title')
	<h1 class="{{ trans('lang.direction') }}-font text-{{trans('lang.page-direction')}}"> {!! trans('lang.Invoicesh') !!}</h1>
@stop
@section('content')
	@include('partials.session.message')
	<div id="invoices" v-cloak>
		<div class="row">

			<div class="col-md-12">
				<div class="panel">
					<div class="panel-heading">
						<div class="panel-title pull-{{trans('lang.page-direction')}}" >
							<h4 class="text-{{trans('lang.page-direction')}}">
								<span class="text-teal">( @{{count}} )</span> {!! trans('lang.Invoicesh') !!}
							</h4>
						</div>
						<div class=" panel-title pull-{{trans('lang.!page-direction')}} text-{{trans('lang.!page-direction')}}">
								<a href="{{ route('invoices.create')}}" class="btn btn-sm btn-teal button-striped button-full-striped btn-ripple" >
									{!! trans('lang.addInvoice') !!}
								</a>
						</div>
					</div><!--.panel-heading-->
					<div class="panel-body">
						<div class="row">
							<div class="col-md-3 pull-{{ trans('lang.page-direction')}}">
								<select class='form-control' dir="{{ trans('lang.direction')}}" v-model="selected" v-on:change="fetchInvoices(selected)">
								  <option value="" disabled selected>{{ trans('lang.please select')}}</option>
								  <option value="@{{ customer.id}}" v-for="customer in customers"  >@{{ customer.name }}</option>
								</select>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="pull-{{trans('lang.page-direction')}} search ">
								<div class="form-group">
									<div class="col-md-12">
										<div class="col-md-3 pull-{{trans('lang.page-direction')}} text-teal hidden-sm hidden-xs"><label><i class="material-icons">search</i></label></div>
										<div class="col-md-9 col-sm-12 col-xs-12">
											<input class="form-control text-{{trans('lang.page-direction')}} text-teal" dir="{{ trans('lang.direction') }}" type="text" placeholder="{{ trans('lang.search') }}" v-model='query'>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-1 col-sm-3 col-xs-3 pull-{{trans('lang.!page-direction')}} ">
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
						<hr>
						<div class="no-more-tables">
							<table class="table table-bordered table-striped table-condensed table-hover" dir="{{ trans('lang.direction') }}">
							<thead align="center">
								<tr>
									<th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.invoiceId') }}</center></th>
									<th class="th-{{trans('lang.direction')}} hidden-xs hidden-sm"><center>{{ trans('lang.invoiceDescription') }}</center></th>
									<th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.invoiceTotal') }}</center></th>
									<th class="th-{{trans('lang.direction')}} hidden-xs hidden-sm"><center>{{ trans('lang.invoiceDiscount') }}</center></th>
									<th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.invoiceStatus') }}</center></th>
									<th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.invoiceDate') }}</center></th>
									{{-- <th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.actions') }}</center></th> --}}
									<th class="th-{{trans('lang.direction')}}"></th>
								</tr>
							</thead>
							<tbody align="center">
								<tr v-show="@{{ invoices.length > 0}}" v-for="invoice in invoices | filterBy query in 'name' 'id' 'xid' 'price' 'quantity'| limitBy limit | paginate">

									<td class="{{trans('lang.direction')}}-font font-sm" data-title="{{trans('lang.invoiceId')}}">@{{ invoice.xid }}</td>
									<td class="{{trans('lang.direction')}}-font font-sm hidden-xs hidden-sm" data-title="{{trans('lang.invoiceDescription')}}">@{{ invoice.description }}</td>
									<td class="{{trans('lang.direction')}}-font font-sm" data-title="{{trans('lang.invoiceTotal')}}">@{{ invoice.total }}</td>
									<td class="{{trans('lang.direction')}}-font font-sm hidden-xs hidden-sm" data-title="{{trans('lang.invoiceDiscount')}}">@{{ invoice.discount | percentage}}</td>
									<td class="{{trans('lang.direction')}}-font font-sm" data-title="{{trans('lang.invoiceStatus')}}">@{{ (invoice.status == 1) ? 'مدفوعة' : 'غير مدفوعة'  }}</td>
									<td class="{{trans('lang.direction')}}-font font-sm" data-title="{{trans('lang.invoiceDate')}}">@{{ invoice.created_at | timestamp }}</td>

									{{-- <td data-title="{{trans('lang.actions')}}"> --}}
									<td>
										<!-- Single button -->
										<div class="btn-group">
										  <button type="button" class="btn btn-teal dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										    {{ trans('lang.actions')}} <span class="caret"></span>
										  </button>
										  <ul class="dropdown-menu">
										    <li class="text-{{trans('lang.!page-direction')}}"><a href="/invoices/@{{invoice.id}}"><i class="material-icons md-18">remove_red_eye</i> {{ trans('lang.view')}}</a></li>
										    <li class="text-{{trans('lang.!page-direction')}}"><a href="#"><i class="material-icons md-18">mode_edit</i> {{ trans('lang.edit')}}</a></li>
										    <li class="text-{{trans('lang.!page-direction')}}"><a href="#"><i class="material-icons md-18">delete</i> {{ trans('lang.delete')}}</a></li>
										    <li role="separator" class="divider"></li>
										    <li><a href="#">Separated link</a></li>
										  </ul>
										</div>
										{{-- <a href="#"  data-toggle="tooltip" data-placement="top" title="{{ trans('lang.view') }}" class="btn btn-xs btn-primary button-striped button-full-striped btn-ripple">
											<i class="material-icons md-18">remove_red_eye</i>
										</a>
										<a href="/product/@{{product.id}}/edit"  data-toggle="tooltip" data-placement="top" title="{{ trans('lang.edit') }}" class="btn btn-xs btn-warning button-striped button-full-striped btn-ripple">
											<i class="material-icons md-18">mode_edit</i>
										</a>
										<a @click="deleteProduct(product)" data-toggle="tooltip" data-placement="top" title="{{ trans('lang.delete') }}" class="btn btn-xs btn-danger button-striped button-full-striped btn-ripple">
											<i class="material-icons md-18">delete</i>
										</a> --}}
									</td>
								</tr>
								<tr v-show="invoices.length == 0" >
									<td colspan="7">
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
	<script src={{ asset('js/invoices.js') }}></script>
	<script>
		Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
	</script>
@endpush
