@extends('master')
@section('page-title-head')
    {{ trans('lang.editCustomer') }}
@endsection


@section('page-title')
    <h1 class="{{ trans('lang.direction') }}-font text-{{trans('lang.page-direction')}} pull-{{ trans('lang.page-direction')}}"> {!! trans('lang.editCustomer') !!}</h1>
@endsection
@section('content')
    <div id="customers">
        <div class="row">
          <div class="col-md-12">
              <div class="panel">
                  <div class="panel-heading">
                      <div class="panel-title pull-{{trans('lang.page-direction')}}" dir={{ trans('language.direction') }}>
                          <h4 class="text-{{trans('lang.page-direction')}}">
                             {!! trans('lang.editCustomer') !!}
                          </h4>
                      </div>
                  </div><!--.panel-heading-->
                  <div class="panel-body">
                      <button type="button" @click="log">Log</button>
                        <form class="form-horizontal" @submit.prevent>
                         @include('partials.customer.form')
                          <div class="form-buttons">
      						<div class="row">
      							<div class="col-md-offset-3 col-md-9 ">
      								<button class="btn btn-teal pull-{{trans('lang.page-direction')}} {{trans('lang.direction')}}-font" type="submit" :disabled="!isValid" @click="updateCustomer(newCustomer)"> {{ trans('lang.save') }}</button>
      								<a href="{{ route('customers.index') }}" class="btn btn-flat btn-default pull-{{trans('lang.page-direction')}} {{trans('lang.direction')}}-font" >{{ trans('lang.cancel') }}</a>
      							</div>
      						</div>
      					</div>
                    </form>
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
    <script src={{ asset('js/customers.js') }}></script>
@endpush
