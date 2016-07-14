@extends('master')
@section('page-head-title')
	{{ trans('lang.categories') }}
@stop
@section('page-title')
	<h1 class="{{ trans('lang.direction') }}-font text-{{trans('lang.page-direction')}}" > {!! trans('lang.categoriesh') !!}</h1>
@stop
@section('content')
		<div class="row">
			<div class="col-md-12">
				<div class="panel">
					<div class="panel-heading">
						<div class="panel-title pull-{{trans('lang.page-direction')}}">
							<h4 class="text-{{trans('lang.page-direction')}}">INVOICE</h4>
						</div><!--.panel-title-->
					</div><!--.panel-heading-->
					<div class="panel-body">

						<div class="invoice">
							<div class="invoice-heading">
								<div class="row date-row">
									<div class="col-md-6 col-xs-6">
										<img id="barcode" src="../../assets/globals/img/barcode.png" alt="">
									</div><!--.col-md-6-->
									<div class="col-md-6 col-xs-6 invoice-id">
										<h4>INVOICE: #49903123</h4>
										<h5>1 December 2014</h5>
									</div><!--.col-md-6-->
								</div><!--.row-->
								<div class="row customer-row">
									<div class="col-md-6 col-xs-6 company">
										<a href="#" class="company-logo"><img src="../../assets/admin1/img/logo-blue-large@2x.png" alt=""></a>
										<h5>TeamFox</h5>
										44-46 Morningside Road<br>
										Edinburgh<br>
										Italy<br>
										EH10 4BF
									</div><!--.col-md-6-->
									<div class="col-md-6 col-xs-6 customer">
										<a href="#" class="customer-logo"><img src="../../assets/globals/img/brands/1.png" alt=""></a>
										<h5>Sample Company</h5>
										44-46 Morningside Road<br>
										Edinburgh<br>
										United States<br>
										EH10 4BF
									</div><!--.col-md-6-->
								</div><!--.row-->
							</div><!--.invoice-heading-->
							<div class="invoice-body">
								<table class="table table-hover">
									<thead>
										<tr>
											<th></th>
											<th>Product</th>
											<th class="text-right">Quantity</th>
											<th class="text-right">Cost</th>
											<th class="text-right">Total</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>
												Form Wizard
												<small>Dramatically visualize customer directed convergence without revolutionary ROI.</small>
											</td>
											<td class="text-right">10</td>
											<td class="text-right">$85</td>
											<td class="text-right">$850</td>
										</tr>
									</tbody>
								</table>
							</div><!--.invoice-body-->
							<div class="invoice-footer">
								TeamFox - 2015
							</div><!--.invoice-footer-->
						</div><!--.invoice-->

					</div><!--.panel-body-->
				</div><!--.panel-->
			</div><!--.col-md-12-->
		</div><!--.row-->
@stop

@push('scripts')
	<script src={{ asset('js/categories.js') }}></script>
	<script>
		Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
	</script>
@endpush
