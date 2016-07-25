@extends('master')
@section('page-title-head')
    {{ trans('lang.newCategory') }}
@endsection

@section('page-title')
    <h1 class="{{ trans('lang.direction') }}-font text-{{trans('lang.page-direction')}} pull-{{ trans('lang.page-direction')}}"> {!! trans('lang.addCategoryh') !!}</h1>
@endsection
@section('content')
    <div id="categories">
        <div class="row">
          <div class="col-md-12">
              <div class="panel">
                  <div class="panel-heading">
                      <div class="panel-title pull-{{trans('lang.page-direction')}}" dir={{ trans('language.direction') }}>
                          <h4 class="text-{{trans('lang.page-direction')}}">
                             {!! trans('lang.addCategory') !!}
                          </h4>
                      </div>
                      <div class="panel-title pull-{{trans('lang.!page-direction')}}" dir={{ trans('language.direction') }}>
                          <div class="checkboxer text-{{trans('lang.page-direction')}}" >
                              <input type="checkbox" value="" id="check1" v-model="anotherCategory" >
                              <label for="check1"> {{ trans('lang.anotherCategory')}} </label>  
                          </div>
                      </div>
                  </div><!--.panel-heading-->
                  <div class="panel-body">
                      <form class="form-horizontal" method="post" @prevent.submit>
                          @include('categories.form')
                          <div class="form-buttons">
                              <div class="row">
                                  <div class="col-md-offset-3 col-md-9 ">
                                      <button class="btn btn-teal pull-{{trans('lang.page-direction')}} {{trans('lang.direction')}}-font" type="submit" :disabled="!isValid" @click="addCategory"> {{ trans('lang.save') }}</button>
                                      <a href="{{ route('categories.index') }}" class="btn btn-flat btn-default pull-{{trans('lang.page-direction')}} {{trans('lang.direction')}}-font" >{{ trans('lang.cancel') }}</a>
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


	<script src={{ asset('js/categories.js') }}></script>
	<script>
		Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
	</script>
@endpush
