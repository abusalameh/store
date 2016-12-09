@extends('master')
@section('page-title-head')
    {{ trans('lang.supplierPage') }}
@endsection


@section('page-title')
    <h1 class="{{ trans('lang.direction') }}-font text-{{trans('lang.page-direction')}} pull-{{ trans('lang.page-direction')}}"> {!! trans('lang.supplierPageh') !!}</h1>
@endsection
@section('content')
    <div id="suppliers" v-cloak>
        {{-- @include('customers.invoices.create') --}}
        {{-- @include('customers.payments.create') --}}
        <div class="row">
          <div class="col-md-12">
              <div class="panel">
                  <div class="panel-heading">
                      <div class="panel-title pull-{{trans('lang.page-direction')}}" dir={{ trans('language.direction') }} >
                          <h4 class="text-{{trans('lang.page-direction')}}">
                             {!! trans('lang.supplierInfo') !!}
                          </h4>
                      </div>
                      <div class="panel-title pull-{{trans('lang.!page-direction')}}" dir={{ trans('language.direction') }} >
                          <div class="dropdown">
                          <button class="btn btn-teal dropdown-toggle" type="button" data-toggle="dropdown">{{ trans('lang.actions')}}
                          <span class="caret"></span></button>
                          <ul class="dropdown-menu">
                            <li><a data-toggle="modal" data-target="#create-user-invoice" data-backdrop="static">{!! trans('lang.addInvoice')!!}</a></li>
                            <li><a data-toggle="modal" data-target="#create-user-payment" data-backdrop="static">{!! trans('lang.addPayment')!!}</a></li>
                          </ul>
                        </div>
                      </div>
                  </div><!--.panel-heading-->
                  <div class="panel-body">
                      <div class="row">
                          <div class="col-md-8 col-md-offset-2">
                              <ul class="list-group text-{{trans('lang.page-direction')}} ">
                                <li class="list-group-item"> {{trans('lang.supplier-id')}} <span class="text-teal pull-{{trans('lang.!page-direction')}}">@{{newSupplier.xid}}</span> </li>
                                <li class="list-group-item"> {{trans('lang.name')}} <span class="text-teal pull-{{trans('lang.!page-direction')}}">@{{newSupplier.name}}</span> </li>
                                <li class="list-group-item"> {{trans('lang.address')}} <span class="text-teal pull-{{trans('lang.!page-direction')}}">@{{newSupplier.address}}</span> </li>
                                <li class="list-group-item"> {{trans('lang.phone')}} <span class="text-teal pull-{{trans('lang.!page-direction')}}">@{{newSupplier.phone}}</span> </li>
                              </ul>
                          </div>
                      </div>
                      <hr>
                      <div class="row">
                          <div class="col-md-12">

								<ul class="nav nav-tabs nav-justified " role="tablist" dir={{ trans('language.direction') }}>

									<li class=""><a href="#invoices" data-toggle="tab" aria-expanded="false">{!! trans('lang.Invoicesh') !!}</a></li>
									<li class=""><a href="#checks" data-toggle="tab" aria-expanded="true">{!! trans('lang.Checksh') !!}</a></li>
                                    <li class=""><a href="#payments" data-toggle="tab" aria-expanded="false">{!! trans('lang.cashPaymentsh') !!}</a></li>
                                    <li class="active"><a href="#balance" data-toggle="tab" aria-expanded="false">{!! trans('lang.netBalance') !!}</a></li>
								</ul>
								<div class="tab-content" dir={{ trans('language.direction') }}>
									<div class="tab-pane  text-{{trans('lang.page-direction')}}" id="payments">
										@include('partials.supplier.payments')
									</div><!--.tab-pane-->
									<div class="tab-pane text-{{trans('lang.page-direction')}}" id="invoices">
                    @include('partials.supplier.invoices')
									</div><!--.tab-pane-->
									<div class="tab-pane text-{{trans('lang.page-direction')}}" id="checks">
										@include('partials.supplier.checks')
									</div><!--.tab-pane-->
                                    <div class="tab-pane active text-{{trans('lang.page-direction')}}" id="balance">
										@include('partials.supplier.balance')
									</div><!--.tab-pane-->
								</div><!--.tab-content-->

							</div>
                      </div>
                  </div><!--.panel-body-->
              </div><!--.panel-->
          </div><!--.col-md-12-->
      </div><!--.row-->
    </div>
@endsection

@push('scripts')
	<script>
		Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
	</script>
    <script src={{ asset('js/suppliers.js') }}></script>
@endpush
