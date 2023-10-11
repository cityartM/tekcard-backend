@if ($item && $item->authorize(auth()->user()))
    @if ($item->isDropdown())
        <!--begin:Menu item-->
        <div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
            <!--begin:Menu link-->
            <span class="menu-link">
            <span class="menu-icon">
                <i class="ki-duotone ki-element-11 fs-2">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                    <span class="path4"></span>
                </i>
            </span>
            <span class="menu-title">{{ $item->getTitle() }}</span>
            <span class="menu-arrow"></span>
        </span>
            <!--end:Menu link-->
            <!--begin:Menu sub-->
            <div class="menu-sub menu-sub-accordion">
                @foreach ($item->children() as $key => $child)
                    @if($key <= 3)
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{ str_replace('#', '', $child->getHref()) }}" id="{{ str_replace('#', '', $child->getHref()) }}">
                                                            <span class="menu-bullet">
                                                                <span class="bullet bullet-dot"></span>
                                                            </span>
                                <span class="menu-title">{{$child->getTitle()}}</span>
                            </a>
                           <!--end:Menu link-->
                        </div>
                    @endif
                @endforeach
                    <div class="menu-inner flex-column collapse" id="kt_app_sidebar_menu_dashboards_collapse">
                    @foreach ($item->children() as $key => $child)
                        @if($key > 3)
                          <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ str_replace('#', '', $child->getHref()) }}" id="{{ str_replace('#', '', $child->getHref()) }}">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                            <span class="menu-title">{{$child->getTitle()}}</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                        @endif
                    @endforeach
                    </div>
                @if($key > 3)
                     <div class="menu-item">
                        <div class="menu-content">
                            <a class="btn btn-flex btn-color-primary d-flex flex-stack fs-base p-0 ms-2 mb-2 toggle collapsible collapsed" data-bs-toggle="collapse" href="#kt_app_sidebar_menu_dashboards_collapse" data-kt-toggle-text="Show Less">
                                <span data-kt-toggle-text-target="true">Show More</span>
                                <i class="ki-duotone ki-minus-square toggle-on fs-2 me-0">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <i class="ki-duotone ki-plus-square toggle-off fs-2 me-0">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </a>
                        </div>
                    </div>
                    @endif
            </div>
            <!--end:Menu sub-->
        </div>
        <!--end:Menu item-->
    @else
        <!--begin:Menu item-->
        <div class="menu-item">
            <!--begin:Menu link-->
            <a class="menu-link {{ Request::is(LaravelLocalization::getCurrentLocale().'/'.$item->getActivePath()) ? 'active' : '' }}" href="{{ $item->getHref() }}" >
												<span class="menu-icon">
													<i class="ki-duotone ki-element-11 fs-2">
														<span class="path1"></span>
														<span class="path2"></span>
														<span class="path3"></span>
														<span class="path4"></span>
													</i>
												</span>
                <span class="menu-title">{{ $item->getTitle() }}</span>
            </a>
            <!--end:Menu link-->
        </div>
        <!--end:Menu item-->
    @endif
@endif





