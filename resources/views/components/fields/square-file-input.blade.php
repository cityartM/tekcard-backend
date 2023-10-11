<div {{$attributes->merge(['class' => 'card card-stretch card-bordered'])}}>
    <div class="card-header">
        <div class="card-title">
            <h2>
                {{$title}}
                @if($required)
                    <sup>*</sup>
                @endif
            </h2>
        </div>
    </div>
    <div class="card-body text-center">
        <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true"
             style="background-image: url('{{isset($model) ? ($model->hasMedia($collection) ? $model->getFirstMediaUrl($collection) : null) : asset("admin/media/svg/files/black-image.svg")}}')">
            <div class="image-input-wrapper w-150px h-150px"></div>
            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                   data-kt-image-input-action="change" data-bs-toggle="tooltip"
                   title="{{__("Change") . " ".  $title . " " .__("Photo")}}">
                <i class="bi bi-pencil-fill fs-7"></i>
                <input type="file" name="{{$name ?? "photo"}}" @if($required)
                required
                       @endif accept=".png, .jpg, .jpeg"/>
            </label>
            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                  data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                  title="{{__("Cancel") . " " .  $title  . " " .__("Photo")}}">
                                <i class="bi bi-x fs-2"></i>
                            </span>
            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                  data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                  title="{{__("Remove") . " ". $title . " " .__("Photo")}}">
                            <i class="bi bi-x fs-2"></i>
                        </span>
        </div>
        <div
            class="text-muted fs-7">{{__("Set the") . " " . $title . " ". __("thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted")}}</div>
    </div>
</div>
