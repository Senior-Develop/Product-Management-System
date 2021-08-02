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
    <!-- <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}" /> -->
<link href="{{asset('assets/css/admin/pages/login.css')}}" rel="stylesheet" type="text/css" />
    
</head>

<body
    class="kt-login-v2--enabled kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--static kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">
    <!-- begin::Page loader -->
    <!-- end::Page Loader -->
    <!-- begin:: Page -->
    <div class="kt-grid kt-grid--ver kt-grid--root">
        <div class="kt-grid__item   kt-grid__item--fluid kt-grid  kt-grid kt-grid--hor kt-login-v2" id="kt_login_v2">
            <!--begin::Item-->
            <div class="kt-grid__item  kt-grid--hor">
                <!--begin::Heade-->
                <div class="kt-login-v2__head">
                    <div class="kt-login-v2__logo">
                        <a href="#">
                            <img src="{{asset('assets/media/logos/logo-5.png')}}" alt="" />
                        </a>
                    </div>
                    <div class="kt-login-v2__signup">
                        <span>¿No tienes cuenta?</span>
                        <a href="{{url('admin/signup')}}" class="kt-link kt-font-brand">Inscribirse</a>
                    </div>
                </div>
                <!--begin::Head-->
            </div>
            <!--end::Item-->

            <!--begin::Item-->
            <div class="kt-grid__item  kt-grid  kt-grid--ver  kt-grid__item--fluid">
                <!--begin::Body-->
                <div class="kt-login-v2__body">
                    <!--begin::Wrapper-->
                    <div class="kt-login-v2__wrapper">
                        <div class="kt-login-v2__container">
                            <div class="kt-login-v2__title">
                                <h3>Iniciar sesión en la cuenta</h3>
                            </div>

                            <!--begin::Form-->
                            <form class="kt-login-v2__form kt-form" action="{{url('admin/signup')}}" autocomplete="off" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Nombre de usuario" name="name" required 
                                        autocomplete="off">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="input-icon"><i class='bx bx-at'></i></div>
                                    <input type="email" class="form-control" name="email" placeholder="Dirección de correo electrónico" required>
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" placeholder="Contraseña" name="password" required 
                                        autocomplete="off">
                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!--begin::Action-->
                                <div class="kt-login-v2__actions">
                                    <a href="#" class="kt-link kt-link--brand">
                                        ¿Has olvidado tu contraseña?
                                    </a>
                                    <button type="submit" class="btn btn-brand btn-elevate btn-pill">Iniciar sesión</button>
                                </div>
                                <!--end::Action-->
                            </form>
                            <!--end::Form-->

                            <!--begin::Separator-->
                            <div class="kt-separator kt-separator--space-lg  kt-separator--border-solid"></div>
                            <!--end::Separator-->

                 
                        </div>
                    </div>
                    <!--end::Wrapper-->

                    <!--begin::Image-->
                    <div class="kt-login-v2__image">
                        <img src="{{asset('assets/media/misc/bg_icon.svg')}}" alt="">
                    </div>
                    <!--begin::Image-->
                </div>
                <!--begin::Body-->
            </div>
            <!--end::Item-->

            <!--begin::Item-->
            <div class="kt-grid__item">
                <div class="kt-login-v2__footer">
                    <div class="kt-login-v2__link">
                        <a href="#" class="kt-link kt-font-brand">Privacy</a>
                        <a href="#" class="kt-link kt-font-brand">Legal</a>
                        <a href="#" class="kt-link kt-font-brand">Contact</a>
                    </div>

                    <div class="kt-login-v2__info">
                        <a href="#" class="kt-link">&copy; 2021 PMS</a>
                    </div>
                </div>
            </div>
            <!--end::Item-->
        </div>
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

    <script src="{{asset('assets/js/admin/pages/custom/user/login.js')}}" type="text/javascript"></script>
</body>
