<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('dashboard-assets/css/main/app.css')}}">
    <link rel="stylesheet" href="{{ asset('dashboard-assets/css/pages/auth.css')}}">
    <link rel="shortcut icon" href="{{ asset('dashboard-assets/images/logo/favicon.svg')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('dashboard-assets/images/logo/favicon.png')}}" type="image/png">
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-md-6 col-xl-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="{{ asset('dashboard-assets//images/logo/logo.svg')}}" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-4">Log in with your data that you entered during registration.</p>

                    <form action="{{route('auth.post')}}" method="POST">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="username" class="form-control form-control-xl" placeholder="Username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password" class="form-control form-control-xl" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-check form-check-lg d-flex align-items-center gap-2">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div>
                        <button class="btn btn-primary btn-block font-weight-bold btn-lg shadow-lg mt-5">Log in</button>
                    </form>
                    <div class="text-center mt-5">
                        <p class="text-gray-600 mb-1">Don't have an account? <a href="auth-register.html" class="font-bold">Sign
                                up</a>.</p>
                        <p><a class="font-bold" href="auth-forgot-password.html">Forgot password?</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-7 d-none d-md-block">
                <div id="auth-right">

                </div>
            </div>
        </div>
    </div>
</body>
</html>
