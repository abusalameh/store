
    <table class="table table-bordered table-striped table-condensed table-hover" dir="{{ trans('lang.direction') }}">
        <thead>
            <tr>
                <th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.totalAmount') }}</center></th>
                <th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.totalPayment') }}</center></th>
                <th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.totalDebit') }}</center></th>
            </tr>
        </thead>
        <tbody align="center">
            <tr v-show="@{{ newSupplier.balance.length > 0}}" >
                <td class="{{trans('lang.direction')}}-font font-sm" data-title="{{ trans('lang.totalAmount') }}">
                    @{{ newSupplier.balance.totalCredit + newSupplier.balance.totalDebit }} <i class="fa fa-ils"></i>
                </td>
                <td class="{{trans('lang.direction')}}-font font-sm" data-title="{{ trans('lang.totalPayment') }}">
                    @{{ newSupplier.balance.totalCredit }} <i class="fa fa-ils"></i>
                </td>
                <td class="{{trans('lang.direction')}}-font font-sm" data-title="{{ trans('lang.totalDebit') }}">
                    @{{ newSupplier.balance.totalDebit }} <i class="fa fa-ils"></i>
                </td>
            </tr>
        </tbody>
    </table>

