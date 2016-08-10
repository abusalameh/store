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
							<div class="{{ trans('lang.card-icon') }}"><i class="fa fa-thumbs-o-up"></i></div><!--.card-icon-->
							<h4>New Subscribers</h4>
							<p class="result">183</p>
							<small><i class="fa fa-caret-up"></i> 9814 subscribers totally</small>
						</div>
					</div><!--.card-->
				</div>
			
				<div class="col-md-2 col-sm-12 col-xs-12" dir="{{ trans('lang.direction')}}">
					<div class="card tile card-dashboard-info card-blue material-animate material-animated" style="animation-delay: 0.96s;">
						<div class="card-body">
							<div class="{{ trans('lang.card-icon') }}"><i class="material-icons">payment</i></div><!--.card-icon-->
							<h4>{{ trans('lang.total payments')}}</h4>
							<p class="result">{{ $data['paymentCount']}}</p>
							<small><i class="fa fa-caret-up"></i> {{trans('lang.total balance')}} : {{ $data['credit']}} <i class="fa fa-ils"></i></small>
						</div>
					</div><!--.card-->
				</div>
				<div class="col-md-2 col-sm-12 col-xs-12" dir="{{ trans('lang.direction')}}">
					<div class="card tile card-dashboard-info card-blue material-animate material-animated" style="animation-delay: 0.82s;">
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
					<div class="panel-heading">
						<div class="panel-title"><h4>ICONIC</h4></div>
					</div><!--.panel-heading-->
					<div class="panel-body without-padding">
						<ul class="list-material">
							<li class="has-action-left has-action-right">
								<a href="#" class="visible">
									<div class="list-action-left">
										<i class="ion-calendar icon-circle"></i>
									</div>
									<div class="list-content">
										<span class="title">Pari Subramanium</span>
										<span class="caption">Collaboratively administrate empowered markets via plug-and-play networks.</span>
									</div>
									<div class="list-action-right">
										<span class="top">15 min</span>
										<i class="ion-android-done bottom"></i>
									</div>
								</a>
							</li>
							<li class="has-action-left has-action-right">
								<a href="#" class="visible">
									<div class="list-action-left">
										<i class="ion-calendar icon"></i>
									</div>
									<div class="list-content">
										<span class="title">Harry Perry</span>
										<span class="caption">Dynamically procrastinate B2C users after installed base benefits.</span>
									</div>
									<div class="list-action-right">
										<span class="top">2 hr</span>
										<i class="ion-android-done bottom"></i>
									</div>
								</a>
							</li>
							<li class="has-action-left has-action-right">
								<a href="#" class="visible">
									<div class="list-action-left">
										<i class="ion-calendar icon-circle"></i>
									</div>
									<div class="list-content">
										<span class="title">Pari Subramanium</span>
										<span class="caption">Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits.</span>
									</div>
									<div class="list-action-right">
										<span class="top">6 hr</span>
										<i class="ion-android-volume-off bottom"></i>
									</div>
								</a>
							</li>
						</ul>
					</div><!--.panel-body-->
				</div><!--.panel-->
			</div><!--.col-->

			<div class="col-md-6">
				<div class="panel">
					<div class="panel-heading">
						<div class="panel-title"><h4>HOVER ACTIONS</h4></div>
					</div><!--.panel-heading-->
					<div class="panel-body without-padding">
						<ul class="list-material has-hidden">
							<li class="has-action-left">
								<a href="#" class="hidden"><i class="ion-android-delete"></i></a>
								<a href="#" class="visible">
									<div class="list-action-left">
										<img src="../../assets/globals/img/faces/1.jpg" class="face-radius" alt="">
									</div>
									<div class="list-content">
										<span class="title">Pari Subramanium</span>
									</div>
								</a>
							</li>
							<li class="has-action-left">
								<a href="#" class="hidden"><i class="ion-android-delete"></i></a>
								<a href="#" class="visible">
									<div class="list-action-left">
										<img src="../../assets/globals/img/faces/2.jpg" class="face-radius" alt="">
									</div>
									<div class="list-content">
										<span class="title">Jason Bryant</span>
									</div>
								</a>
							</li>
							<li class="has-action-left">
								<a href="#" class="hidden"><i class="ion-android-delete"></i></a>
								<a href="#" class="visible">
									<div class="list-action-left">
										<img src="../../assets/globals/img/faces/3.jpg" class="face-radius" alt="">
									</div>
									<div class="list-content">
										<span class="title">Pari Subramanium</span>
									</div>
								</a>
							</li>
						</ul>
					</div><!--.panel-body-->
				</div><!--.panel-->
			</div><!--.col-->

		</div>
	</div>
@stop