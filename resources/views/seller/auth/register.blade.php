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
                    <div class="col-lg-12 mx-auto">
                        <div class="auth-form-light text-center p-5">
                            <div class="brand-logo mb-3">
                                <img src="{{ asset('assets/images/sustech.png') }}" class="d-block mx-auto"
                                    alt="Logo" style="max-width: 120px;">
                            </div>

                            <h4 class="mb-2">Seller Registration</h4>
                            <h6 class="font-weight-light mb-4">Create a new account.</h6>

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            <form class="forms-sample pt-3" method="POST"
                                action="{{ route('seller.register.submit') }}">
                                @csrf

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control form-control-lg" id="name"
                                            name="name" placeholder="Full Name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control form-control-lg" id="username"
                                            name="username" placeholder="Username" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input type="email" class="form-control form-control-lg" id="email"
                                            name="email" placeholder="Email" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="tel" class="form-control form-control-lg" id="mobile"
                                            name="mobile" placeholder="Mobile Number" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <select class="form-control form-control-lg" id="country" name="country"
                                            required>
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <select class="form-control form-control-lg" id="state" name="state"
                                            disabled required>
                                            <option value="">Select State</option>
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}"
                                                    data-country="{{ $state->country_id }}">{{ $state->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <select class="form-control form-control-lg" id="city" name="city"
                                            disabled required>
                                            <option value="">Select City</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}"
                                                    data-state="{{ $city->state_id }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control form-control-lg" id="pin"
                                            name="pin" placeholder="PIN Code" required>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control form-control-lg" id="product_type"
                                            name="product_type" placeholder="Product Type" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control form-control-lg" id="gstin"
                                            name="gstin" placeholder="GSTIN Number" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input type="password" class="form-control form-control-lg" id="password"
                                            name="password" placeholder="Password" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="password" class="form-control form-control-lg"
                                            id="confirm_password" name="password_confirmation"
                                            placeholder="Confirm Password" required>
                                        <span id="password-match-message"
                                            class="text-danger small d-block mt-1"></span>
                                    </div>
                                </div>

                                <div class="mt-3 d-grid gap-2">
                                    <button type="submit"
                                        class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">REGISTER</button>
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
        $(document).ready(function() {
            $('#password, #confirm_password').on('keyup', function() {
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

        // Select country-state-city
        $(document).ready(function() {
            $('#country').on('change', function() {
                var countryId = $(this).val();

                $('#state').val('');
                $('#city').val('');
                $('#city').prop('disabled', true);

                if (countryId) {
                    $('#state').prop('disabled', false);
                    $('#state option').hide();
                    $('#state option:first').show(); // show "Select State"
                    $('#state option[data-country="' + countryId + '"]').show();
                } else {
                    $('#state').prop('disabled', true);
                }
            });

            $('#state').on('change', function() {
                var stateId = $(this).val();

                $('#city').val('');

                if (stateId) {
                    $('#city').prop('disabled', false);
                    $('#city option').hide();
                    $('#city option:first').show(); // show "Select City"
                    $('#city option[data-state="' + stateId + '"]').show();
                } else {
                    $('#city').prop('disabled', true);
                }
            });
        });
    </script>

</body>

</html>
