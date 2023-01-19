<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') | CMC Polines</title>

    <link rel="stylesheet" href="{{asset('dashboard-assets/css/main/app.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard-assets/css/pages/auth.css')}}">
    <link rel="shortcut icon" href="{{asset('dashboard-assets/images/logo/logo.svg')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('dashboard-assets/images/logo/favicon.png')}}" type="image/png">
    @yield('header')
</head>

<body>
    <div id="auth">
        @yield('body')
    </div>
    @yield('footer')

</body>

</html>
