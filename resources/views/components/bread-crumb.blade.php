@foreach($routes as $route => $title)
    <div class="menu-item me-lg-1">
        /
    </div>
    <div class="menu-item me-lg-1">
        <a class="menu-link {{request()->routeIs($route) ? "active" : ""}} py-3" href="{{$route}}">
            <span class="menu-title">{{$title}}</span>
        </a>
    </div>
@endforeach
