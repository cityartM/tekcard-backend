<div class="col-md-12">
    <div class="card card-stretch card-bordered card-language">
        <div class="card-header">
            <div class="card-toolbar">
                <ul class="nav">
                    @foreach(\App\Helper\Helper::getLocalesOrder() as $key => $value)
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-color-muted {{$loop->first ? ' active' : ''}} btn-active btn-active-secondary fw-bolder px-4 me-1 "
                           data-bs-toggle="tab" href="#language_{{$key}}{{$id}}">
                            {{$value["name"]}}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content">
                {{$slot}}
            </div>
        </div>
    </div>
</div>
