<div class="no-more-tables">
    <table class="table table-bordered table-striped table-condensed table-hover" dir="{{ trans('lang.direction') }}">
        <thead>
            <tr>
                <th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.totalPayment') }}</center></th>
                <th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.totalDebit') }}</center></th>
            </tr>
        </thead>
        <tbody align="center">
            <tr v-show="@{{ newCustomer.balance.length > 0}}" >
                <td class="{{trans('lang.direction')}}-font font-sm" data-title="{{ trans('lang.totalPayment') }}">@{{ newCustomer.balance.totalCredit }} <i class="fa fa-ils"></i></td>
                <td class="{{trans('lang.direction')}}-font font-sm" data-title="{{ trans('lang.totalDebit') }}">@{{ newCustomer.balance.totalDebit }} <i class="fa fa-ils"></i>   </td>
            </tr>
        </tbody>
    </table>
</div>
