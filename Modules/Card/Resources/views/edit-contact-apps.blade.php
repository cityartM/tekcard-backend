
@foreach($card->contactApps as $key => $app)
    @if($app->app->category === 'Social Media')
    <div id="contact_apps_repeater">
        <div class="separator border-light my-5"></div>
        <div class="card-title flex-column">
            <h2 class="mb-1">{{__('app.social_media')}}</h2>

        </div>
        <!--begin::Form group-->
        <div class="form-group">
            <div data-repeater-list="contact_apps[0]">

                <div data-repeater-item>
                    <div class="form-group row">
                        <div class="col-md-5 mt-5">
                            <label class="form-label">{{__('app.choose_an_option')}}</label>
                            <select name="contact_id" class="form-control form-control-lg form-control-solid" data-kt-repeater="select2" data-placeholder="Select an option">
                                <option></option>

                                @foreach (\Modules\GlobalSetting\Models\SettingContact::query()->where('category','Social Media')->get() as $item)
                                    <option @if($item->id === $app->contact_id){{ 'selected' }}@endif value="{{ $item->id }}">{{ $item->display_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <x-input-field
                            :title="__('app.title')"
                            type="text"
                            name="title"
                            col="3"
                            class="mt-5"
                            :model="$app"
                        />
                        <x-input-field
                            :title="__('app.value')"
                            type="text"
                            name="value"
                            col="3"
                            class="mt-5"
                            :model="$app"
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
    @endif

    <!--begin::Repeater-->
    @if($app->app->category === 'Contact Info')
    <div id="contact_apps_repeater_one">
        <div class="separator border-light my-5"></div>
        <div class="card-title flex-column">
            <h2 class="mb-1">{{__('app.contact_info')}}</h2>

        </div>
        <!--begin::Form group-->
        <div class="form-group">
            <div data-repeater-list="contact_apps[1]">

                <div data-repeater-item>
                    <div class="form-group row">
                        <div class="col-md-5 mt-5">
                            <label class="form-label">{{__('app.choose_an_option')}}</label>
                            <select name="contact_id" class="form-control form-control-lg form-control-solid" data-kt-repeater="select_1_2" data-placeholder="Select an option">
                                <option></option>
                                @foreach (\Modules\GlobalSetting\Models\SettingContact::query()->where('category','Contact Info')->get() as $item)
                                    <option @if($item->id === $app->contact_id){{ 'selected' }}@endif value="{{ $item->id }}">{{ $item->display_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <x-input-field
                            :title="__('app.title')"
                            type="text"
                            name="title"
                            col="3"
                            class="mt-5"
                            :model="$app"
                        />
                        <x-input-field
                            :title="__('app.value')"
                            type="text"
                            name="value"
                            col="3"
                            class="mt-5"
                            :model="$app"
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
    @endif
    <!--end::Repeater-->

    <!--begin::Repeater-->
    @if($app->app->category === 'Business')
    <div id="contact_apps_repeater_tow">
        <div class="separator border-light my-5"></div>
        <div class="card-title flex-column">
            <h2 class="mb-1">{{__('app.business')}}</h2>

        </div>
        <!--begin::Form group-->
        <div class="form-group">
            <div data-repeater-list="contact_apps[2]">

                <div data-repeater-item>
                    <div class="form-group row">
                        <div class="col-md-5 mt-5">
                            <label class="form-label">{{__('app.choose_an_option')}}</label>
                            <select name="contact_id" class="form-control form-control-lg form-control-solid" data-kt-repeater="select_2_2" data-placeholder="Select an option">
                                <option></option>
                                @foreach (\Modules\GlobalSetting\Models\SettingContact::query()->where('category','Business')->get() as $item)
                                    <option @if($item->id === $app->contact_id){{ 'selected' }}@endif value="{{ $item->id }}">{{ $item->display_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <x-input-field
                            :title="__('app.title')"
                            type="text"
                            name="title"
                            col="3"
                            class="mt-5"
                            :model="$app"
                        />
                        <x-input-field
                            :title="__('app.value')"
                            type="text"
                            name="value"
                            col="3"
                            class="mt-5"
                            :model="$app"
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
    @endif
    <!--end::Repeater-->

    <!--begin::Repeater-->
    @if($app->app->category === 'Personnel')
    <div id="contact_apps_repeater_three">
        <div class="separator border-light my-5"></div>
        <div class="card-title flex-column">
            <h2 class="mb-1">{{__('app.personnel')}}</h2>

        </div>
        <!--begin::Form group-->
        <div class="form-group">
            <div data-repeater-list="contact_apps[3]">

                <div data-repeater-item>
                    <div class="form-group row">
                        <div class="col-md-5 mt-5">
                            <label class="form-label">{{__('app.choose_an_option')}}</label>
                            <select name="contact_id" class="form-control form-control-lg form-control-solid" data-kt-repeater="select_3_2" data-placeholder="Select an option">
                                <option></option>
                                @foreach (\Modules\GlobalSetting\Models\SettingContact::query()->where('category','Personnel')->get() as $item)
                                    <option @if($item->id === $app->contact_id){{ 'selected' }}@endif value="{{ $item->id }}">{{ $item->display_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <x-input-field
                            :title="__('app.title')"
                            type="text"
                            name="title"
                            col="3"
                            class="mt-5"
                            :model="$app"
                        />
                        <x-input-field
                            :title="__('app.value')"
                            type="text"
                            name="value"
                            col="3"
                            class="mt-5"
                            :model="$app"
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
    @endif
    <!--end::Repeater-->
@endforeach



