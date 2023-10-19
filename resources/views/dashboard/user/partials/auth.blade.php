<x-input-field
    :title="__('app.email_user')"
    :placeholder="__('app.email_user')"
    name="email"
    type="email"
    col="12"
    class="mb-2"
    required
    :model="$edit ? $user : null"
/>

<x-input-field
    :title="__('app.username')"
    :placeholder="__('app.username')"
    name="username"
    type="text"
    col="12"
    class="mb-2"
    required
    :model="$edit ? $user : null"
/>

<x-input-field
    :title="$edit ? __('app.new_password_user') : __('app.password_user') "
    :placeholder=" $edit ? __('app.leave_field_blank_if_you_don_t_want_to_change_it') : __('app.password_user') "
    name="password"
    type="password"
    col="12"
    class="mb-2"
    required
/>

<x-input-field
    :title=" $edit ? __('app.confirm_new_password_user') : __('app.confirm_new_password_user')"
    :placeholder=" $edit ? __('app.leave_field_blank_if_you_don_t_want_to_change_it') : __('app.password_user') "
    name="password_confirmation"
    type="password"
    col="12"
    class="mb-2"
    required
/>


@if ($edit)
    <button type="submit" class="btn btn-primary mt-2" id="update-login-details-btn">
        <i class="fa fa-refresh"></i>
        @lang('Update Auth Details')
    </button>
@endif
