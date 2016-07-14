<div class="no-more-tables">
    <table class="table table-bordered table-striped table-condensed table-hover" dir="{{ trans('lang.direction') }}">
    <thead align="center">
        <tr>
            <th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.invoiceId') }}</center></th>
            <th class="th-{{trans('lang.direction')}} hidden-xs hidden-sm"><center>{{ trans('lang.invoiceDescription') }}</center></th>
            <th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.invoiceTotal') }}</center></th>
            <th class="th-{{trans('lang.direction')}} hidden-xs hidden-sm"><center>{{ trans('lang.invoiceDiscount') }}</center></th>
            <th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.invoiceStatus') }}</center></th>
            <th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.invoiceDate') }}</center></th>
            {{-- <th class="th-{{trans('lang.direction')}}"><center>{{ trans('lang.actions') }}</center></th> --}}
            <th class="th-{{trans('lang.direction')}}"></th>
        </tr>
    </thead>
    <tbody align="center">
        <tr v-show="@{{ newCustomer.invoices.length > 0}}" v-for="invoice in newCustomer.invoices ">

            <td class="{{trans('lang.direction')}}-font font-sm" data-title="{{trans('lang.invoiceId')}}">@{{ invoice.id }}</td>
            <td class="{{trans('lang.direction')}}-font font-sm hidden-xs hidden-sm" data-title="{{trans('lang.invoiceDescription')}}">@{{ invoice.description }}</td>
            <td class="{{trans('lang.direction')}}-font font-sm" data-title="{{trans('lang.invoiceTotal')}}">@{{ invoice.total }}</td>
            <td class="{{trans('lang.direction')}}-font font-sm hidden-xs hidden-sm" data-title="{{trans('lang.invoiceDiscount')}}">@{{ invoice.discount | percentage}}</td>
            <td class="{{trans('lang.direction')}}-font font-sm" data-title="{{trans('lang.invoiceStatus')}}">@{{ (invoice.status == 1) ? 'مدفوعة' : 'غير مدفوعة'  }}</td>
            <td class="{{trans('lang.direction')}}-font font-sm" data-title="{{trans('lang.invoiceDate')}}">@{{ invoice.created_at | timestamp }}</td>

            {{-- <td data-title="{{trans('lang.actions')}}"> --}}
            <td>
                <!-- Single button -->
                <div class="btn-group">
                  <button type="button" class="btn btn-teal dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ trans('lang.actions')}} <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu">
                    <li class="text-{{trans('lang.!page-direction')}}"><a href="/invoices/@{{invoice.id}}"><i class="material-icons md-18">remove_red_eye</i> {{ trans('lang.view')}}</a></li>
                    <li class="text-{{trans('lang.!page-direction')}}"><a href="#"><i class="material-icons md-18">mode_edit</i> {{ trans('lang.edit')}}</a></li>
                    <li class="text-{{trans('lang.!page-direction')}}"><a href="#"><i class="material-icons md-18">delete</i> {{ trans('lang.delete')}}</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                {{-- <a href="#"  data-toggle="tooltip" data-placement="top" title="{{ trans('lang.view') }}" class="btn btn-xs btn-primary button-striped button-full-striped btn-ripple">
                    <i class="material-icons md-18">remove_red_eye</i>
                </a>
                <a href="/product/@{{product.id}}/edit"  data-toggle="tooltip" data-placement="top" title="{{ trans('lang.edit') }}" class="btn btn-xs btn-warning button-striped button-full-striped btn-ripple">
                    <i class="material-icons md-18">mode_edit</i>
                </a>
                <a @click="deleteProduct(product)" data-toggle="tooltip" data-placement="top" title="{{ trans('lang.delete') }}" class="btn btn-xs btn-danger button-striped button-full-striped btn-ripple">
                    <i class="material-icons md-18">delete</i>
                </a> --}}
            </td>
        </tr>
        <tr v-show="newCustomer.invoices.length == 0" >
            <td colspan="7">
                {{ trans('lang.noData') }}
            </td>
        </tr>
    </tbody>
</table>
</div>
