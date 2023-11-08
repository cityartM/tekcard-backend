<!--begin::Repeater-->
<div id="contact_apps_repeater">
    <div class="card-title flex-column">
        <h2 class="mb-1">Social Media</h2>
    </div>
    <!--begin::Form group-->
    <div class="form-group">
        <div data-repeater-list="contact_apps">

           <div data-repeater-item>
            <div class="form-group row">
                <div class="col-md-5 mt-5">
                    <label class="form-label">{{__('Choose An Option')}}</label>
                    <select name="contact_id" class="form-control form-control-lg form-control-solid" data-kt-repeater="select2" data-placeholder="Select an option">
                        <option></option>
                        @foreach (\Modules\GlobalSetting\Models\SettingContact::query()->where('category','Social Media')->get() as $item)
                            <option value="{{ $item->id }}">{{ $item->display_name }}</option>
                        @endforeach
                    </select>
                </div>
                <x-input-field
                    :title="__('app.title')"
                    type="number"
                    name="qty"
                    col="3"
                    class="mt-5"
                />
                <x-input-field
                    :title="__('app.value')"
                    name="dosage"
                    col="3"
                    class="mt-5"
                />
                <div class="col-md-1 mt-7">
                    <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                        <i class="la la-trash-o fs-2"></i>
                    </a>
                </div>
            </div>
        </div>

        </div>
    </div>
    <!--end::Form group-->

    <!--begin::Form group-->
    <div class="form-group mt-5">
        <a href="javascript:;" data-repeater-create class="btn btn-sm btn-light-primary">
            <i class="la la-plus"></i>
            {{__('app.add')}}
        </a>
    </div>
    <!--end::Form group-->
</div>
<!--end::Repeater-->

<!--begin::Repeater-->
<div id="contact_apps_repeater_one">
    <div class="separator border-light my-5"></div>
    <div class="card-title flex-column">
        <h2 class="mb-1">Contact Info</h2>

    </div>
    <!--begin::Form group-->
    <div class="form-group">
        <div data-repeater-list="contact_apps">

            <div data-repeater-item>
                <div class="form-group row">
                    <div class="col-md-5 mt-5">
                        <label class="form-label">{{__('Choose An Option')}}</label>
                        <select name="contact_id" class="form-control form-control-lg form-control-solid" data-kt-repeater="select2" data-placeholder="Select an option">
                            <option></option>
                            @foreach (\Modules\GlobalSetting\Models\SettingContact::query()->where('category','Contact Info')->get() as $item)
                                <option value="{{ $item->id }}">{{ $item->id }}</option>
                            @endforeach
                        </select>
                    </div>
                    <x-input-field
                        :title="__('app.title')"
                        type="number"
                        name="qty"
                        col="3"
                        class="mt-5"
                    />
                    <x-input-field
                        :title="__('app.value')"
                        name="dosage"
                        col="3"
                        class="mt-5"
                    />
                    <div class="col-md-1 mt-7">
                        <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                            <i class="la la-trash-o fs-2"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--end::Form group-->

    <!--begin::Form group-->
    <div class="form-group mt-5">
        <a href="javascript:;" data-repeater-create class="btn btn-sm btn-light-primary">
            <i class="la la-plus"></i>
            {{__('app.add')}}
        </a>
    </div>
    <!--end::Form group-->
</div>
<!--end::Repeater-->

<!--begin::Repeater-->
<div id="contact_apps_repeater_one">
    <div class="separator border-light my-5"></div>
    <div class="card-title flex-column">
        <h2 class="mb-1">Business</h2>

    </div>
    <!--begin::Form group-->
    <div class="form-group">
        <div data-repeater-list="contact_apps">

            <div data-repeater-item>
                <div class="form-group row">
                    <div class="col-md-5 mt-5">
                        <label class="form-label">{{__('Choose An Option')}}</label>
                        <select name="contact_id" class="form-control form-control-lg form-control-solid" data-kt-repeater="select2" data-placeholder="Select an option">
                            <option></option>
                            @foreach (\Modules\GlobalSetting\Models\SettingContact::query()->where('category','Business')->get() as $item)
                                <option value="{{ $item->id }}">{{ $item->id }}</option>
                            @endforeach
                        </select>
                    </div>
                    <x-input-field
                        :title="__('app.title')"
                        type="number"
                        name="qty"
                        col="3"
                        class="mt-5"
                    />
                    <x-input-field
                        :title="__('app.value')"
                        name="dosage"
                        col="3"
                        class="mt-5"
                    />
                    <div class="col-md-1 mt-7">
                        <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                            <i class="la la-trash-o fs-2"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--end::Form group-->

    <!--begin::Form group-->
    <div class="form-group mt-5">
        <a href="javascript:;" data-repeater-create class="btn btn-sm btn-light-primary">
            <i class="la la-plus"></i>
            {{__('app.add')}}
        </a>
    </div>
    <!--end::Form group-->
</div>
<!--end::Repeater-->

