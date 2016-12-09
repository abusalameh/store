<div class="no-more-tables">
    <table class="table table-bordered table-striped table-condensed table-hover" dir="{{ trans('lang.direction') }}">
        <thead>
            <tr>
                <th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.paymentId') }}</center></th>
                <th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.Invoice') }}</center></th>
                <th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.amount') }}</center></th>
                <th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.payment_date') }}</center></th>
                <th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.actions') }}</center></th>
            </tr>
        </thead>
        <tbody align="center">
            <tr v-show="@{{ newSupplier.payments.cash.length > 0}}" v-for="payment in newSupplier.payments.cash">
                <td class="{{trans('lang.direction')}}-font font-sm" data-title="{{ trans('lang.id') }}">@{{ payment.id}}</td>
                <td class="{{trans('lang.direction')}}-font font-sm" data-title="{{ trans('lang.Invoice') }} "><a href="/invoices/@{{ payment.invoice_id }}">{{trans('lang.invoiceNumber')}} @{{ payment.invoice_id }}</a></td>
                <td class="{{trans('lang.direction')}}-font font-sm" data-title="{{ trans('lang.amount') }}">@{{ payment.amount }}</td>
                <td class="{{trans('lang.direction')}}-font font-sm" data-title="{{ trans('lang.payment_date') }}">@{{ payment.created_at | timestamp }}</td>
                <td class="{{trans('lang.direction')}}-font font-sm"></td>
            </tr>
            <tr v-show="newSupplier.payments.cash.length == 0" >
                <td colspan="5">
                    {{ trans('lang.noData') }}
                </td>
            </tr>
        </tbody>
    </table>
</div>
