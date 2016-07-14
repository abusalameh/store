<div class="no-more-tables">
    <table class="table table-bordered table-striped table-condensed table-hover" dir="{{ trans('lang.direction') }}">
        <thead>
            <tr>
                <th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.checkId') }}</center></th>
                <th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.Invoice') }}</center></th>
                <th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.amount') }}</center></th>
                <th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.payment_date') }}</center></th>
                <th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.due_to') }}</center></th>
                <th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.actions') }}</center></th>
            </tr>
        </thead>
        <tbody align="center">
            <tr v-show="@{{ newCustomer.payments.checks.length > 0}}" v-for="payment in newCustomer.payments.checks">
                <td class="{{trans('lang.direction')}}-font font-sm" data-title="{{ trans('lang.checkId') }}">@{{ payment.id}}</td>
                <td class="{{trans('lang.direction')}}-font font-sm" data-title="{{ trans('lang.Invoice') }} "><a href="/invoices/@{{ payment.invoice_id }}">{{trans('lang.invoiceNumber')}} @{{ payment.invoice_id }}</a></td>
                <td class="{{trans('lang.direction')}}-font font-sm" data-title="{{ trans('lang.amount') }}">@{{ payment.amount }}</td>
                <td class="{{trans('lang.direction')}}-font font-sm" data-title="{{ trans('lang.due_to') }}">@{{ payment.created_at | timestamp }}</td>
                <td class="{{trans('lang.direction')}}-font font-sm" data-title="{{ trans('lang.due_to') }}">@{{ payment.due_to | timestamp }}</td>
                <td class="{{trans('lang.direction')}}-font font-sm"></td>
            </tr>
            <tr v-show="newCustomer.payments.checks.length == 0" >
                <td colspan="6">
                    {{ trans('lang.noData') }}
                </td>
            </tr>
        </tbody>
    </table>
</div>
