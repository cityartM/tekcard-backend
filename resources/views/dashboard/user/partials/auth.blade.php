<div class="form-group mb-2">
    <label for="email">@lang('app.email_user')</label>
    <input type="email"
           class="form-control input-solid"
           id="email"
           name="email"
           placeholder="@lang('app.email_user')"
           value="{{ $edit ? $user->email : '' }}">
</div>

<div class="form-group mb-2">
    <label for="username">@lang('app.username')</label>
    <input type="text"
           class="form-control input-solid"
           id="username"
           placeholder="(@lang('app.optional'))"
           name="username"
           value="{{ $edit ? $user->username : '' }}">
</div>

<div class="form-group mb-2">
    <label for="password">{{ $edit ? __("app.new_password_user") : __('app.password_user') }}</label>
    <input type="password"
           class="form-control input-solid"
           id="password"
           name="password"
           @if ($edit) placeholder="@lang("Leave field blank if you don't want to change it")" @endif>
</div>

<div class="form-group mb-2">
    <label for="password_confirmation">{{ $edit ? __("app.confirm_new_password_user") : __('app.confirm_new_password_user') }}</label>
    <input type="password"
           class="form-control input-solid"
           id="password_confirmation"
           name="password_confirmation"
           @if ($edit) placeholder="@lang("Leave field blank if you don't want to change it")" @endif>
</div>

@if ($edit)
    <button type="submit" class="btn btn-primary mt-2" id="update-login-details-btn">
        <i class="fa fa-refresh"></i>
        @lang('Update Auth Details')
    </button>
@endif
