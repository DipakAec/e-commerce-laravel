<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Seller Register</title>

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-center p-5">
                            <div class="brand-logo mb-3">
                                <img src="{{ asset('assets/images/sustech.png') }}" class="d-block mx-auto" alt="Logo" style="max-width: 120px;">
                            </div>

                            <h4 class="mb-2">Seller Registration</h4>
                            <h6 class="font-weight-light mb-4">Create a new account.</h6>

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            <form class="pt-3" method="POST" action="{{ route('seller.register.submit') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" name="username" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" id="password" class="form-control form-control-lg" name="password" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" id="confirm_password" class="form-control form-control-lg" name="password_confirmation" placeholder="Confirm Password" required>
                                    <span id="password-match-message" class="text-danger small d-block mt-1"></span>
                                </div>

                                <div class="mt-3 d-grid gap-2">
                                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">REGISTER</button>
                                </div>

                                <div class="text-center mt-4 font-weight-light">
                                    Already have an account?
                                    <a href="{{ route('admin.login') }}" class="text-primary">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Plugins JS -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.cookie.js') }}"></script>

    <!-- jQuery Password Match Script -->
    <script>
        $(document).ready(function () {
            $('#password, #confirm_password').on('keyup', function () {
                var password = $('#password').val();
                var confirmPassword = $('#confirm_password').val();
                if (confirmPassword.length > 0) {
                    if (password !== confirmPassword) {
                        $('#password-match-message').text("Passwords do not match.");
                    } else {
                        $('#password-match-message').text("");
                    }
                } else {
                    $('#password-match-message').text("");
                }
            });
        });
    </script>
</body>

</html>
