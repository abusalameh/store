@extends('master')

@section('page-head-title')
	{{ trans('lang.dashboard') }}
@stop
@section('styles')
	<style>
		.card-dashboard-info .card-icon-rtl {
		  position: absolute;
		  left: 20px;
		  top: 20px;
		  font-size: 30px;
		  opacity: .2;
		}
	</style>
@stop
@section('page-title')
	<h1 class="{{ trans('lang.direction') }}-font text-{{trans('lang.page-direction')}}"> {!! trans('lang.control panel') !!}</h1>
@stop
@section('content')
	<div id="dashboard">
		<div class="row">
			<div class="col-md-3">
				<div class="card card-iconic card-teal">
					<div class="card-full-icon ion-bag"></div>

					<div class="card-body text-center">
						<i class="card-icon ion-person-stalker"></i>
						<h4>Shopping Bag</h4>
						<p>Shopping bags are medium sized bags.</p>
					</div><!--.card-body-->

				</div><!--.card-->
			</div><!--.col-md-3-->

			<div class="col-md-3">
				<div class="card card-iconic card-teal">
					<div class="card-full-icon ion-beer"></div>

					<div class="card-body">
						<i class="card-icon ion-beer"></i>
						<h4>Beer</h4>
						<p>Beer is an alcoholic beverage produced...</p>
					</div><!--.card-body-->

				</div><!--.card-->
			</div><!--.col-md-3-->

			<div class="col-md-3">
				<div class="card card-iconic card-teal">
					<div class="card-full-icon ion-clock"></div>

					<div class="card-body">
						<i class="card-icon ion-clock"></i>
						<h4>Clock</h4>
						<p>A clock is an instrument to indicate, keep...</p>
					</div><!--.card-body-->

				</div><!--.card-->
			</div><!--.col-md-3-->

			<div class="col-md-3">
				<div class="card card-iconic card-teal">
					<div class="card-full-icon ion-lock-combination"></div>

					<div class="card-body text-right">
						<i class="card-icon ion-lock-combination"></i>
						<h4>Speedometer</h4>
						<p>A speedometer or a speed meter is a gauge.</p>
					</div><!--.card-body-->

				</div><!--.card-->
			</div><!--.col-md-3-->
		</div><!--.row-->
		<div class="display-animation">
			<div class="row image-row margin-bottom-40">
				<div class="col-md-2 col-sm-12 col-xs-12" dir="{{ trans('lang.direction')}}">
					<div class="card tile card-dashboard-info card-light-blue material-animate material-animated" style="animation-delay: 0.89s;">
						<div class="card-body">
							<div class="{{ trans('lang.card-icon') }}"><i class="fa fa-calculator"></i></div><!--.card-icon-->
							<h4>Open Invoices</h4>
							<p class="result">26</p>
							<small>Waiting to send</small>
						</div>
					</div><!--.card-->
				</div>
				<div class="col-md-2 col-sm-12 col-xs-12" dir="{{ trans('lang.direction')}}">
					<div class="card tile card-dashboard-info card-blue-grey material-animate material-animated" style="animation-delay: 0.96s;">
						<div class="card-body">
							<div class="{{ trans('lang.card-icon') }}"><i class="fa fa-thumbs-o-up"></i></div><!--.card-icon-->
							<h4>New Subscribers</h4>
							<p class="result">183</p>
							<small class="text-{{trans('lang.page-direction')}}"><i class="fa fa-caret-up"></i> 9814 subscribers totally</small>
						</div>
					</div><!--.card-->
				</div><!--.col-->
				<div class="col-md-2 col-sm-12 col-xs-12" dir="{{ trans('lang.direction')}}">
					<div class="card tile card-dashboard-info card-blue-grey material-animate material-animated" style="animation-delay: 0.96s;">
						<div class="card-body">
							<div class="{{ trans('lang.card-icon') }}"><i class="fa fa-thumbs-o-up"></i></div><!--.card-icon-->
							<h4>New Subscribers</h4>
							<p class="result">183</p>
							<small><i class="fa fa-caret-up"></i> 9814 subscribers totally</small>
						</div>
					</div><!--.card-->
				</div>
				<div class="col-md-2 col-sm-12 col-xs-12" dir="{{ trans('lang.direction')}}">
					<div class="card tile card-dashboard-info card-blue-grey material-animate material-animated" style="animation-delay: 0.96s;">
						<div class="card-body">
							<div class="{{ trans('lang.card-icon') }}"><i class="material-icons">person</i></div><!--.card-icon-->
							<h4>{{ trans('lang.customers')}}</h4>
							<p class="result">{{ $data['customers'] }}</p>
							<small><i class="fa fa-caret-up"></i> {{ trans('lang.customersCount')}} : {{ $data['customers'] }}</small>
						</div>
					</div><!--.card-->
				</div>
				<div class="col-md-2 col-sm-12 col-xs-12" dir="{{ trans('lang.direction')}}">
					<div class="card tile card-dashboard-info card-light-blue material-animate material-animated" style="animation-delay: 0.96s;">
						<div class="card-body">
							<div class="{{ trans('lang.card-icon') }}"><i class="material-icons">payment</i></div><!--.card-icon-->
							<h4>{{ trans('lang.total payments')}}</h4>
							<p class="result">{{ $data['paymentCount']}}</p>
							<small><i class="fa fa-caret-up"></i> {{trans('lang.total balance')}} : {{ $data['credit']}} <i class="fa fa-ils"></i></small>
						</div>
					</div><!--.card-->
				</div>
				<div class="col-md-2 col-sm-12 col-xs-12" dir="{{ trans('lang.direction')}}">
					<div class="card tile card-dashboard-info card-light-blue material-animate material-animated" style="animation-delay: 0.82s;">
						<div class="card-body">
							<div class="{{ trans('lang.card-icon') }}"><i class="fa fa-calculator"></i></div><!--.card-icon-->
							<h4>{{ trans('lang.total unpaid invoices')}}</h4>
							<p class="result">{{ $data['notPaidCount']}}</p>
							<small><i class="fa fa-caret-up"></i> {{ trans('lang.unpaid total')}} : {{ $data['debit']}}  <i class="fa fa-ils"></i> </small>
						</div>
					</div><!--.card-->
				</div>
			</div><!--.row-->
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="panel">
					<div class="panel-heading ">
						<a class="panel-title pull-{{ trans('lang.page-direction') }} collapse in {{trans('lang.direction')}}-font" data-toggle="collapse" href="#collapse3" aria-expanded="true" style="height:auto">
							{!! trans('lang.latestPayments',['num' => 10]) !!}
						</a>
					</div><!--.panel-heading-->
					<div id="collapse3" class="panel-collapse collapse {{count($data['latestPayments']) >= 10 ? "" : "in"}} ">
						<div class="panel-body without-padding">
							@if (count($data['latestPayments']))
								<ul class="list-material">
									@foreach ($data['latestPayments'] as $payment)
										<li class="has-action-left has-action-right">
											<a href="#" class="visible">
												<div class="list-action-left">
													<i class="ion-calendar icon-circle"></i>
												</div>
												<div class="list-content">
													<span class="title">{{ $payment->customer->name}}</span>
													<span class="caption" style="color:#2095f2!important">{{ $payment->invoice->description}}</span>
												</div>
												<div class="list-action-right">
													<span class="top">{{ $payment->created_at->diffForHumans()}}</span>
													<i class="ion-android-done bottom text-green" ></i>
												</div>
											</a>
										</li>
									@endforeach
								</ul>
							@endif
						</div><!--.panel-body-->
					</div>
				</div><!--.panel-->
			</div><!--.col-->

			<div class="col-md-6">
				<div class="panel">
					<div class="panel-heading">
						<a class="panel-title pull-{{ trans('lang.page-direction') }} collapsed {{trans('lang.direction')}}-font" data-toggle="collapse" href="#collapse4" aria-expanded="false">
							{!! trans('lang.nextWeekChecks') !!}
						</a>
						@if (count($data['upcomingChecks']))
						<span class="badge badge-primary pull-{{ trans('lang.!page-direction') }}" style="margin:15px">
							{{ count($data['upcomingChecks']) }}
						</span>	
						@endif
					</div>
					<div id="collapse4" class="panel-collapse collapse" aria-expanded="true">
					<div class="panel-body without-padding">
							@if (count($data['upcomingChecks']))
							<ul class="list-material">
								@foreach ($data['upcomingChecks'] as $check)
									<li class="has-action-left has-action-right">
										<a href="#" class="visible">
											<div class="list-action-left">
												<i class="ion-calendar icon-circle"></i>
											</div>
											<div class="list-content">
												<span class="title">{{ $check->customer->name}}</span>
												<span class="caption" style="color:#2095f2!important">{{ $check->invoice->description}}</span>
											</div>
											<div class="list-action-right text-right">
												<span class="top">{{ $check->due_to->diffForHumans()}}</span>
												<i class="ion-android-done bottom text-green" ></i>
											</div>
										</a>
									</li>
								@endforeach
							</ul>
							@endif
						</div><!--.panel-body--></div>
				</div><!--.panel-->
			</div><!--.col-->
			
		</div>
	</div>
@stop