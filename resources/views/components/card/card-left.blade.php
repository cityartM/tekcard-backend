<div class="col-md-3" {{$attributes->merge(['style' => '', 'class' => 'col-md-' . ($col ?? '3')])}}>
    <h5 class="card-title">
        {{$title}}
    </h5>
    <p class="text-muted">
        {{$information}}
    </p>
</div>
