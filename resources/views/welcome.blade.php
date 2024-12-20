<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title -->

    <title>Login | DAS Triasmitra</title>


    <!-- Required Meta Tag -->

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mordenize" />
    <meta name="author" content="" />
    <meta name="keywords" content="Mordenize" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />


    <!-- Favicon -->

    <link rel="shortcut icon" type="image/png" href="dist/images/logos/icon.png" />


    <!-- Owl Carousel -->

    <link rel="stylesheet" href="dist/libs/owl.carousel/dist/assets/owl.carousel.min.css">


    <!-- Core Css -->


    <link rel="stylesheet" href="dist/css/style.min.css" />
</head>


<body>
    <!-- Preloader -->
    <div class="preloader" style="display: none;">
        <img src="../../dist/images/logos/favicon.ico" alt="loader" class="lds-ripple img-fluid">
    </div>
    <!-- Preloader -->
    <div class="preloader" style="display: none;">
        <img src="../../dist/images/logos/favicon.ico" alt="loader" class="lds-ripple img-fluid">
    </div>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100">
            <div class="position-relative z-index-5">
                <div class="row">
                    <div class="col-xl-7 col-xxl-8"
                        style="background-image: url('dist/images/landing-page1.svg'); background-repeat: no-repeat; background-size: contain; background-position: center;">
                        {{-- <a href="./index.html" class="text-nowrap logo-img d-block px-4 py-9 w-100">
                            <img src="../../dist/images/logos/dark-logo.svg" width="180" alt="">
                        </a> --}}
                    </div>
                    <div class="col-xl-5 col-xxl-4">
                        <div
                            class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                            <h2 class="text-center" style="margin-bottom: -150px;">Digital Archiving System</h2>
                            <div class="col-sm-8 col-md-6 col-xl-9 shadow bg-body p-4 rounded">
                                <span href="#" class="text-nowrap logo-img text-center d-block mb-5 w-100"
                                    style="cursor: default;">
                                    <img src="dist/images/logos/logo.png" width="180" alt="">
                                </span>
                                <div class="card-body">

                                    @if (Session::has('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ Session::get('error') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('login.post') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">NIK</label>
                                            <input type="text"
                                                class="form-control @error('email') is-invalid @enderror"
                                                name="username">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="exampleInputPassword1" class="form-label">Password</label>
                                            {{-- <input type="password" name="password" required
                                                autocomplete="current-password" class="form-control"
                                                id="exampleInputPassword1">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror --}}
                                            <div class="input-group">
                                                <input type="password" name="password" required
                                                    autocomplete="current-password" class="form-control" id="password">
                                                <button class="btn btn-outline-secondary" type="button"
                                                    id="togglePassword">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input primary" type="checkbox" value=""
                                                    id="flexCheckChecked" checked>
                                                <label class="form-check-label text-dark" for="flexCheckChecked">
                                                    Remember this Device
                                                </label>
                                            </div>
                                        </div>
                                        <button type="submit"
                                            class="btn btn-primary w-100 py-8 mb-4 rounded-2">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--  Import Js Files -->
    <script src="../../dist/libs/jquery/dist/jquery.min.js"></script>
    <script src="../../dist/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="../../dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--  core files -->
    <script src="../../dist/js/app.min.js"></script>
    <script src="../../dist/js/app.init.js"></script>
    <script src="../../dist/js/app-style-switcher.js"></script>
    <script src="../../dist/js/sidebarmenu.js"></script>

    <script src="../../dist/js/custom.js"></script>

    <script>
        // Toggle show/hide password
        const togglePassword = document.querySelector('#togglePassword');
        const passwordInput = document.querySelector('#password');

        togglePassword.addEventListener('click', function() {
            // Toggle the password input type
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Toggle the eye icon
            this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' :
            '<i class="fas fa-eye-slash"></i>';
        });
    </script>

</body>

</html>
