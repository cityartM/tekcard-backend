<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-2">
            <label for="first_name">@lang('app.role')</label>
            {!! Form::select('role_id', $roles, $edit ? $user->role->id : '',
                ['class' => 'form-control input-solid', 'id' => 'role_id', $profile ? 'disabled' : '']) !!}
        </div>
        <div class="form-group mb-2">
            <label for="status">@lang('app.label_status')</label>
            {!! Form::select('status', $statuses, $edit ? $user->status : '',
                ['class' => 'form-control input-solid', 'id' => 'status', $profile ? 'disabled' : '']) !!}
        </div>
        <div class="form-group mb-2">
            <label for="first_name">@lang('app.first_name_user')</label>
            <input type="text" class="form-control input-solid" id="first_name"
                   name="first_name" placeholder="@lang('app.first_name_user')" value="{{ $edit ? $user->first_name : '' }}">
        </div>
        <div class="form-group mb-2">
            <label for="last_name">@lang('app.last_name_user')</label>
            <input type="text" class="form-control input-solid" id="last_name"
                   name="last_name" placeholder="@lang('app.last_name_user')" value="{{ $edit ? $user->last_name : '' }}">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group mb-2">
            <label for="phone">@lang('app.phone_user')</label>
            <input type="text" class="form-control input-solid" id="phone"
                   name="phone" placeholder="@lang('app.phone_user')" value="{{ $edit ? $user->phone : '' }}">
        </div>
        <div class="form-group mb-2">
            <label for="address">@lang('app.address_user')</label>
            <input type="text" class="form-control input-solid" id="address"
                   name="address" placeholder="@lang('app.address_user')" value="{{ $edit ? $user->address : '' }}">
        </div>
    </div>

    @if ($edit)
        <div class="col-md-12 mt-2">
            <button type="submit" class="btn btn-primary" id="update-details-btn">
                <i class="fa fa-refresh"></i>
                @lang('app.update_details_user')
            </button>
        </div>
    @endif
</div>
