<div class="card">
    <div class="card-header" style="padding: 1rem 1rem;">
        <div class="card-toolbar">
            <ul class="nav nav-light-danger nav-bold nav-pills">
                @foreach(LaravelLocalization::getLocalesOrder() as $key => $value)
                    <li class="nav-item">
                        <a class="nav-link {{$loop->first ? 'active' : ''}}" data-toggle="tab"
                           href="#language_{{$key}}">
                            <span class="nav-icon"><i class="flaticon2-chat-1"></i></span>
                            <span class="nav-text">{{$value['name']}}</span>
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
