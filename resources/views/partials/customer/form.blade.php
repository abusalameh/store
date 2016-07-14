<div class="form-content">
    <div class="form-group" v-bind:class="{ 'has-error': !validation.xid}">
        <label class="control-label col-md-2 pull-{{trans('lang.page-direction')}} {{trans('lang.direction')}}-font">{{ trans('lang.customerId')}}</label>
        <div class="col-md-9 pull-{{trans('lang.page-direction')}}">
            <div class="inputer">
                <div class="input-wrapper">
                    <input type="text" name="xid" class="form-control" v-model="newCustomer.xid" placeholder="{{ trans('lang.customerId') }}" dir="{{trans('lang.direction')}}">
                </div>
                <span class="help-block" v-show="!isValid && !validation.xid"><small>{{ trans('lang.invalid customer id') }}</small></span>
            </div>
        </div>
    </div><!--.form-group-->
    <div class="form-group" v-bind:class="{ 'has-error': !validation.name}">
        <label class="control-label col-md-2 pull-{{trans('lang.page-direction')}} {{trans('lang.direction')}}-font">{{ trans('lang.name')}}</label>
        <div class="col-md-9 pull-{{trans('lang.page-direction')}}">
            <div class="inputer">
                <div class="input-wrapper">
                    <input type="text" name="name" class="form-control" v-model="newCustomer.name" placeholder="{{ trans('lang.name') }}" dir="{{trans('lang.direction')}}">
                </div>
                <span class="help-block" v-show="!isValid && !validation.name"><small>{{ trans('lang.invalid customer name') }}</small></span>
            </div>
        </div>
    </div><!--.form-group-->
    <div class="form-group" v-bind:class="{ 'has-error': !validation.address}">
        <label class="control-label col-md-2 pull-{{trans('lang.page-direction')}} {{trans('lang.direction')}}-font">{{ trans('lang.address')}}</label>
        <div class="col-md-9 pull-{{trans('lang.page-direction')}}">
            <div class="inputer">
                <div class="input-wrapper">
                    <input type="text" name="address" class="form-control" v-model="newCustomer.address" placeholder="{{ trans('lang.address') }}" dir="{{trans('lang.direction')}}">
                    <span class="help-block" v-show="!isValid && !validation.address"><small>{{ trans('lang.invalid customer address') }}</small></span>
                </div>
            </div>
        </div>
    </div><!--.form-group-->
    <div class="form-group" v-bind:class="{ 'has-error': !validation.phone}">
        <label class="control-label col-md-2 pull-{{trans('lang.page-direction')}} {{trans('lang.direction')}}-font">{{ trans('lang.phone')}}</label>
        <div class="col-md-9 pull-{{trans('lang.page-direction')}}">
            <div class="inputer">
                <div class="input-wrapper">
                    <input type="number" name="phone" class="form-control" v-model="newCustomer.phone" placeholder="{{ trans('lang.phone') }}" dir="{{trans('lang.direction')}}" maxlength="10">
                    <span class="help-block" v-show="!isValid && !validation.phone"><small>{{ trans('lang.invalid customer phone') }}</small></span>
                </div>
            </div>
        </div>
    </div><!--.form-group-->

</div>
