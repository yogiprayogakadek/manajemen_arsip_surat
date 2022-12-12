<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="icon"
        href="{{asset('assets/images/logo.png')}}"
        type="image/png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet"
        href="https://demos.creative-tim.com/impact-design-system-pro/dashboard/assets/vendor/nucleo/css/nucleo.css"
        type="text/css">
    <link rel="stylesheet"
        href="https://demos.creative-tim.com/impact-design-system-pro/dashboard/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css"
        type="text/css">
    <link rel="stylesheet"
        href="https://demos.creative-tim.com/impact-design-system-pro/dashboard/assets/vendor/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet"
        href="https://demos.creative-tim.com/impact-design-system-pro/dashboard/assets/vendor/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/impact-design-system-pro/dashboard/css/dashboard.css"
        type="text/css">
    <style>
        .async-hide {
            opacity: 0 !important
        }
    </style>
    <title>SPK WP | Login</title> <!-- BOOTSTRAP CSS -->
    <script async="" src="https://s.pinimg.com/ct/lib/main.c99cd143.js"></script>
    <script type="text/javascript" async="" src="https://snap.licdn.com/li.lms-analytics/insight.min.js"></script>
    <script type="text/javascript" async="" src="https://s.pinimg.com/ct/core.js"></script>
    <script type="text/javascript" async="" src="https://static.hotjar.com/c/hotjar-99526.js?sv=7"></script>
    <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script>
    <script type="text/javascript" async=""
        src="https://www.google-analytics.com/gtm/js?id=GTM-K9BGS8K&amp;cid=1196923871.1659277476&amp;aip=true">
    </script>
    <script async="" src="https://www.googletagmanager.com/gtm.js?id=GTM-NKDMSK6"></script>
    <script async="" src="https://www.google-analytics.com/analytics.js"></script>
    <script>
        <script async="" src="https://script.hotjar.com/modules.311bafb9406f6ba6bebc.js" charset="utf-8">
    </script>
</head>

<body class="bg-white g-sidenav-show g-sidenav-pinned"><noscript><iframe
            src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <div class="main-content">
        <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                            <h1 class="text-white">Welcome!</h1>
                            <p class="text-lead text-white">Sistem Informasi</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100"><svg x="0" y="0" viewBox="0 0 2560 100"
                    preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
                </svg></div>
        </div>
        <div class="container mt--9 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary border border-soft mb-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-gray mb-4"><small><img src="{{asset('assets/images/logo.png')}}" height="70px"></small></div>
                            {{--<div class="text-center text-gray mb-4"><small>Login Pengguna Sistem</small></div>--}}
                            <form role="form" action="{{route('login')}}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="ni ni-email-83"></i></span></div><input class="form-control @error('username') is-invalid @enderror"
                                            placeholder="Username" type="text" name="username" value="{{ old('username') }}">
                                            @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="ni ni-lock-circle-open"></i></span></div><input
                                            class="form-control @error('password') is-invalid @enderror" placeholder="Password" type="password" name="password">
                                    </div>
                                </div>
                                <div class="text-center"><button type="submit" class="btn btn-primary my-4">Sign
                                        in</button></div>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6"><a href="#" class="text-gray"><small></small></a></div>
                        <div class="col-6 text-right"><a href="/pendaftaran" class="text-gray"><small>Buat akun baru</small></a></div>
                    </div>
                    {{--<div class="row mt-3">
                        <div class="col-6"><a href="#" class="text-gray"><small>Forgot password?</small></a></div>
                        <div class="col-6 text-right"><a href="#" class="text-gray"><small>Create new
                                    account</small></a></div>
                    </div>--}}
                </div>
            </div>
        </div>
    </div>
    <script
        src="https://demos.creative-tim.com/impact-design-system-pro/dashboard/assets/vendor/jquery/dist/jquery.min.js">
    </script>
    <script
        src="https://demos.creative-tim.com/impact-design-system-pro/dashboard/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js">
    </script>
    <script
        src="https://demos.creative-tim.com/impact-design-system-pro/dashboard/assets/vendor/js-cookie/js.cookie.js">
    </script>
    <script
        src="https://demos.creative-tim.com/impact-design-system-pro/dashboard/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js">
    </script>
    <script
        src="https://demos.creative-tim.com/impact-design-system-pro/dashboard/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js">
    </script>
    <script src="https://demos.creative-tim.com/impact-design-system-pro/dashboard/assets/js/dashboard.js?v=1.2.0">
    </script>
    <div class="backdrop d-xl-none" data-action="sidenav-unpin" data-target="undefined"></div>
    <script src="https://demos.creative-tim.com/impact-design-system-pro/dashboard/assets/js/demo.min.js"></script>
    <iframe id="_hjSafeContext_39963968" src="about:blank"
        style="display: none !important; width: 1px !important; height: 1px !important; opacity: 0 !important; pointer-events: none !important;"></iframe><iframe
        name="_hjRemoteVarsFrame" title="_hjRemoteVarsFrame" id="_hjRemoteVarsFrame"
        src="https://vars.hotjar.com/box-0004cb77850b00d4aa7e1e08ff61e8f0.html"
        style="display: none !important; width: 1px !important; height: 1px !important; opacity: 0 !important; pointer-events: none !important;"></iframe>
        <script>
        $(document).ready(function () {
            @if (session('status') == 'success')
                toastr.options =
                {
                    "closeButton" : true,
                    "progressBar" : true
                }
                toastr.success("{{ session('message') }}");
            @elseif (session('status') == 'error')
                toastr.options =
                {
                    "closeButton" : true,
                    "progressBar" : true
                }
                toastr.error("{{ session('message') }}");
            @endif
        });
    </script>
</body>

</html>