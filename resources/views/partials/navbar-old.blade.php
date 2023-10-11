<!--begin::Header-->
<div id="kt_header" style="" class="app-header">
	<!--begin::Container-->
	<div class="container-fluid d-flex align-items-stretch justify-content-between">
		<!--begin::Aside mobile toggle-->
		<div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
			<div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_aside_mobile_toggle">
				<!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
				<span class="svg-icon svg-icon-2x mt-1">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
						<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
					</svg>
				</span>
				<!--end::Svg Icon-->
			</div>
		</div>
		<!--end::Aside mobile toggle-->
		<!--begin::Mobile logo-->
		<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
			<a href="../../demo1/dist/index.html" class="d-lg-none">
				<img alt="Logo" src="{{asset('assets/media/logos/logo-2.svg')}}" class="h-30px" />
			</a>
		</div>
		<!--end::Mobile logo-->
		<!--begin::Wrapper-->
		<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
			<!--begin::Navbar-->
			<div class="d-flex align-items-stretch" id="kt_header_nav">
				<!--begin::Menu wrapper-->
				<div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
					<!--begin::Menu-->
					<div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch" id="#kt_header_menu" data-kt-menu="true">
						<div class="menu-item me-lg-1">
							<a class="menu-link active py-3" href="{{ route('dashboard') }}">
								<span class="menu-title">{{ __('Dashboard') }}</span>
							</a>
						</div>
						<div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-lg-1"> </div>
					</div>
					<!--end::Menu-->
				</div>
				<!--end::Menu wrapper-->
			</div>
			<!--end::Navbar-->
			<!--begin::Topbar-->
			<div class="d-flex align-items-stretch flex-shrink-0">
				<!--begin::Toolbar wrapper-->
				<div class="d-flex align-items-stretch flex-shrink-0">
					<!--begin::Search-->
					<div class="d-flex align-items-stretch ms-1 ms-lg-3">
						<!--begin::Search-->
						<div id="kt_header_search" class="d-flex align-items-stretch" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="menu" data-kt-menu-trigger="auto" data-kt-menu-overflow="false" data-kt-menu-permanent="true" data-kt-menu-placement="bottom-end">
						<!--begin::Search toggle-->
						<div class="d-flex align-items-center" data-kt-search-element="toggle" id="kt_header_search_toggle">
									<div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px">
									<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
									<span class="svg-icon svg-icon-1">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
											<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
										</svg>
									</span>
								<!--end::Svg Icon-->
							</div>
						</div>
						<!--end::Search toggle-->
						<!--begin::Menu-->
						<div data-kt-search-element="content" class="menu menu-sub menu-sub-dropdown p-7 w-325px w-md-375px">
							<!--begin::Wrapper-->
							<div data-kt-search-element="wrapper">
								<!--begin::Form-->
								<form data-kt-search-element="form" class="w-100 position-relative mb-3" autocomplete="off">
									<!--begin::Icon-->
									<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
									<span class="svg-icon svg-icon-2 svg-icon-lg-1 svg-icon-gray-500 position-absolute top-50 translate-middle-y ms-0">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
											<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
										</svg>
									</span>
									<!--end::Svg Icon-->
									<!--end::Icon-->
									<!--begin::Input-->
									<input type="text" class="form-control form-control-flush ps-10" name="search" value="" placeholder="{{ __('Search...') }}" data-kt-search-element="input" />
									<!--end::Input-->
									<!--begin::Spinner-->
									<span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-1" data-kt-search-element="spinner">
										<span class="spinner-border h-15px w-15px align-middle text-gray-400"></span>
									</span>
									<!--end::Spinner-->
									<!--begin::Reset-->
									<span class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 d-none" data-kt-search-element="clear">
									<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
										<span class="svg-icon svg-icon-2 svg-icon-lg-1 me-0">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
												<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
											</svg>
										</span>
										<!--end::Svg Icon-->
									</span>
									<!--end::Reset-->
									<!--begin::Toolbar-->
									<div class="position-absolute top-50 end-0 translate-middle-y" data-kt-search-element="toolbar">
										<!--begin::Preferences toggle-->
										<div data-kt-search-element="preferences-show" class="btn btn-icon w-20px btn-sm btn-active-color-primary me-1" data-bs-toggle="tooltip" title="Show search preferences">
											<!--begin::Svg Icon | path: icons/duotune/coding/cod001.svg-->
											<span class="svg-icon svg-icon-1">
																		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																			<path opacity="0.3" d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z" fill="black" />
																			<path d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z" fill="black" />
																		</svg>
											</span>
											<!--end::Svg Icon-->
										</div>
										<!--end::Preferences toggle-->
										<!--begin::Advanced search toggle-->
										<div data-kt-search-element="advanced-options-form-show" class="btn btn-icon w-20px btn-sm btn-active-color-primary" data-bs-toggle="tooltip" title="Show more search options">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</div>
											<!--end::Advanced search toggle-->
									</div>
									<!--end::Toolbar-->
								</form>
								<!--end::Form-->
								<!--begin::Separator-->
								<div class="separator border-gray-200 mb-6"></div>
								<!--end::Separator-->
								</div>
								<!--end::Wrapper-->
							</div>
							<!--end::Menu-->
						</div>
											<!--end::Search-->
					</div>
					<!--end::Search-->
					<!--begin::Activities-->
					<div class="d-flex align-items-center ms-1 ms-lg-3">
						<!--begin::Drawer toggle-->
							<div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_activities_toggle">
								<!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
								<span class="svg-icon svg-icon-1">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<rect x="8" y="9" width="3" height="10" rx="1.5" fill="black" />
										<rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="black" />
										<rect x="18" y="11" width="3" height="8" rx="1.5" fill="black" />
										<rect x="3" y="13" width="3" height="6" rx="1.5" fill="black" />
									</svg>
								</span>
								<!--end::Svg Icon-->
							</div>
							<!--end::Drawer toggle-->
					</div>
					<!--end::Activities-->
					<!--begin::Notifications-->
					<div class="d-flex align-items-center ms-1 ms-lg-3">
						<!--begin::Menu- wrapper-->
						<div class="btn btn-icon btn-active-light-primary position-relative w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
							<!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
							<span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z" fill="black" />
									<path d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z" fill="black" />
									<path opacity="0.3" d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z" fill="black" />
									<path opacity="0.3" d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z" fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
						<!--end::Menu wrapper-->
					</div>
						<!--end::Notifications-->
						<!--begin::Chat-->
						<div class="d-flex align-items-center ms-1 ms-lg-3">
							<!--begin::Menu wrapper-->
							<div class="btn btn-icon btn-active-light-primary position-relative w-30px h-30px w-md-40px h-md-40px" id="kt_drawer_chat_toggle">
								<!--begin::Svg Icon | path: icons/duotune/communication/com012.svg-->
								<span class="svg-icon svg-icon-1">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path opacity="0.3" d="M20 3H4C2.89543 3 2 3.89543 2 5V16C2 17.1046 2.89543 18 4 18H4.5C5.05228 18 5.5 18.4477 5.5 19V21.5052C5.5 22.1441 6.21212 22.5253 6.74376 22.1708L11.4885 19.0077C12.4741 18.3506 13.6321 18 14.8167 18H20C21.1046 18 22 17.1046 22 16V5C22 3.89543 21.1046 3 20 3Z" fill="black" />
										<rect x="6" y="12" width="7" height="2" rx="1" fill="black" />
										<rect x="6" y="7" width="12" height="2" rx="1" fill="black" />
									</svg>
								</span>
								<!--end::Svg Icon-->
								<span class="bullet bullet-dot bg-success h-6px w-6px position-absolute translate-middle top-0 start-50 animation-blink"></span>
							</div>
							<!--end::Menu wrapper-->
						</div>
						<!--end::Chat-->
						<!--begin::Quick links-->
						<div class="d-flex align-items-center ms-1 ms-lg-3">
							<!--begin::Menu wrapper-->
							<div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
								<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
								<span class="svg-icon svg-icon-1">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
										<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
										<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
										<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
									</svg>
								</span>
								<!--end::Svg Icon-->
							</div>
							<!--end::Menu wrapper-->
						</div>
						<!--end::Quick links-->
						<!--begin::User-->
						<div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
							<!--begin::Menu wrapper-->
							<div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
								<img src="{{asset('assets/media/avatars/150-26.jpg')}}" alt="user" />
							</div>
							<!-- begin::Menu-->
							<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
								<!--begin::Menu item-->
								<div class="menu-item px-3">
									<div class="menu-content d-flex align-items-center px-3">
										<!--begin::Username-->
										@auth
										<!--begin::Avatar-->
											<div class="symbol symbol-50px me-5">
												<img alt="Logo" src="{{asset('assets/media/avatars/blank.png')}}" />
											</div>
											<!--end::Avatar-->
											<div class="d-flex flex-column">
												<div class="fw-bolder d-flex align-items-center fs-5">{{ auth()->user()->username }}</div>
												<a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{ auth()->user()->email }}</a>
											</div>
										@endauth
										@guest
											<div class="d-flex flex-column">
												<a href="#" class="menu-link px-5">{{ __('Login') }}</a>
											</div>
										@endguest
										<!--end::Username-->
									</div>
								</div>
								<!--begin::Menu separator-->
								<div class="separator my-2"></div>
                                @include("partials.languages")
								<!--end::Menu separator-->
								<div class="menu-item px-5">
									<a href="#" class="menu-link px-5">{{ __('Change Password') }}</a>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu separator-->
								<div class="separator my-2"></div>
								<!--end::Menu separator-->
								<!--begin::Menu item-->
								<div class="menu-item px-5">
									<a href="{{ route('auth.logout') }}" class="menu-link px-5">{{ __('Sign Out') }}</a>
								</div>
								<!--end::Menu item-->

							</div>
							<!--end::Menu wrapper-->
						</div>
						<!--end::User -->
						<!--begin::Heaeder menu toggle-->
						<div class="d-flex align-items-center d-lg-none ms-2 me-n3" title="Show header menu">
							<div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_header_menu_mobile_toggle">
								<!--begin::Svg Icon | path: icons/duotune/text/txt001.svg-->
								<span class="svg-icon svg-icon-1">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path d="M13 11H3C2.4 11 2 10.6 2 10V9C2 8.4 2.4 8 3 8H13C13.6 8 14 8.4 14 9V10C14 10.6 13.6 11 13 11ZM22 5V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4V5C2 5.6 2.4 6 3 6H21C21.6 6 22 5.6 22 5Z" fill="black" />
										<path opacity="0.3" d="M21 16H3C2.4 16 2 15.6 2 15V14C2 13.4 2.4 13 3 13H21C21.6 13 22 13.4 22 14V15C22 15.6 21.6 16 21 16ZM14 20V19C14 18.4 13.6 18 13 18H3C2.4 18 2 18.4 2 19V20C2 20.6 2.4 21 3 21H13C13.6 21 14 20.6 14 20Z" fill="black" />
									</svg>
								</span>
								<!--end::Svg Icon-->
							</div>
						</div>
						<!--end::Heaeder menu toggle-->
					</div>
					<!--end::Toolbar wrapper-->
			</div>
			<!--end::Topbar-->
		</div>
		<!--end::Wrapper-->
	</div>
	<!--end::Container-->
</div>
<!--end::Header-->
@section('scripts')
<script>
function changlang(lang){
	//var url = "{{  route('lang',".lang.") }}";
	var url = "{{route('lang', '')}}"+"/" + lang;
	window.location.href=url;
}
</script>
@endsection
