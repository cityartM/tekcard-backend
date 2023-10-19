<div class="avatar-wrapper text-center">
    <div class="image-input image-input-circle" data-kt-image-input="true" style="background-image: url({{'assets/media/avatars/150-26.jpg'}})">
        <!--begin::Image preview wrapper-->
        <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ $url }})"></div>
        <!--end::Image preview wrapper-->

        <!--begin::Edit button-->
        <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
               data-kt-image-input-action="change"
               data-bs-toggle="tooltip"
               data-bs-dismiss="click"
               title="Change avatar">
            <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span class="path2"></span></i>

            <!--begin::Inputs-->
            <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
            <input type="hidden" name="avatar_remove" />
            <!--end::Inputs-->
        </label>
        <!--end::Edit button-->

        <!--begin::Cancel button-->
        <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
              data-kt-image-input-action="cancel"
              data-bs-toggle="tooltip"
              data-bs-dismiss="click"
              title="Cancel avatar">
        <i class="ki-outline ki-cross fs-3"></i>
    </span>
        <!--end::Cancel button-->

        <!--begin::Remove button-->
        <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
              data-kt-image-input-action="remove"
              data-bs-toggle="tooltip"
              data-bs-dismiss="click"
              title="Remove avatar">
        <i class="ki-outline ki-cross fs-3"></i>
    </span>
        <!--end::Remove button-->

    </div>
    <div class="text-muted fs-7 mt-5">{{ $information }}</div>
    <div class="col-md-12 mt-10">
        <x-save-or-update-btn
            :label="__('app.update_avatar')"
            :progress="__('app.please_wait')"
        />
    </div>
</div>
