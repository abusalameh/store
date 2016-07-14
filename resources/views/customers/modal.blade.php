
<div class="modal scale fade" id="customerModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-{{trans('lang.page-direction')}} text-teal" >{!! trans('lang.addCustomer') !!}</h4>
				<hr>
			</div>
			<div class="modal-body text-{{trans('lang.page-direction')}}" dir="{{trans('lang.direction')}}">
				<form class="form-horizontal form-striped form-bordered" method="POST" @submit.prevent >
					{{ csrf_token() }}
					{{ method_field('POST') }}
					<div class="form-content">
						<div class="form-group" v-bind:class="{ 'has-error': !validation.name}">
							<label class="control-label col-md-2 pull-{{trans('lang.page-direction')}} {{trans('lang.page-direction')}}-font">{{ trans('lang.name')}}</label>
							<div class="col-md-9 pull-{{trans('lang.page-direction')}}">
								<div class="inputer">
									<div class="input-wrapper">
										<input type="text" name="name" class="form-control" v-model="newCustomer.name" placeholder="{{ trans('lang.name') }}">
									</div>
									<span class="help-block" v-show="!isValid && !validation.name"><small>{{ trans('lang.invalid name') }}</small></span>
								</div>
							</div>
						</div><!--.form-group-->
						<div class="form-group" v-bind:class="{ 'has-error': !validation.address}">
							<label class="control-label col-md-2 pull-{{trans('lang.page-direction')}} {{trans('lang.page-direction')}}-font">{{ trans('lang.address')}}</label>
							<div class="col-md-9 pull-{{trans('lang.page-direction')}}">
								<div class="inputer">
									<div class="input-wrapper">
										<input type="text" name="address" class="form-control" v-model="newCustomer.address" placeholder="{{ trans('lang.address') }}">
										<span class="help-block" v-show="!isValid && !validation.address"><small>{{ trans('lang.invalid address') }}</small></span>
									</div>
								</div>
							</div>
						</div><!--.form-group-->
						<div class="form-group" v-bind:class="{ 'has-error': !validation.phone}">
							<label class="control-label col-md-2 pull-{{trans('lang.page-direction')}} {{trans('lang.page-direction')}}-font">{{ trans('lang.phone')}}</label>
							<div class="col-md-9 pull-{{trans('lang.page-direction')}}">
								<div class="inputer">
									<div class="input-wrapper">
										<input type="text" name="phone" class="form-control" v-model="newCustomer.phone" placeholder="{{ trans('lang.phone') }}">
										<span class="help-block" v-show="!isValid && !validation.phone"><small>{{ trans('lang.invalid phone') }}</small></span>
									</div>
								</div>
							</div>
						</div><!--.form-group-->
					</div>
					<div class="form-buttons">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<button class="btn btn-teal" type="submit" data-dismiss="modal" @click="addCustomer" :disabled="!isValid"> {{ trans('lang.save') }}</button>
								<button type="button" class="btn btn-flat btn-default" data-dismiss="modal">{{ trans('lang.cancel') }}</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div><!--.modal-content-->
	</div><!--.modal-dialog-->
</div><!--.modal-->


<div class="modal scale fade" id="customerModalUpdate" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-{{trans('lang.page-direction')}} text-teal" >{!! trans('lang.editCustomer') !!}</h4>
				<hr>
			</div>
			<div class="modal-body text-{{trans('lang.page-direction')}}" dir="{{trans('lang.direction')}}">
				<form class="form-horizontal form-striped form-bordered" method="POST" @submit.prevent >
					{{ csrf_token() }}
					{{ method_field('POST') }}
					<div class="form-content">
						<div class="form-group" v-bind:class="{ 'has-error': !validation.name}">
							<label class="control-label col-md-2 pull-{{trans('lang.page-direction')}} {{trans('lang.page-direction')}}-font">{{ trans('lang.name')}}</label>
							<div class="col-md-9 pull-{{trans('lang.page-direction')}}">
								<div class="inputer">
									<div class="input-wrapper">
										<input type="text" name="name" class="form-control" v-model="newCustomer.name" placeholder="{{ trans('lang.name') }}">
									</div>
									<span class="help-block" v-show="!isValid && !validation.name"><small>{{ trans('lang.invalid name') }}</small></span>
								</div>
							</div>
						</div><!--.form-group-->
						<div class="form-group" v-bind:class="{ 'has-error': !validation.address}">
							<label class="control-label col-md-2 pull-{{trans('lang.page-direction')}} {{trans('lang.page-direction')}}-font">{{ trans('lang.address')}}</label>
							<div class="col-md-9 pull-{{trans('lang.page-direction')}}">
								<div class="inputer">
									<div class="input-wrapper">
										<input type="text" name="address" class="form-control" v-model="newCustomer.address" placeholder="{{ trans('lang.address') }}">
										<span class="help-block" v-show="!isValid && !validation.address"><small>{{ trans('lang.invalid address') }}</small></span>
									</div>
								</div>
							</div>
						</div><!--.form-group-->
						<div class="form-group" v-bind:class="{ 'has-error': !validation.phone}">
							<label class="control-label col-md-2 pull-{{trans('lang.page-direction')}} {{trans('lang.page-direction')}}-font">{{ trans('lang.phone')}}</label>
							<div class="col-md-9 pull-{{trans('lang.page-direction')}}">
								<div class="inputer">
									<div class="input-wrapper">
										<input type="text" name="phone" class="form-control" v-model="newCustomer.phone" placeholder="{{ trans('lang.phone') }}">
										<span class="help-block" v-show="!isValid && !validation.phone"><small>{{ trans('lang.invalid phone') }}</small></span>
									</div>
								</div>
							</div>
						</div><!--.form-group-->
					</div>
					<div class="form-buttons">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<button class="btn btn-teal" type="submit" data-dismiss="modal" @click="@click="editCustomer(customer)" :disabled="!isValid"> {{ trans('lang.save') }}</button>
								<button type="button" class="btn btn-flat btn-default" data-dismiss="modal">{{ trans('lang.cancel') }}</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div><!--.modal-content-->
	</div><!--.modal-dialog-->
</div><!--.modal-->
<div class="modal scale fade" id="customerModalShow" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-{{trans('lang.page-direction')}} text-teal" >{!! trans('lang.showCustomer') !!}</h4>
				<hr>
			</div>
			<div class="modal-body text-{{trans('lang.page-direction')}}" dir="{{trans('lang.direction')}}">
				<form class="form-horizontal form-striped form-bordered" method="POST" @submit.prevent >
					{{ csrf_token() }}
					{{ method_field('POST') }}
					<div class="form-content">
						<div class="form-group" v-bind:class="{ 'has-error': !validation.name}">
							<label class="control-label col-md-2 pull-{{trans('lang.page-direction')}} {{trans('lang.page-direction')}}-font">{{ trans('lang.name')}}</label>
							<div class="col-md-9 pull-{{trans('lang.page-direction')}}">
								<div class="inputer">
									<div class="input-wrapper">
										<input type="text" name="name" class="form-control" v-model="newCustomer.name" placeholder="{{ trans('lang.name') }}" :disabled="true">
									</div>
									<span class="help-block" v-show="!isValid && !validation.name"><small>{{ trans('lang.invalid name') }}</small></span>
								</div>
							</div>
						</div><!--.form-group-->
						<div class="form-group" v-bind:class="{ 'has-error': !validation.address}">
							<label class="control-label col-md-2 pull-{{trans('lang.page-direction')}} {{trans('lang.page-direction')}}-font">{{ trans('lang.address')}}</label>
							<div class="col-md-9 pull-{{trans('lang.page-direction')}}">
								<div class="inputer">
									<div class="input-wrapper">
										<input type="text" name="address" class="form-control" v-model="newCustomer.address" placeholder="{{ trans('lang.address') }}" :disabled="true">
										<span class="help-block" v-show="!isValid && !validation.address"><small>{{ trans('lang.invalid address') }}</small></span>
									</div>
								</div>
							</div>
						</div><!--.form-group-->
						<div class="form-group" v-bind:class="{ 'has-error': !validation.phone}">
							<label class="control-label col-md-2 pull-{{trans('lang.page-direction')}} {{trans('lang.page-direction')}}-font">{{ trans('lang.phone')}}</label>
							<div class="col-md-9 pull-{{trans('lang.page-direction')}}">
								<div class="inputer">
									<div class="input-wrapper">
										<input type="text" name="phone" class="form-control" v-model="newCustomer.phone" placeholder="{{ trans('lang.phone') }}" :disabled="true">
										<span class="help-block" v-show="!isValid && !validation.phone"><small>{{ trans('lang.invalid phone') }}</small></span>
									</div>
								</div>
							</div>
						</div><!--.form-group-->
					</div>
					<div class="form-buttons">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<!-- <button class="btn btn-teal" type="submit" data-dismiss="modal" @click="@click="editCustomer(customer)" :disabled="!isValid"> {{ trans('lang.save') }}</button> -->
								<button type="button" class="btn btn-flat btn-default" data-dismiss="modal">{{ trans('lang.cancel') }}</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div><!--.modal-content-->
	</div><!--.modal-dialog-->
</div><!--.modal-->
