<div class="modal scale fade" id="create-user-invoice" tabindex="-1" role="dialog" aria-hidden="true" dir="{{ trans('lang.direction')}}">
	<div class="modal-dialog modal-lg" style="width:90%">
		<div class="modal-content">
			<div class="modal-header" style="background-color:teal;padding-bottom:20px">
				<h4 class="modal-title rtl-font text-{{trans('lang.page-direction')}}" style="color:white">{!! trans('lang.addInvoiceh') !!}</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-4 col-sm-12 col-xs-12 pull-{{trans('lang.page-direction')}} text-{{trans('lang.page-direction')}}">

						<a class="btn btn-teal btn-md" v-on:click="addNewItem()" :disabled="countDisabled == products.length">
							{!! trans('lang.addNewItem') !!}
						</a>
					</div>
					<div class="col-md-4 col-sm-12 col-xs-12 pull-{{trans('lang.!page-direction')}} ">
						<div class="control-group">
							<div class="col-md-9">
								<div class="control-group">
									<div class="controls">
										<div class="input-group">
											<span class="input-group-addon"><i class="ion-android-calendar"></i></span>

											<!-- <div class="inputer"> -->
												<!-- <div class="input-wrapper"> -->
													{{-- <input type="text" name="birthday" class="form-control bootstrap-daterangepicker-basic" value="@{{invoice.date() }}" v-model="invoice.date"/> --}}
													<input type="text" name="birthday" class="form-control bootstrap-daterangepicker-basic" value="{{ $current_date }}" v-model="invoice.date"/>
												<!-- </div> -->
											<!-- </div> -->
										</div>
									</div>
								</div>

							</div><!--.col-md-9-->
						</div>
					</div>
					<div class="col-md-4 col-sm-12 col-xs-12 pull-{{trans('lang.page-direction')}}">
						<div class="col-md-9">
							<div class="inputer">
								<div class="input-wrapper">
									<input type="text" class="form-control" placeholder="{{trans('lang.description')}}" v-model="invoice.description">
								</div>
							</div>
						</div>
						<div class="col-md-3 ">{{ trans('lang.description')}}</div><!--.col-md-3-->
					</div>
				</div>
				<hr>
				<div class="no-more-tables">
				    <table class="table table-bordered table-striped table-condensed table-hover" dir="{{ trans('lang.direction') }}">
				        <thead>
				            <tr>
				                <th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.id') }}</center></th>
				                <th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.name') }}</center></th>
				                <th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.quantity') }}</center></th>
				                <th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.price') }}</center></th>
				                <th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.total') }}</center></th>
				                <th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.actions') }}</center></th>
				            </tr>
				        </thead>
				        <tbody align="center">
				            <tr v-for="item in invoice.items">
				                <td class="{{trans('lang.direction')}}-font font-sm" data-title="{{ trans('lang.id') }}">@{{ $index + 1 }}</td>

				                <td class="{{trans('lang.direction')}}-font font-sm" data-title="{{ trans('lang.name') }}">

										<select class='form-control' dir="{{ trans('lang.direction')}}" v-model="item.selected" v-on:change="productInfo(item.selected,$index);">
										  <option value="" disabled selected>{{ trans('lang.please select')}}</option>
										  <option value="@{{ product.id}}" v-for="product in products" v-model="item.selected" disabled="@{{product.disable || (product.quantity < 1)}}">@{{ product.name }}</option>
										</select>
				                </td>
								<td class="{{trans('lang.direction')}}-font font-sm" data-title="{{ trans('lang.quantity') }}" >
									<input type="number" id="qty-@{{product.id}}" class="form-control" v-model="item.qty" v-on:keyup="handleMaxQuantity($index,item.maxQty,item.qty)" min="1">
								</td>
								<td class="{{trans('lang.direction')}}-font font-sm" data-title="{{ trans('lang.price') }}">
									<input type="number" min=0 step=0.5 class="form-control" v-model="item.price">
								</td>
								<td class="{{trans('lang.direction')}}-font font-sm" data-title="{{ trans('lang.price') }}" >
									<input type="number" disabled min=0 step=0.5 class="form-control" v-model="item.total(item.qty,item.price)">
								</td>
								<td class="{{trans('lang.direction')}}-font font-sm" data-title="{{ trans('lang.actions') }}">
									<a class="btn btn-danger" v-on:click="deleteItem($index)">
										<i class="fa fa-trash-o"></i>
									</a>
								</td>
				            </tr>
				        </tbody>
				    </table>
					<div class="col-md-5">

					</div>
				</div>

			</div>
			<div class="modal-footer">
				<div class="pull-{{trans('lang.!page-direction')}}">
					<button type="button" class="btn btn-flat btn-primary" v-on:click="saveInvoice(newCustomer.id)">{{ trans('lang.save') }}</button>
					<button type="button" class="btn btn-flat btn-default" data-dismiss="modal" v-on:click="cancelItems()">{{ trans('lang.cancel') }}</button>
				</div>
			</div>
		</div><!--.modal-content-->
	</div><!--.modal-dialog-->
</div><!--.modal-->
