<ul>
	<li>
		<a href="/dashboard" class="{!! trans('lang.direction') !!}-font">  {!! trans('lang.control panel') !!} </a>
	</li>
	<li>
		<a href="/customers" class="{!! trans('lang.direction') !!}-font">{!! trans('lang.customersList') !!}</a>
	</li>
	<!-- <li>
		<a href="/invoices" class="{!! trans('lang.direction') !!}-font">{!! trans('lang.Invoicesh') !!}</a>
	</li> -->
	<li>
		<a href="/suppliers" class="{!! trans('lang.direction') !!}-font">{!! trans('lang.suppliersList') !!}</a>
	</li>
	<li>
		<a href="/categories" class="{!! trans('lang.direction') !!}-font">{!! trans('lang.categoriesh') !!}</a>
	</li>
	<li>
		<a href="/products" class="{!! trans('lang.direction') !!}-font">{!! trans('lang.products') !!}</a>
	</li>
	
	<!-- <li>
		<a href="javascript:;" class="{!! trans('lang.direction') !!}-font">{!! trans('lang.inventory') !!}</a>
	</li> -->
	<li class="has-child">

		<a href="javascript:;" class="{!! trans('lang.direction') !!}-font">{!! trans('lang.Paymentsh') !!}</a>
		<ul class="child-menu">
			<li>
				<a href="#" class="{!! trans('lang.direction') !!}-font">{!! trans('lang.Checksh') !!}</a>
			</li>
			<li>
				<a href="#" class="{!! trans('lang.direction') !!}-font">{!! trans('lang.cashPaymentsh') !!}</a>
			</li>
		</ul>
	</li>
	<li>
		<a href="{{ url('logout')}}" class="{!! trans('lang.direction') !!}-font">{!! trans('lang.logout') !!}</a>
</li>
</ul>


<!-- <ul class="child-menu">
	<li>
		<a href="#" class="{!! trans('lang.direction') !!}-font">{!! trans('lang.addCustomer') !!}</a>
	</li>
	<li>
		<a href="#" class="{!! trans('lang.direction') !!}-font">{!! trans('lang.viewCustomers') !!}</a>
	</li>
	<li>
		<a href="#" class="{!! trans('lang.direction') !!}-font">{!! trans('lang.searchCustomer') !!}</a>
	</li>
</ul> -->
