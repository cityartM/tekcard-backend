<button type="submit" {{$attributes->merge(['class' => 'btn btn-sm btn-primary'])}} id="saveOrUpdateBtn">
        <i class="ki-duotone ki-check-square fs-2">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
        <span class="indicator-label">{{ $label }}</span>
        <span class="indicator-progress">{{ $progress }}
        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
    </span>
</button>

