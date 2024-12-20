<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title -->

    <title>DAS APPLICATION</title>


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
    <link rel="stylesheet" href="dist/css/custom.css" />

    <!-- --------------------------------------------------- -->
    <!-- Datatable -->
    <!-- --------------------------------------------------- -->
    <link rel="stylesheet" href="dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
</head>

<style>
    @media (min-width: 992px) {
        #main-wrapper[data-layout=vertical][data-header-position=fixed][data-sidebartype=mini-sidebar] .app-header {
            width: 100%
        }

        #main-wrapper[data-layout=vertical][data-header-position=fixed] .app-header {
            width: 100%;
        }

        #main-wrapper[data-layout=vertical][data-sidebartype=full] .body-wrapper {
            margin-left: 0;
        }

        #main-wrapper[data-layout=vertical][data-sidebartype=mini-sidebar] .body-wrapper {
            margin-left: 0;
        }
    }
</style>

<body>

    {{-- @php
    $foto = DB::table('tb_pegawai')->where('nik', Auth::user()->id_user)->get()->first();
    $jabatan = DB::table('tb_jabatan')->where('id_peg', $foto->id_peg)->get()->first();
    @endphp --}}

    <!-- Preloader -->

    <div class="preloader">
        <img src="dist/images/logos/icon.png" alt="loader" class="lds-ripple img-fluid" />
    </div>

    <!-- Body Wrapper -->

    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">


        <!-- Main wrapper -->

        <div class="body-wrapper">

            <!-- Header Start -->

            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-expand-md navbar-light">
                    <h3 class="mb-0 mx-3">Digital Archiving System</h3>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <div class="d-flex gap-2 align-items-center justify-content-between">
                            <a href="javascript:void(0)"
                                class="nav-link d-flex d-flex d-sm-flex d-md-none align-items-center justify-content-center"
                                type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
                                aria-controls="offcanvasWithBothOptions">
                                <i class="ti ti-align-justified fs-7"></i>
                            </a>
                            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">

                                <a style="font-size:1rem;">user</a>
                                <li class="nav-item dropdown">
                                    <a class="nav-link pe-0" href="javascript:void(0)" id="drop1"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="d-flex align-items-center">
                                            <div class="user-profile-img">
                                                {{-- <img src="{{ $foto->foto ? asset('dist/images/foto/'.$foto->foto) : asset('dist/images/logos/user.png') }}"  
                                                    class="rounded-circle" width="35" height="35" alt="User Profile Picture" /> --}}
                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                        aria-labelledby="drop1">
                                        <div class="profile-dropdown position-relative" data-simplebar>
                                            <div class="py-3 px-7 pb-0">
                                                <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                                            </div>
                                            <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                                {{-- <img src="https://hris.triasmitra.com/assets/img/foto/{{$foto->foto}}"
                                                    class="rounded-circle" width="80" height="80" alt="" /> --}}
                                                {{-- <img src="{{ $foto->foto ? 'https://hris.triasmitra.com/assets/img/foto/'.$foto->foto : asset('dist/images/logos/user.png') }}"
                                                        class="rounded-circle" width="80" height="80" alt="User Profile Picture" /> --}}
                                                <div class="ms-3">
                                                    <h5 class="mb-1 fs-3">user</h5>
                                                    <span class="mb-1 d-block text-dark"></span>
                                                    <p class="mb-0 d-flex text-dark align-items-center gap-2">
                                                        <i class="ti ti-mail fs-4"></i>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="message-body">
                                                <a href="{{ route('profile') }}"
                                                    class="py-8 px-7 mt-8 d-flex align-items-center">
                                                    <span
                                                        class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                                        <img src="dist/images/svgs/icon-account.svg" alt=""
                                                            width="24" height="24">
                                                    </span>
                                                    <div class="w-75 d-inline-block v-middle ps-3">
                                                        <h6 class="mb-1 bg-hover-primary fw-semibold"> My Profile </h6>
                                                        <span class="d-block text-dark">Account View</span>
                                                    </div>
                                                </a>
                                                <a href="{{ route('changePassword') }}"
                                                    class="py-8 px-7 mt-8 d-flex align-items-center">
                                                    <span
                                                        class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                                        <img src="dist/images/svgs/icon-account.svg" alt=""
                                                            width="24" height="24">
                                                    </span>
                                                    <div class="w-75 d-inline-block v-middle ps-3">
                                                        <h6 class="mb-1 bg-hover-primary fw-semibold"> Security </h6>
                                                        <span class="d-block text-dark">Change Password</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                            <div class="d-grid py-4 px-7 pt-8">
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                    class="btn btn-outline-primary">Log Out</a>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <!-- Header End -->

            <div class="container-fluid">

                {{-- ALERT --}}
                {{-- @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif --}}

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif


                {{-- END ALERT --}}

                @yield('content')


            </div>
        </div>
        <div class="dark-transparent sidebartoggler"></div>
    </div>

    <!-- Search Bar -->

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Shopping Cart</h5>
            <span data-bs-dismiss="offcanvas" class="link-secondary cursor-pointer">
                <i class="feather-base ms-4" data-feather="x-circle"></i>
            </span>
        </div>
        <div class="offcanvas-body h-100" data-simplebar>
            <ul>
                <li class="pb-4 border-bottom">
                    <div class="d-flex align-items-center py-2">
                        <img src="dist/images/products/product-1.jpg" width="98" class="rounded-2 me-3"
                            alt="" />
                        <div>
                            <h6 class="fs-4 fw-normal mb-0">Supreme toys cooker</h6>
                            <p class="mb-0 text-muted fs-3">Kitchenware Item</p>
                            <div class="d-flex align-items-center mt-1">
                                <h6 class="fs-4 me-2 fw-normal mb-0">$250</h6>
                                <div class="input-group input-group-sm w-35">
                                    <button class="btn btn-light-success text-success rounded-1 minus" type="button"
                                        id="add1">
                                        -
                                    </button>
                                    <input type="text"
                                        class="form-control bg-transparent border-0 rounded-1 text-center qty"
                                        placeholder="" aria-label="Example text with button addon"
                                        aria-describedby="add1" value="1" />
                                    <button class="btn btn-light-success text-success rounded-1 add" type="button"
                                        id="addo2">
                                        +
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="py-4 border-bottom">
                    <div class="d-flex align-items-center py-2">
                        <img src="dist/images/products/product-2.jpg" width="98" class="rounded-2 me-3"
                            alt="" />
                        <div>
                            <h6 class="fs-4 fw-normal mb-0">Supreme toys cooker</h6>
                            <p class="mb-0 text-muted fs-3">Kitchenware Item</p>
                            <div class="d-flex align-items-center mt-1">
                                <h6 class="fs-4 me-2 fw-normal mb-0">$250</h6>
                                <div class="input-group input-group-sm w-35">
                                    <button class="btn btn-light-success text-success rounded-1 minus" type="button"
                                        id="add2">
                                        -
                                    </button>
                                    <input type="text"
                                        class="form-control bg-transparent border-0 rounded-1 text-center qty"
                                        placeholder="" aria-label="Example text with button addon"
                                        aria-describedby="add2" value="1" />
                                    <button class="btn btn-light-success text-success rounded-1 add" type="button"
                                        id="addon34">
                                        +
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="py-4 border-bottom">
                    <div class="d-flex align-items-center py-2">
                        <img src="dist/images/products/product-3.jpg" width="98" class="rounded-2 me-3"
                            alt="" />
                        <div>
                            <h6 class="fs-4 fw-normal mb-0">Supreme toys cooker</h6>
                            <p class="mb-0 text-muted fs-3">Kitchenware Item</p>
                            <div class="d-flex align-items-center mt-1">
                                <h6 class="fs-4 me-2 fw-normal mb-0">$250</h6>
                                <div class="input-group input-group-sm w-35">
                                    <button class="btn btn-light-success text-success rounded-1 minus" type="button"
                                        id="add3">
                                        -
                                    </button>
                                    <input type="text"
                                        class="form-control bg-transparent border-0 rounded-1 text-center qty"
                                        placeholder="" aria-label="Example text with button addon"
                                        aria-describedby="add3" value="1" />
                                    <button class="btn btn-light-success text-success rounded-1 add" type="button"
                                        id="addon3">
                                        +
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>

            <div class="align-bottom">
                <div class="d-flex align-items-center py-2">
                    <span class="text-muted fs-3">Sub Total</span>
                    <div class="ms-auto">
                        <span class="text-dark fw-normal fs-3">$2530</span>
                    </div>
                </div>
                <div class="d-flex align-items-center py-2">
                    <span class="text-muted fs-3">Total</span>
                    <div class="ms-auto">
                        <span class="text-dark fw-normal fs-3">$6830</span>
                    </div>
                </div>
                <a class="btn btn-primary text-white w-100 d-block" href="javascript:void(0);">
                    Place order
                </a>
            </div>
        </div>
    </div>

    <!-- Search Bar -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content rounded-1">
                <div class="modal-header border-bottom">
                    <input type="search" class="form-control fs-3" placeholder="Search here" id="search" />
                    <span data-bs-dismiss="modal" class="lh-1 cursor-pointer">
                        <i class="ti ti-x fs-5 ms-3"></i>
                    </span>
                </div>
                <div class="modal-body message-body" data-simplebar="">
                    <h5 class="mb-0 fs-5 p-1">Quick Page Links</h5>
                    <ul class="list mb-0 py-2">
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="#">
                                <span class="fs-3 text-black fw-normal d-block">Modern</span>
                                <span class="fs-3 text-muted d-block">/dashboards/dashboard1</span>
                            </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="#">
                                <span class="fs-3 text-black fw-normal d-block">Dashboard</span>
                                <span class="fs-3 text-muted d-block">/dashboards/dashboard2</span>
                            </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="#">
                                <span class="fs-3 text-black fw-normal d-block">Contacts</span>
                                <span class="fs-3 text-muted d-block">/apps/contacts</span>
                            </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="#">
                                <span class="fs-3 text-black fw-normal d-block">Posts</span>
                                <span class="fs-3 text-muted d-block">/apps/blog/posts</span>
                            </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="#">
                                <span class="fs-3 text-black fw-normal d-block">Detail</span>
                                <span
                                    class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
                            </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="#">
                                <span class="fs-3 text-black fw-normal d-block">Shop</span>
                                <span class="fs-3 text-muted d-block">/apps/ecommerce/shop</span>
                            </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="#">
                                <span class="fs-3 text-black fw-normal d-block">Modern</span>
                                <span class="fs-3 text-muted d-block">/dashboards/dashboard1</span>
                            </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="#">
                                <span class="fs-3 text-black fw-normal d-block">Dashboard</span>
                                <span class="fs-3 text-muted d-block">/dashboards/dashboard2</span>
                            </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="#">
                                <span class="fs-3 text-black fw-normal d-block">Contacts</span>
                                <span class="fs-3 text-muted d-block">/apps/contacts</span>
                            </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="#">
                                <span class="fs-3 text-black fw-normal d-block">Posts</span>
                                <span class="fs-3 text-muted d-block">/apps/blog/posts</span>
                            </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="#">
                                <span class="fs-3 text-black fw-normal d-block">Detail</span>
                                <span
                                    class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
                            </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="#">
                                <span class="fs-3 text-black fw-normal d-block">Shop</span>
                                <span class="fs-3 text-muted d-block">/apps/ecommerce/shop</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Customizer -->

    <!-- Import Js Files -->
    <script src="dist/libs/jquery/dist/jquery.min.js"></script>
    <script src="dist/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- core files -->
    <script src="dist/js/app.min.js"></script>
    <script src="dist/js/app.minisidebar.init.js"></script>
    <script src="dist/js/app.init.js"></script>
    <script src="dist/js/app-style-switcher.js"></script>
    <script src="dist/js/sidebarmenu.js"></script>
    <script src="dist/js/custom.js"></script>
    <script src="dist/libs/prismjs/prism.js"></script>
    <!-- current page js files -->
    <script src="dist/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="dist/js/dashboard2.js"></script>
    <script src="dist/libs/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="dist/js/forms/sweet-alert.init.js"></script>
    <!-- ---------------------------------------------- -->
    <!-- current page js files -->
    <!-- ---------------------------------------------- -->
    <script src="dist/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="dist/js/datatable/datatable-basic.init.js"></script>
    <script src="script.js"></script>
    <script>
        // 500 = 0,5 s
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
    @include('sweetalert::alert')
</body>

</html>
