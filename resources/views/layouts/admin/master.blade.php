<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title') | {{config('app.name')}}</title>

    <link rel="stylesheet" href="{{asset('dashboard-assets/css/main/app.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard-assets/css/main/app-dark.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard-assets/extensions/sweetalert2/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard-assets/css/daterangepicker.css')}}">
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
                        <p>{{date("Y")}} &copy; {{env('APP_NAME')}}</p>
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
    <script src="{{asset('assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('dashboard-assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('dashboard-assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('dashboard-assets/extensions/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('dashboard-assets/js/bootstrap.js')}}"></script>
    <script src="{{asset('dashboard-assets/js/moment.min.js')}}"></script>
    <script src="{{asset('dashboard-assets/js/daterangepicker.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
    </script>
    <script src="{{asset('dashboard-assets/js/OneSignalSDK.js')}}" defer></script>
    <script>
      window.OneSignal = window.OneSignal || [];
      OneSignal.push(function() {
        OneSignal.init({
          appId: "3ff3f046-d943-409b-8080-d5cb0329123c",
        });
      });
      OneSignal.push(function () {
        OneSignal.SERVICE_WORKER_PARAM = { scope: '/push/onesignal/' };
        OneSignal.SERVICE_WORKER_PATH = '{{asset('js/push/onesignal/OneSignalSDKWorker.js')}}'
        OneSignal.SERVICE_WORKER_UPDATER_PATH = '{{asset('js/push/onesignal/OneSignalSDKWorker.js')}}'
        OneSignal.init(initConfig);
    });
    </script>
    {{-- <script src="{{asset('dashboard-assets/js/bootstrap.bundle.min.js')}}"></script> --}}
    <script>
        function delete_data(identify){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                        $(`#${identify}`).submit();
                    }
                }
            )
        }
    </script>
    <script src="{{asset('imageReview.js')}}"></script>
    @yield('footer')
</body>

</html>
