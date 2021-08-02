<!DOCTYPE html>

<html lang="en">

<head>
    <!--begin::Base Path (base relative path for assets of this page) -->
    <base href="../">
    <!--end::Base Path -->
    <meta charset="utf-8')}}" />
    <title>PMS</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!--begin::Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });

        var csrf_token = "{{ csrf_token() }}";
        var base_path = "{{url('/')}}";
    </script>
    <!--end::Fonts -->
    <!--begin::Page Vendors Styles(used by this page) -->
    <link href="{{asset('assets/vendors/custom/jquery-ui/jquery-ui.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet"
        type="text/css" />
    <!--end::Page Vendors Styles -->
    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{asset('assets/vendors/global/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/admin/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles -->
    <!--begin::Layout Skins(used by all pages) -->
    <link href="{{asset('assets/css/admin/skins/aside/brand.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Layout Skins -->
    <link href="{{asset('assets/css/admin/pages/layout.css')}}" rel="stylesheet" type="text/css" />
    <!-- <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon1.ico')}}" /> -->
    @yield('style')
</head>

<body
    class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--static kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">
    <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
        <div class="kt-header-mobile__logo">
            <a href="{{url('admin')}}">
                <!-- <img alt="Logo" src="{{asset('assets/media/logos/logo1.svg')}}" class="logo-img"/> -->
            </a>
        </div>
        <div class="kt-header-mobile__toolbar">
            <button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left"
                id="kt_aside_mobile_toggler"><span></span></button>

            <button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i
                    class="flaticon-more"></i></button>
        </div>
    </div>
    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
            <!-- begin:: Aside -->
            <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>

            <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop"
                id="kt_aside">

                <!-- begin:: Aside -->
                <div class="kt-aside__brand   kt-grid__item" id="kt_aside_brand">
                    <div class="kt-aside__brand-logo">
                        <a href="{{url('admin')}}">
                            <!-- <img alt="Logo" src="{{asset('assets/media/logos/logo1.svg')}}" class="logo-img"/> -->
                        </a>
                    </div>
                    <div class="kt-aside__brand-tools">
                        <button class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left"
                            id="kt_aside_toggler"><span></span></button>
                    </div>
                </div>
                <!-- end:: Aside -->
                <!-- begin:: Aside Menu -->
                @include('admin.layouts.menu')
                <!-- end:: Aside Menu -->
            </div>
            <!-- end:: Aside -->
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper">
                <!-- begin:: Header -->
                <div id="kt_header" class="kt-header kt-grid__item " data-ktheader-minimize="on">
                    <div class="kt-container  kt-container--fluid ">

                        <!-- begin:: Subheader -->
                        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
                            <div class="kt-subheader__main">
                                <h3 class="kt-subheader__title">@yield('title')</h3>
                            </div>
                        </div>
                        <!-- begin:: Topbar -->
                        <div class="kt-header__topbar">
                            <!--begin: Search -->
                            <div class="kt-header__topbar-item kt-header__topbar-item--search">
                                <div class="kt-header__topbar-wrapper">
                                    <div class="kt-quick-search kt-quick-search--inline kt-quick-search--result-compact"
                                        id="kt_quick_search_inline">
                                        <form method="get" class="kt-quick-search__form">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i
                                                            class="flaticon2-search-1"></i></span></div>
                                                <input type="text" class="form-control kt-quick-search__input"
                                                    placeholder="Buscar">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="la la-close kt-quick-search__close"></i></span></div>
                                            </div>
                                        </form>

                                        <div data-toggle="dropdown" data-offset="0,15px"></div>

                                        <div
                                            class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-lg">
                                            <div class="kt-quick-search__wrapper kt-scroll" data-scroll="true"
                                                data-height="325" data-mobile-height="200">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end: Search -->

                            <!--begin: Search -->
                            <div class="kt-header__topbar-item kt-header__topbar-item--search kt-hidden">
                                <div class="kt-input-icon kt-input-icon--right">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                        <span><i class="la la-search"></i></span>
                                    </span>
                                </div>
                            </div>
                            <!--end: Search -->
                            <!--begin: Languages -->
                            <div class="kt-header__topbar-item kt-header__topbar-item--langs">
                                <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                                    <span class="kt-header__topbar-icon">
                                        <img class="" src="{{asset('assets/media/flags/016-spain.svg')}}" alt="" />
                                    </span>
                                </div>
                                <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim">
                                    <ul class="kt-nav kt-margin-t-10 kt-margin-b-10">
                                        <li class="kt-nav__item kt-nav__item--active">
                                            <a href="#" class="kt-nav__link">
                                                <span class="kt-nav__link-icon"><img
                                                        src="{{asset('assets/media/flags/020-flag.svg')}}"
                                                        alt="" /></span>
                                                <span class="kt-nav__link-text">Inglés</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <span class="kt-nav__link-icon"><img
                                                        src="{{asset('assets/media/flags/019-france.svg')}}"
                                                        alt="" /></span>
                                                <span class="kt-nav__link-text">Francia</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <span class="kt-nav__link-icon"><img
                                                        src="{{asset('assets/media/flags/017-germany.svg')}}"
                                                        alt="" /></span>
                                                <span class="kt-nav__link-text">Alemán</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--end: Languages -->

                            <!--begin: Notifications -->
                            <div class="kt-header__topbar-item dropdown">
                                <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="30px,0px">
                                    <span class="kt-header__topbar-icon kt-bg-brand"><i
                                            class="fa fa-bell kt-font-light"></i></span>
                                    <span class="kt-badge kt-badge--danger kt-badge--notify">3</span>
                                </div>
                                <div
                                    class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
                                    <div class="kt-head"
                                        style="background-image: url({{asset('assets/media/misc/head_bg_sm.jpg')}}">
                                        <h3 class="kt-head__title">Notificaciones</h3>
                                        <div class="kt-head__sub"><span class="kt-head__desc">23 Nuevas notificaciones</span></div>
                                    </div>
                                    <div class="kt-notification kt-margin-t-30 kt-margin-b-20 kt-scroll"
                                        data-scroll="true" data-height="270" data-mobile-height="220">
                                        <a href="#" class="kt-notification__item">
                                            <div class="kt-notification__item-icon">
                                                <i class="flaticon2-line-chart kt-font-success"></i>
                                            </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title">
                                                    Nueva orden recibida
                                                </div>
                                                <div class="kt-notification__item-time">
                                                    2 hrs ago
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="kt-notification__item">
                                            <div class="kt-notification__item-icon">
                                                <i class="flaticon2-box-1 kt-font-brand"></i>
                                            </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title">
                                                    Nuevo usuario registrado
                                                </div>
                                                <div class="kt-notification__item-time">
                                                    3 hrs ago
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="kt-notification__item">
                                            <div class="kt-notification__item-icon">
                                                <i class="flaticon2-image-file kt-font-warning"></i>
                                            </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title">
                                                    Nuevo archivo subido
                                                </div>
                                                <div class="kt-notification__item-time">
                                                    5 hrs ago
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="kt-notification__item">
                                            <div class="kt-notification__item-icon">
                                                <i class="flaticon2-bar-chart kt-font-info"></i>
                                            </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title">
                                                    New user feedback received
                                                </div>
                                                <div class="kt-notification__item-time">
                                                    8 hrs ago
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="kt-notification__item">
                                            <div class="kt-notification__item-icon">
                                                <i class="flaticon2-pie-chart-2 kt-font-success"></i>
                                            </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title">
                                                    System reboot has been successfully completed
                                                </div>
                                                <div class="kt-notification__item-time">
                                                    12 hrs ago
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="kt-notification__item">
                                            <div class="kt-notification__item-icon">
                                                <i class="flaticon2-favourite kt-font-focus"></i>
                                            </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title">
                                                    New order has been placed
                                                </div>
                                                <div class="kt-notification__item-time">
                                                    15 hrs ago
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="kt-notification__item kt-notification__item--read">
                                            <div class="kt-notification__item-icon">
                                                <i class="flaticon2-safe kt-font-primary"></i>
                                            </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title">
                                                    Company meeting canceled
                                                </div>
                                                <div class="kt-notification__item-time">
                                                    19 hrs ago
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="kt-notification__item">
                                            <div class="kt-notification__item-icon">
                                                <i class="flaticon2-psd kt-font-success"></i>
                                            </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title">
                                                    New report has been received
                                                </div>
                                                <div class="kt-notification__item-time">
                                                    23 hrs ago
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="kt-notification__item">
                                            <div class="kt-notification__item-icon">
                                                <i class="flaticon-download-1 kt-font-danger"></i>
                                            </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title">
                                                    Finance report has been generated
                                                </div>
                                                <div class="kt-notification__item-time">
                                                    25 hrs ago
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="kt-notification__item">
                                            <div class="kt-notification__item-icon">
                                                <i class="flaticon-security kt-font-warning"></i>
                                            </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title">
                                                    New customer comment recieved
                                                </div>
                                                <div class="kt-notification__item-time">
                                                    2 days ago
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="kt-notification__item">
                                            <div class="kt-notification__item-icon">
                                                <i class="flaticon2-pie-chart kt-font-focus"></i>
                                            </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title">
                                                    New customer is registered
                                                </div>
                                                <div class="kt-notification__item-time">
                                                    3 days ago
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--end: Notifications -->

                            <!--begin: User -->
                            <div class="kt-header__topbar-item kt-header__topbar-item--user">
                                <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                                    <img alt="Pic" src="{{asset('assets/media/users/100_7.jpg')}}" />
                                    <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                                </div>
                                <div
                                    class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-md">
                                    <div class="kt-user-card kt-margin-b-40 kt-margin-b-30-tablet-and-mobile">
                                        <div class="kt-user-card__wrapper">
                                            <div class="kt-user-card__pic">
                                                <!--use "kt-rounded" class for rounded avatar style-->
                                                <!-- <img alt="Pic" src="{{asset('assets/media/users/' . Auth::user()->name_1)}}"
                                                    class="kt-rounded" /> -->
                                            </div>
                                            <div class="kt-user-card__details">
                                                <div class="kt-user-card__position">{{ Auth::user()->name_1 }}</div>
                                                <div class="kt-user-card__position"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <ul class="kt-nav kt-margin-b-10">
                                        <li class="kt-nav__item">
                                            <a href="demo2/custom/user/profile-v1.html" class="kt-nav__link">
                                                <span class="kt-nav__link-icon"><i
                                                        class="flaticon2-calendar-3"></i></span>
                                                <span class="kt-nav__link-text">Mi Perfil</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="demo2/custom/user/profile-v1.html" class="kt-nav__link">
                                                <span class="kt-nav__link-icon"><i
                                                        class="flaticon2-browser-2"></i></span>
                                                <span class="kt-nav__link-text">Mis Tareas</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="demo2/custom/user/profile-v1.html" class="kt-nav__link">
                                                <span class="kt-nav__link-icon"><i class="flaticon2-mail"></i></span>
                                                <span class="kt-nav__link-text">Mensajes</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="demo2/custom/user/profile-v1.html" class="kt-nav__link">
                                                <span class="kt-nav__link-icon"><i class="flaticon2-gear"></i></span>
                                                <span class="kt-nav__link-text">Configuración </span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__separator kt-nav__separator--fit"></li>

                                        <li class="kt-nav__custom kt-space-between">
                                            <a href="{{ url('admin/logout') }}"
                                                class="btn btn-label-brand btn-upper btn-sm btn-bold">Sign Out</a>
                                            <i class="flaticon2-information kt-label-font-color-2"
                                                data-toggle="kt-tooltip" data-placement="right" title=""
                                                data-original-title="Click to learn more..."></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--end: User -->
                        </div>
                        <!-- end:: Topbar -->
                    </div>
                </div>
                <!-- end:: Header -->
                @yield('page')
            </div>
        </div>
    </div>
    <div id="kt_scrolltop" class="kt-scrolltop">
        <i class="la la-arrow-up"></i>
    </div>
    <script>
        var KTAppOptions = {
            "colors": {
                "state": {
                    "brand": "#3699FF",
                    "metal": "#c4c5d6",
                    "light": "#ffffff",
                    "accent": "#00c5dc",
                    "primary": "#3699FF",
                    "success": "#34bfa3",
                    "info": "#36a3f7",
                    "warning": "#ffb822",
                    "danger": "#fd3995",
                    "focus": "#9816f4"
                },
                "base": {
                    "label": [
                        "#c5cbe3",
                        "#a1a8c3",
                        "#3d4465",
                        "#3e4466"
                    ],
                    "shape": [
                        "#f0f3ff",
                        "#d9dffa",
                        "#afb4d4",
                        "#646c9a"
                    ]
                }
            }
        };


    </script>
    <script src="{{asset('assets/vendors/global/vendors.bundle.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/admin/scripts.bundle.js')}}" type="text/javascript"></script>

    <script src="{{asset('assets/js/admin/pages/app.js')}}"></script>

    @yield('scripts')

</body>

</html>