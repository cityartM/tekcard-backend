<div id="kt_aside" class="aside aside-{{optional(Auth::user())->theme_mode ?? "dark"}} aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <a href="{{route("admin.dashboard")}}">
            <img alt="Logo" src="{{asset('admin/media/logos/logo.jpg')}}" class="h-50px m-1 logo" />
        </a>
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
            <span class="svg-icon svg-icon-1 rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="black" />
                    <path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="black" />
                </svg>
            </span>
        </div>
    </div>
    <div class="aside-menu flex-column-fluid">
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
                @foreach($links as $link)
                    @if($link['canShow'])
                        @if(isset($link["title"]))
                            <div class="menu-item">
                                <div class="menu-content pt-3 pb-2">
                                    <span class="menu-section text-muted text-uppercase fs-8 ls-1">{{$link['title']}}</span>
                                </div>
                            </div>
                            @foreach($link["menu"] as $menu)
                                @if($menu["canShow"])
                                    @if(isset($menu['sub_menu']))
                                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                        <span class="menu-link {{\App\Helper\Helper::checkAccordionIsActive($menu["route"]) ? "active show_down_accordion" : ""}}">
                                            @if(isset($menu["icon"]))
                                                <span class="menu-icon">
                                                    <i class="{{$menu["icon"]}}"></i>
                                                </span>
                                            @else
                                                <span class="menu-icon">
                                                    <i class="bi bi-archive fs-3"></i>
                                                </span>
                                            @endif
                                            <span class="menu-title">{{$menu['name']}}</span>
                                            <span class="menu-arrow"></span>
                                        </span>
                                            <div class="menu-sub menu-sub-accordion">
                                                @foreach($menu['sub_menu'] as $single_sub_menu)
                                                    @if($single_sub_menu["canShow"])
                                                    @php($sub_menu_link = preg_replace('/\/'.app()->getLocale().'\/\/medicalCenter/','/'.app()->getLocale().'/'.auth()->user()?->medical?->uuid.'/medicalCenter',$single_sub_menu['route']))
                                                        <div class="menu-item">
                                                            <a class="menu-link {{\App\Helper\Helper::checkAccordionIsActive($single_sub_menu["route"]) ? "active show_upper_accordion" : ""}}" href="{{$sub_menu_link}}">
                                                            <span class="menu-bullet">
                                                                <span class="bullet bullet-dot"></span>
                                                            </span>
                                                                <span class="menu-title">{{$single_sub_menu['name']}}</span>
                                                            </a>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @else
                                        <div class="menu-item">
                                            @php($menu_link = preg_replace('/\/en\/\/medicalCenter/','/en/'.auth()->user()?->medical?->uuid.'/medicalCenter',$menu['route']))
                                            <a class="menu-link {{\App\Helper\Helper::checkAccordionIsActive($menu["route"]) ? "active" : ""}}" href="{{$menu_link}}">
                                                @if(isset($menu["icon"]))
                                                    <span class="menu-icon">
                                                    <i class="{{$menu["icon"]}}"></i>
                                                </span>
                                                @else
                                                    <span class="menu-icon">
                                                    <i class="bi bi-archive fs-3"></i>
                                                </span>
                                                @endif
                                                <span class="menu-title">{{$menu['name']}}</span>
                                            </a>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        @else
                            @if(isset($link['sub_menu']))
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                <span class="menu-link {{\App\Helper\Helper::checkAccordionIsActive($link["route"]) ? "active show_down_accordion" : ""}}">
                                    @if(isset($link["icon"]))
                                        <span class="menu-icon">
                                            <i class="{{$link["icon"]}}"></i>
                                        </span>
                                    @else
                                        <span class="menu-icon">
                                            <i class="bi bi-archive fs-3"></i>
                                        </span>
                                    @endif
                                    <span class="menu-title">{{$link['name']}}</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                    <div class="menu-sub menu-sub-accordion">
                                        @foreach($link['sub_menu'] as $single_sub_menu)
                                            @if($single_sub_menu["canShow"])
                                                <div class="menu-item">
                                                    @php($sub_menu_link = preg_replace('/\/en\/\/medicalCenter/','/en/'.auth()->user()?->medical?->uuid.'/medicalCenter',$single_sub_menu['route']))
                                                    <a class="menu-link {{\App\Helper\Helper::checkAccordionIsActive($single_sub_menu["route"]) ? "active show_upper_accordion" : ""}}" href="{{$sub_menu_link}}">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                        <span class="menu-title">{{$single_sub_menu['name']}}</span>
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <div class="menu-item">
                                    @php($link_menu = preg_replace('/\/en\/\/medicalCenter/','/en/'.auth()->user()?->medical?->uuid.'/medicalCenter',$link['route']))
                                    <a class="menu-link {{\App\Helper\Helper::checkAccordionIsActive($link["route"]) ? "active" : ""}}" href="{{$link_menu}}">
                                        @if(isset($link["icon"]))
                                            <span class="menu-icon">
                                            <i class="{{$link["icon"]}}"></i>
                                        </span>
                                        @else
                                            <span class="menu-icon">
                                            <i class="bi bi-archive fs-3"></i>
                                        </span>
                                        @endif
                                        <span class="menu-title">{{$link['name']}}</span>
                                    </a>
                                </div>
                            @endif
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
