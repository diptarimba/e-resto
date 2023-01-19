<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') | @env('APP_NAME')</title>

    <link rel="stylesheet" href="{{asset('dashboard-assets/css/main/app.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard-assets/css/main/app-dark.css')}}">
    <link rel="shortcut icon" href="{{asset('dashboard-assets/images/logo/favicon.svg')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('dashboard-assets/images/logo/favicon.png')}}" type="image/png">
    @yield('header')
    @stack('header-add')
</head>

<body>
    <div id="app">
        @include('layouts.admin.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            @yield('body')

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2022 &copy; @env('APP_NAME')</p>
                    </div>
                    <div class="float-end">
                        {{-- <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="https://saugi.me">Saugi</a></p> --}}
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{asset('dashboard-assets/js/app.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('dashboard-assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('dashboard-assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('dashboard-assets/js/bootstrap.bundle.min.js')}}"></script>
    @yield('footer')
    @stack('footer-add')
</body>

</html>
