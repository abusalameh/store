@extends('master')

@section('page-head-title')
	{{ trans('lang.Invoice') }}
@stop
@section('page-title')
	<h1 class="{{ trans('lang.direction') }}-font text-{{trans('lang.page-direction')}}" > {!! trans('lang.invoice') !!} </h1>
@stop
@section('content')
		<div class="row" id="invoice">
			<div class="col-md-12">
				<div class="panel">
					<div class="panel-heading">
						<div class="panel-title pull-{{trans('lang.page-direction')}}">
							<h4 class="text-{{trans('lang.page-direction')}}">{{ trans('lang.invoice')}}</h4>
						</div><!--.panel-title-->
						<div class="panel-title pull-{{trans('lang.!page-direction')}}">
							<a href="/customers/@{{invoice.customer_id}}" class="btn btn-teal btn-md btn-ripple" style="color:white;!imporant"> {{ trans('lang.back')}} </a>
							<a class="btn btn-teal btn-md btn-ripple" @click="printInvoice()" style="color:white;!imporant"> {{ trans('lang.print')}} </a>
						</div><!--.panel-title-->
					</div><!--.panel-heading-->
					<div class="panel-body">

						<div class="invoice">
							<div class="invoice-heading" dir="{{trans('lang.direction')}}">
								<div class="row date-row">
									<div class="col-md-6 col-xs-6 invoice-id pull-{{trans('lang.page-direction')}} text-{{trans('lang.page-direction')}}">
										<h5 class="{{trans('lang.direction')}}-font">{{ trans('lang.invoice') . " " . trans('lang.Id')}} : #@{{ invoice.id }} |  <span class="text-teal">{{trans('lang.for customer')}} : @{{ customer_name }}</span></h5>
										<h5>{{ trans('lang.invoiceDate')}} : @{{ invoice.invoice_date | date}}</h5>
									</div><!--.col-md-6-->
								</div>
								<!-- <div class="row customer-row pull-{{trans('lang.!page-direction')}}">
									<div class="col-md-6 col-xs-6 company">
										<a href="#" class="company-logo"><img src="../../assets/admin1/img/logo-blue-large@2x.png" alt=""></a>
									</div>
								</div>.row-->
							</div><!--.invoice-heading-->
							<div class="invoice-body ">
								<table class="table table-hover text-{{trans('lang.page-direction')}}" dir="{{ trans('lang.direction')}}">
									<thead>
										<tr>
											<th></th>
											<th class="text-{{trans('lang.page-direction')}}"> {{ trans('lang.product')}}</th>
											<th class="text-{{trans('lang.page-direction')}}">{{ trans('lang.quantity')}}</th>
											<th class="text-{{trans('lang.page-direction')}}">{{ trans('lang.price')}}</th>
											<th class="text-{{trans('lang.page-direction')}}">{{ trans('lang.total')}}</th>
										</tr>
									</thead>
									<tbody>
										<tr v-for="item in items">
											<td>@{{ $index + 1 }}</td>
											<td class="text-{{trans('lang.page-direction')}}">
												@{{ item.name }}
												<small>@{{ item.description}}</small>
											</td>
											<td class="text-{{trans('lang.page-direction')}}">@{{ item.quantity}}</td>
											<td class="text-{{trans('lang.page-direction')}}">@{{ item.price}}</td>
											<td class="text-{{trans('lang.page-direction')}}">@{{ item.price * item.quantity }}</td>
										</tr>
									</tbody>
								</table>
							</div><!--.invoice-body-->
							<div class="invoice-footer pull-{{trans('lang.!page-direction')}}">
								<h5 class="text-teal {{trans('lang.direction')}}-font">{{ trans('lang.invoiceTotal')}} : <span style="background-color:#f7f03d;color:black;"><small><i class="fa fa-ils"></i></small> @{{invoiceTotal }}</span> </h5>
								<hr>
								<h5 class="text-teal {{trans('lang.direction')}}-font">{{ trans('lang.totalPaid')}} : <span style="background-color:#f7f03d;color:black;"><small><i class="fa fa-ils"></i></small> @{{ parseFloat(invoice.total - invoice._total )}}</span> </h5>
								<h5 class="text-teal {{trans('lang.direction')}}-font">{{ trans('lang.remaining')}} : <span style="background-color:#f7f03d;color:black;"><small><i class="fa fa-ils"></i></small> @{{ invoice._total}}</span> </h5>
							</div><!--.invoice-footer-->
						</div><!--.invoice-->

					</div><!--.panel-body-->
				</div><!--.panel-->
			</div><!--.col-md-12-->
		</div><!--.row-->
@stop

@push('scripts')
	<script src={{ asset('js/invoice.js') }}></script>

	<script>
		Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
		Vue.filter('decimal', {
		  // model -> view
		  // formats the value when updating the input element.
		  read: function(val) {
		    return val.toFixed(2)
		  },
		  // view -> model
		  // formats the value when writing to the data.
		  write: function(val, oldVal) {
		    var number = +val.replace(/[^\d.]/g, '')
		    return isNaN(number) ? 0 : parseFloat(number.toFixed(2))
		  }
		})
	</script>
@endpush
