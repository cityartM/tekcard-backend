<div class="row">
    <div class="col-md-6">
        <x-select-field
            :title="__('app.role')"
            name="role_id"
            col="12"
            class="mb-2"
            required
            :data="\App\Models\Role::query()->get()->pluck('name', 'id')"
            :model="$edit ? $user : null "
            :isselect2="true"
        />
        <x-select-field
            :title="__('app.label_status')"
            name="status"
            col="12"
            class="mb-2"
            required
            :data="collect($statuses)"
            :model="$edit ? $user : null "
            :isselect2="true"
        />

        <x-input-field
            :title="__('app.first_name_user')"
            :placeholder="__('app.first_name_user')"
            name="first_name"
            type="text"
            col="12"
            class="mb-2"
            required
            :model="$edit ? $user : null"
        />

        <x-input-field
            :title="__('app.last_name_user')"
            :placeholder="__('app.last_name_user')"
            name="last_name"
            type="text"
            col="12"
            class="mb-2"
            required
            :model="$edit ? $user : null"
        />
    </div>

    <div class="col-md-6">
        <x-input-field
            :title="__('app.phone_user')"
            :placeholder="__('app.phone_user')"
            name="phone"
            type="text"
            col="12"
            class="mb-2"
            required
            :model="$edit ? $user : null"
        />

        <x-input-field
            :title="__('app.address_user')"
            :placeholder="__('app.address_user')"
            name="address"
            type="text"
            col="12"
            class="mb-2"
            required
            :model="$edit ? $user : null"
        />
    </div>

    @if ($edit)
        <div class="col-md-12 mt-2">
            <x-save-or-update-btn
                :label="__('app.update_details_user')"
                :progress="__('app.please_wait')"
            />
        </div>
    @endif
</div>
