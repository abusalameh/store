<div class="row">
  <div class="col-md-12">
    <div class="">
        <div class="form-group" v-bind:class="{ 'has-error': ($product.xid.required || $product.xid.minlength || $product.xid.maxlength) }">
            <label class="control-label col-md-2 pull-{{trans('lang.page-direction')}} {{trans('lang.direction')}}-font">{{ trans('lang.productId')}}</label>
            <div class="col-md-10">
                <div class="inputer">
                    <div class="input-wrapper">
                        <input type="text"
                               name="xid"
                               id="xid"
                               class="form-control"
                               v-model="newProduct.xid"
                               placeholder="{{ trans('lang.productId') }}"
                               dir="{{trans('lang.direction')}}"
                               v-validate:xid="{ minlength: 3, required: true , maxlength:10}"
                        >
                    </div>
                    <span class="help-block" v-show="$product.xid.required"><small>{{ trans('lang.field required') }}</small></span>
                    <span class="help-block" v-show="$product.xid.minlength"><small>{{ trans('lang.min length 3') }}</small></span>
                    <span class="help-block" v-show="$product.xid.maxlength"><small>{{ trans('lang.max length 10') }}</small></span>
                </div>
            </div>
        </div><!--.form-group-->
        <div class="form-group" v-bind:class="{ 'has-error': ($product.name.required || $product.name.minlength) }">
            <label class="control-label col-md-2 pull-{{trans('lang.page-direction')}} {{trans('lang.direction')}}-font">{{ trans('lang.productName')}}</label>
            <div class="col-md-10">
                <div class="inputer">
                    <div class="input-wrapper">
                        <input type="text"
                               name="name"
                               class="form-control"
                               v-model="newProduct.name"
                               placeholder="{{ trans('lang.productName') }}"
                               dir="{{trans('lang.direction')}}"
                               v-validate:name="{ minlength: 3, required: true}"
                        >
                    </div>
                    <span class="help-block" v-show="$product.name.required"><small>{{ trans('lang.field required') }}</small></span>
                    <span class="help-block" v-show="$product.name.minlength"><small>{{ trans('lang.min length 3') }}</small></span>
                </div>
            </div>
        </div><!--.form-group-->
        <div class="form-group" v-bind:class="{ 'has-error': ($product.description.required || $product.description.minlength)}">
            <label class="control-label col-md-2 pull-{{trans('lang.page-direction')}} {{trans('lang.direction')}}-font">{{ trans('lang.productDescription')}}</label>
            <div class="col-md-10">
                <div class="inputer">
                    <div class="input-wrapper">
                        <input type="text"
                               name="description"
                               class="form-control"
                               v-model="newProduct.description"
                               placeholder="{{ trans('lang.productDescription') }}"
                               dir="{{trans('lang.direction')}}"
                               v-validate:description="{ minlength: 3, required: true}"
                        >
                        <span class="help-block" v-show="$product.description.required"><small>{{ trans('lang.field required') }}</small></span>
                        <span class="help-block" v-show="$product.description.minlength"><small>{{ trans('lang.min length 3') }}</small></span>
                    </div>
                </div>
            </div>
        </div><!--.form-group-->
        <div class="form-group" v-bind:class="{ 'has-error': ($product.notes.required || $product.notes.minlength)}">
            <label class="control-label col-md-2 pull-{{trans('lang.page-direction')}} {{trans('lang.direction')}}-font">{{ trans('lang.productNotes')}}</label>
            <div class="col-md-10">
                <div class="inputer">
                    <div class="input-wrapper">
                        <input type="text"
                               name="notes"
                               class="form-control"
                               v-model="newProduct.notes"
                               placeholder="{{ trans('lang.productNotes') }}"
                               dir="{{trans('lang.direction')}}"
                               v-validate:notes="{ minlength: 3, required: true}"
                        >
                        <span class="help-block" v-show="$product.notes.required"><small>{{ trans('lang.field required') }}</small></span>
                        <span class="help-block" v-show="$product.notes.minlength"><small>{{ trans('lang.min length 3') }}</small></span>
                    </div>
                </div>
            </div>
        </div><!--.form-group-->
        <div class="form-group" v-bind:class="{ 'has-error': ($product.price.required )}">
            <label class="control-label col-md-2 pull-{{trans('lang.page-direction')}} {{trans('lang.direction')}}-font">{{ trans('lang.productPrice')}}</label>
            <div class="col-md-10">
                <div class="inputer">
                    <div class="input-wrapper">
                        <input type="number"
                               name="price"
                               min="1"
                               step="0.5"
                               class="form-control"
                               v-model="newProduct.price"
                               placeholder="{{ trans('lang.productPrice') }}"
                               dir="{{trans('lang.direction')}}"
                               v-validate:price="{ required: true}"
                        >
                        <span class="help-block" v-show="$product.price.required"><small>{{ trans('lang.field required') }}</small></span>
                    </div>
                </div>
            </div>
        </div><!--.form-group-->
        <div class="form-group" v-bind:class="{ 'has-error': ($product.quantity.required)}">
            <label class="control-label col-md-2 pull-{{trans('lang.page-direction')}} {{trans('lang.direction')}}-font">{{ trans('lang.productQuantity')}}</label>
            <div class="col-md-10">
                <div class="inputer">
                    <div class="input-wrapper">
                        <input type="number"
                               name="quantity"
                               min="1"
                               step="0.5"
                               class="form-control"
                               v-model="newProduct.quantity"
                               placeholder="{{ trans('lang.productQuantity') }}"
                               dir="{{trans('lang.direction')}}"
                               v-validate:quantity="{ required: true}"
                        >
                        <span class="help-block" v-show="$product.quantity.required"><small>{{ trans('lang.field required') }}</small></span>
                    </div>
                </div>
            </div>
        </div><!--.form-group-->
        <div class="form-group" v-bind:class="{ 'has-error': $product.category_id.required}">
            <label class="control-label col-md-2 pull-{{trans('lang.page-direction')}} {{trans('lang.direction')}}-font">{{ trans('lang.category_id')}}</label>
            <div class="col-md-10">
                <div class="input-wrapper">
                    <select class='form-control'
                            name="category_id"
                            dir="{{ trans('lang.direction')}}"
                            v-model="newProduct.category_id"
                            v-validate:category_id="{required:true}"
                    >
                      <option value="" disabled selected>{{ trans('lang.please select')}}</option>
                      <option value="@{{ category.id }}" v-for="category in categories"  >@{{ category.name }}</option>
                    </select>
                    <span class="help-block" v-show="$product.category_id.required"><small>{{ trans('lang.field required') }}</small></span>
                </div>
            </div>
        </div><!--.form-group-->
    </div>
  </div>
</div>