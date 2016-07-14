<div class="modal scale fade" id="create-user-payment" tabindex="-1" role="dialog" aria-hidden="true" dir="{{ trans('lang.direction')}}">
	<div class="modal-dialog modal-lg" style="width:60%">
		<div class="modal-content">
			<div class="modal-header" style="background-color:teal;padding-bottom:20px">
				<h4 class="modal-title {{trans('lang.direction')}}-font text-{{trans('lang.page-direction')}}" style="color:white">{!! trans('lang.addPayment') !!}</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12 pull-{{trans('lang.!page-direction')}} ">
						<div class="control-group">
							<div class="col-md-9">
								<div class="control-group">
									<div class="controls">
										<div class="input-group">
											<span class="input-group-addon"><i class="ion-android-calendar"></i> تاريخ الدفعة</span>
												<input type="text" name="payment_date" class="form-control bootstrap-daterangepicker-basic" value="{{ $current_date }}" v-model="payment.date"/>
										</div>
									</div>
								</div>
							</div><!--.col-md-9-->
						</div>
					</div>
				</div>
				<hr>
				<div class="form-content">
					<div class="row">
						<div class="form-group">
							<label class="control-label col-md-2 pull-{{trans('lang.page-direction')}}">{{ trans('lang.customerName')}}</label>
							<div class="col-md-10 pull-{{trans('lang.page-direction')}}">
								<div class="inputer">
									<div class="input-wrapper">
										<input type="text" name="" disabled v-model="newCustomer.name" class="form-control {{trans('lang.direction')}}-font">
									</div>
								</div>
							</div>
						</div><!--.form-group-->
					</div>
					<hr>
					<div class="row">
						<div class="form-group">
							<label class="control-label col-md-2 pull-{{trans('lang.page-direction')}}">{{ trans('lang.pickInvoice') }}</label>
							<div class="col-md-10 pull-{{trans('lang.page-direction')}}">
								<select class='form-control' dir="{{ trans('lang.direction')}}" v-model="selectedInvoice" >
								  <option value="" disabled selected>{{ trans('lang.please select')}}</option>
								  <option value="@{{ $index }}" v-for="invoice in newCustomer.invoices" disabled="@{{ invoice.status != 0 }}">{{ trans('lang.invoice') . " " . trans('lang.Id') }} : @{{ invoice.id }}  - @{{ invoice.description}}</option>
								</select>
							</div>
						</div><!--.form-group-->
					</div>
					<hr>
					<div class="row" v-show="selectedInvoice">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-2 pull-{{trans('lang.page-direction')}}">{{ trans('lang.totalPaid')}}</label>
								<div class="col-md-10 pull-{{trans('lang.page-direction')}}">
									<div class="inputer">
										<div class="input-wrapper">
											<input type="text" name="" disabled value="@{{newCustomer.invoices[selectedInvoice].total - newCustomer.invoices[selectedInvoice]._total}}" class="form-control {{trans('lang.direction')}}-font">
										</div>
									</div>
								</div>
							</div><!--.form-group-->
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-2 pull-{{trans('lang.page-direction')}}">{{ trans('lang.remaining')}}</label>
								<div class="col-md-10 pull-{{trans('lang.page-direction')}}">
									<div class="inputer">
										<div class="input-wrapper">
											<input type="text" name="" disabled value="@{{ newCustomer.invoices[selectedInvoice]._total }}" class="form-control {{trans('lang.direction')}}-font">
										</div>
									</div>
								</div>
							</div><!--.form-group-->
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="form-group" v-show="selectedInvoice">
							<label class="control-label col-md-2 pull-{{trans('lang.page-direction')}}">{{ trans('lang.paymentMethod') }}</label>
							<div class="col-md-10 pull-{{trans('lang.page-direction')}}">
								<select class='form-control' dir="{{ trans('lang.direction')}}" v-model="payment.paymentMethod">
								  <option value="" disabled selected>{{ trans('lang.please select')}}</option>
								  <option value="check" v-model="payment.paymentMethod" >{{ trans('lang.check')}}</option>
								  <option value="cash" v-model="payment.paymentMethod" > {{ trans('lang.cash')}}</option>
								</select>
							</div>
						</div><!--.form-group-->
						<hr>
						<div class="form-group" v-show="paymentMethod == 'check'">
							<label class="control-label col-md-2 pull-{{trans('lang.page-direction')}}">{{ trans('lang.paymentDuo') }}</label>
							<div class="col-md-10 pull-{{trans('lang.page-direction')}}">
								<div class="control-group">
										<div class="control-group">
											<div class="controls">
												<div class="input-group">
													<span class="input-group-addon"><i class="ion-android-calendar"></i></span>

													<!-- <div class="inputer"> -->
														<!-- <div class="input-wrapper"> -->
															{{-- <input type="text" name="birthday" class="form-control bootstrap-daterangepicker-basic" value="@{{invoice.date() }}" v-model="invoice.date"/> --}}
															<input type="text" name="birthday" class="form-control bootstrap-daterangepicker-basic" value="{{ $current_date }}" v-model="payment.due_to"/>
														<!-- </div> -->
													<!-- </div> -->
												</div>
											</div>
										</div>
								</div>
							</div>
						</div><!--.form-group-->
					</div>
				</div>
			<div class="modal-footer">
				<div class="pull-{{trans('lang.!page-direction')}}">
					<button type="button" class="btn btn-flat btn-primary" v-on:click="">{{ trans('lang.save') }}</button>
					<button type="button" class="btn btn-flat btn-default" data-dismiss="modal" v-on:click="">{{ trans('lang.cancel') }}</button>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
