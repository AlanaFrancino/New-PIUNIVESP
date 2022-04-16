<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--verificar---->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--verificar---->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--verificar---->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--verificar---->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--verificar---->
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--verificar---->
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <!--verificar---->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--verificar---->
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--verificar---->
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <!--verificar---->
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--verificar---->
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--verificar---->
    <!--===============================================================================================-->
    <script src="{{ asset('js/main.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('site/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('site/style.css') }}">
    <script src="{{ asset('site/bootstrap.js') }}"></script>
    <script src="{{ asset('site/jquery.js') }}"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class='dashboard'>
        <div class="dashboard-nav">
            <header>
                <a href="#!" class="menu-toggle">
                    <i class="fa fa-bars"></i>
                </a>
                <a href="#" class="brand-logo">
                    <img src="../../images/logo2.jpeg" style="max-width: 65px;"/>
                    <span>Web Delmira</span>
                </a>
            </header>
            <nav class="dashboard-nav-list"><a href="#" class="dashboard-nav-item"><i class="fa fa-home"></i>
                    Home </a><a href="#" class="dashboard-nav-item active"><i class="fa fa-tachometer-alt"></i> dashboard
                </a><a href="#" class="dashboard-nav-item"><i class="fa fa-file-upload"></i> Upload </a>
                <div class='dashboard-nav-dropdown'><a href="#!"
                        class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i class="fa fa-photo-video"></i> Media
                    </a>
                    <div class='dashboard-nav-dropdown-menu'><a href="#" class="dashboard-nav-dropdown-item">All</a><a
                            href="#" class="dashboard-nav-dropdown-item">Recent</a><a href="#"
                            class="dashboard-nav-dropdown-item">Images</a><a href="#"
                            class="dashboard-nav-dropdown-item">Video</a></div>
                </div>
                <div class='dashboard-nav-dropdown'><a href="#!"
                        class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i class="fa fa-users"></i> Users
                    </a>
                    <div class='dashboard-nav-dropdown-menu'><a href="#" class="dashboard-nav-dropdown-item">All</a><a
                            href="#" class="dashboard-nav-dropdown-item">Subscribed</a><a href="#"
                            class="dashboard-nav-dropdown-item">Non-subscribed</a><a href="#"
                            class="dashboard-nav-dropdown-item">Banned</a><a href="#"
                            class="dashboard-nav-dropdown-item">New</a></div>
                </div>
                <div class='dashboard-nav-dropdown'><a href="#!"
                        class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i class="fa fa-money-check-alt"></i>
                        Payments </a>
                    <div class='dashboard-nav-dropdown-menu'><a href="#" class="dashboard-nav-dropdown-item">All</a><a
                            href="#" class="dashboard-nav-dropdown-item">Recent</a><a href="#"
                            class="dashboard-nav-dropdown-item"> Projections</a>
                    </div>
                </div>
                <a href="#" class="dashboard-nav-item"><i class="fa fa-cogs"></i> Settings </a><a href="#"
                    class="dashboard-nav-item"><i class="fa fa-user"></i> Profile </a>
                <div class="nav-item-divider"></div>
                <a href="#" class="dashboard-nav-item"><i class="fa fa-sign-out-alt"></i> Logout </a>
            </nav>
        </div>
        <div class='dashboard-app'>
            <header class='dashboard-toolbar'><a href="#!" class="menu-toggle"><i class="fa fa-bars"></i></a>
            </header>
            <main class="py-0">
                @yield('content')
            </main>
        </div>
</body>
<script type="text/javascript">
    const mobileScreen = window.matchMedia("(max-width: 990px )");
$(document).ready(function () {
$(".dashboard-nav-dropdown-toggle").click(function () {
    $(this).closest(".dashboard-nav-dropdown")
        .toggleClass("show")
        .find(".dashboard-nav-dropdown")
        .removeClass("show");
    $(this).parent()
        .siblings()
        .removeClass("show");
});
$(".menu-toggle").click(function () {
    if (mobileScreen.matches) {
        $(".dashboard-nav").toggleClass("mobile-show");
    } else {
        $(".dashboard").toggleClass("dashboard-compact");
    }
});
});
</script>
</html>
