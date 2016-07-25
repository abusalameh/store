<div class="form-content">
    <div class="form-group" v-bind:class="{ 'has-error': !validation.name}">
        <label class="control-label col-md-2 pull-{{trans('lang.page-direction')}} {{trans('lang.direction')}}-font">{{ trans('lang.name')}}</label>
        <div class="col-md-10">
            <div class="inputer">
                <div class="input-wrapper">
                    <input type="text" name="name" class="form-control" v-model="newCategory.name" placeholder="{{ trans('lang.name') }}" dir="{{trans('lang.direction')}}">
                </div>
                <span class="help-block" v-show="!isValid && !validation.name"><small>{{ trans('lang.invalid category name') }}</small></span>
            </div>
        </div>
    </div><!--.form-group-->
    <div class="form-group" v-bind:class="{ 'has-error': !validation.description}">
        <label class="control-label col-md-2 pull-{{trans('lang.page-direction')}} {{trans('lang.direction')}}-font">{{ trans('lang.description')}}</label>
        <div class="col-md-10">
            <div class="inputer">
                <div class="input-wrapper">
                    <input type="text" name="description" class="form-control" v-model="newCategory.description" placeholder="{{ trans('lang.description') }}" dir="{{trans('lang.direction')}}">
                    <span class="help-block" v-show="!isValid && !validation.description"><small>{{ trans('lang.invalid category description') }}</small></span>
                </div>
            </div>
        </div>
    </div><!--.form-group-->
</div>
