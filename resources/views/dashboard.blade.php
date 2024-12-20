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
    {{-- penting --}}
    <base href="{{ url('/') }}/">


    <!-- Favicon -->

    <link rel="shortcut icon" type="image/png" href="dist/images/logos/icon.png" />


    <!-- Owl Carousel -->

    <link rel="stylesheet" href="dist/libs/owl.carousel/dist/assets/owl.carousel.min.css">


    <!-- Core Css -->

    <link rel="stylesheet" href="{{ asset('dist/css/style.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/css/custom.css') }}" />
    <link href="dist/css/main.css" rel="stylesheet">
</head>

<body>

    <main class="main">
        <section id="hero" class="hero section accent-background">

            <div class="container position-relative d-flex  align-items-center justify-content-between p-0"
                style="margin-bottom: 80px;">
                <a href="#" class="logo d-flex align-items-center">
                    <img src="dist/images/logos/logo.png" width="180" alt="">
                </a>
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                    <a style="font-size:1rem; margin-right: 20px;">{{ Auth::user()->nama }}</a>
                    <li class="nav-item dropdown">
                        <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="user-profile-img">
                                    {{-- <img src="dist/images/profile/user-1.jpg" class="rounded-circle" width="35"
                                        height="35" alt=""> --}}
                                    <img src="{{ Auth::user()->foto ? asset('dist/images/foto/' . Auth::user()->foto) : asset('dist/images/logos/user.png') }}"
                                        class="rounded-circle" width="35" height="35"
                                        alt="User Profile Picture" />
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu content-dd" aria-labelledby="drop1" style="width: 100px">
                            {{-- <li>
                                <a class="dropdown-item" href="#">
                                    <i class="bi bi-person-circle"></i> Profile
                                </a>
                            </li> --}}
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <div class="d-grid py-2 px-3">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="btn btn-outline-primary">Log Out</a>
                            </div>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-5 justify-content-between">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        {{-- <h5>Welcome, <span class="typewriter">{{ Auth::user()->nama }}</span></h5> --}}
                        <h4 style="font-size: 26px;">Welcome, <span id="typewriter" class="font-consolas"
                                data-user="{{ Auth::user()->nama }}"></span></h4>
                        <p>{{ Auth::user()->nik }}</p>
                        <h2>Digital Archiving System</h2>
                        <h5 style="line-height: 1.5em; color: #ddd;">Kelola arsip Anda dengan mudah, cepat, dan aman.
                            Digitalisasi
                            dokumen kini lebih praktis dan
                            efisien!</h5>
                    </div>
                    <div class="col-lg-5 order-1 order-lg-2">
                        <img src="dist/images/documents-cuate.svg" class="img-fluid" alt="">
                    </div>
                </div>
            </div>

            <div class="icon-boxes position-relative" data-aos="fade-up" data-aos-delay="200">
                <div class="container position-relative">
                    <div class="row gy-4 mt-5">

                        <div class="col-xl-3 col-md-6">
                            <a class="card1" href="{{ route('incoming-mail.index') }}">
                                <div class="icon">
                                    <svg width="55" height="55" viewBox="0 0 55 55" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M39.875 30.25C43.5325 30.25 46.8875 28.952 49.5 26.7933V39.875C49.5 41.6984 48.7757 43.447 47.4864 44.7364C46.197 46.0257 44.4484 46.75 42.625 46.75H12.375C10.5516 46.75 8.80295 46.0257 7.51364 44.7364C6.22433 43.447 5.5 41.6984 5.5 39.875V20.2758L26.8042 32.8102C27.0155 32.9345 27.2562 33.0001 27.5014 33.0001C27.7465 33.0001 27.9872 32.9345 28.1985 32.8102L34.331 29.2023C36.0969 29.8961 37.9776 30.2516 39.875 30.25ZM12.375 11H25.3192C24.4476 14.0757 24.573 17.3484 25.6772 20.3484C26.7815 23.3484 28.8079 25.9214 31.4655 27.698L27.5 30.03L5.54125 17.1133C5.72869 15.432 6.52939 13.8789 7.79019 12.751C9.05098 11.6232 10.6833 10.9997 12.375 11ZM39.875 27.5C43.1571 27.5 46.3047 26.1962 48.6254 23.8754C50.9462 21.5547 52.25 18.4071 52.25 15.125C52.25 11.8429 50.9462 8.69532 48.6254 6.37455C46.3047 4.05379 43.1571 2.75 39.875 2.75C36.5929 2.75 33.4453 4.05379 31.1246 6.37455C28.8038 8.69532 27.5 11.8429 27.5 15.125C27.5 18.4071 28.8038 21.5547 31.1246 23.8754C33.4453 26.1962 36.5929 27.5 39.875 27.5ZM33.4015 16.0985C33.2737 15.9707 33.1722 15.8189 33.1031 15.6519C33.0339 15.4848 32.9983 15.3058 32.9983 15.125C32.9983 14.9442 33.0339 14.7652 33.1031 14.5981C33.1722 14.4311 33.2737 14.2793 33.4015 14.1515C33.6597 13.8933 34.0099 13.7483 34.375 13.7483C34.5558 13.7483 34.7348 13.7839 34.9019 13.8531C35.0689 13.9222 35.2207 14.0237 35.3485 14.1515L38.5 17.3058V9.625C38.5 9.26033 38.6449 8.91059 38.9027 8.65273C39.1606 8.39487 39.5103 8.25 39.875 8.25C40.2397 8.25 40.5894 8.39487 40.8473 8.65273C41.1051 8.91059 41.25 9.26033 41.25 9.625V17.3058L44.4015 14.1515C44.6597 13.8933 45.0099 13.7483 45.375 13.7483C45.7401 13.7483 46.0903 13.8933 46.3485 14.1515C46.6067 14.4097 46.7517 14.7599 46.7517 15.125C46.7517 15.4901 46.6067 15.8403 46.3485 16.0985L40.8485 21.5985C40.5922 21.8542 40.2453 21.9985 39.8833 22H39.8667C39.5083 21.9978 39.1649 21.8557 38.9098 21.604L38.9015 21.5958L33.4015 16.0985Z"
                                            fill="currentColor" />
                                    </svg>
                                </div>
                                <h4 class="title">Incoming Mail</h4>
                                <div class="go-corner" href="#">
                                    <div class="go-arrow">→</div>
                                </div>
                            </a>
                        </div><!--End Icon Box -->

                        <div class="col-xl-3 col-md-6">
                            <a class="card1" href="{{ route('outgoing-mail.index') }}">
                                <div class="icon">
                                    <svg width="55" height="55" viewBox="0 0 55 55" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M52.7083 14.8958C52.7083 18.2387 51.3804 21.4446 49.0166 23.8083C46.6529 26.1721 43.447 27.5 40.1041 27.5C36.7613 27.5 33.5554 26.1721 31.1917 23.8083C28.8279 21.4446 27.5 18.2387 27.5 14.8958C27.5 11.553 28.8279 8.34708 31.1917 5.98334C33.5554 3.6196 36.7613 2.29167 40.1041 2.29167C43.447 2.29167 46.6529 3.6196 49.0166 5.98334C51.3804 8.34708 52.7083 11.553 52.7083 14.8958ZM38.9583 10.7869V21.7708C38.9583 22.0747 39.079 22.3662 39.2939 22.5811C39.5088 22.7959 39.8003 22.9167 40.1041 22.9167C40.408 22.9167 40.6995 22.7959 40.9144 22.5811C41.1293 22.3662 41.25 22.0747 41.25 21.7708V10.7869L45.0221 14.5612C45.2372 14.7764 45.529 14.8973 45.8333 14.8973C46.1376 14.8973 46.4294 14.7764 46.6446 14.5612C46.8597 14.3461 46.9806 14.0543 46.9806 13.75C46.9806 13.4457 46.8597 13.1539 46.6446 12.9387L40.9154 7.20958C40.809 7.10288 40.6825 7.01821 40.5433 6.96045C40.4041 6.90269 40.2549 6.87295 40.1041 6.87295C39.9534 6.87295 39.8042 6.90269 39.665 6.96045C39.5258 7.01821 39.3993 7.10288 39.2929 7.20958L33.5637 12.9387C33.4572 13.0453 33.3727 13.1718 33.315 13.311C33.2574 13.4501 33.2277 13.5993 33.2277 13.75C33.2277 13.9007 33.2574 14.0499 33.315 14.189C33.3727 14.3282 33.4572 14.4547 33.5637 14.5612C33.7789 14.7764 34.0707 14.8973 34.375 14.8973C34.5256 14.8973 34.6748 14.8676 34.814 14.8099C34.9532 14.7523 35.0797 14.6678 35.1862 14.5612L38.9583 10.7869ZM40.1041 29.7917C43.949 29.7962 47.6457 28.3093 50.4166 25.6437V38.3854C50.4168 40.2878 49.6889 42.1182 48.3824 43.5009C47.0759 44.8837 45.2897 45.7142 43.3904 45.8219L42.9687 45.8333H12.0312C10.1288 45.8335 8.2985 45.1056 6.9157 43.7991C5.5329 42.4926 4.70248 40.7064 4.59477 38.8071L4.58331 38.3854V19.7267L26.7025 31.3133C26.9486 31.4422 27.2222 31.5096 27.5 31.5096C27.7778 31.5096 28.0514 31.4422 28.2975 31.3133L33.8364 28.4121C35.8006 29.3219 37.9395 29.7927 40.1041 29.7917ZM12.0312 9.16667H26.3496C25.5947 10.9823 25.2069 12.9295 25.2083 14.8958C25.2083 19.4631 27.2639 23.5492 30.4975 26.2808L27.5 27.8506L4.61998 15.8652C4.79815 14.1018 5.59937 12.4596 6.87968 11.2339C8.15998 10.0082 9.83544 9.27931 11.605 9.17812L12.0312 9.16667Z"
                                            fill="currentColor" />
                                    </svg>
                                </div>
                                <h4 class="title">Outgoing Mail</h4>
                                <div class="go-corner" href="#">
                                    <div class="go-arrow">→</div>
                                </div>
                            </a>
                        </div><!--End Icon Box -->

                        <div class="col-xl-3 col-md-6">
                            <a class="card1" href="{{ route('internal-memo.index') }}">
                                <div class="icon">
                                    <svg width="55" height="55" viewBox="0 0 55 55" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M43.5417 6.875H11.4354C8.91458 6.875 6.875 8.9375 6.875 11.4583L6.89792 43.5417C6.89792 46.0625 8.9375 48.125 11.4583 48.125H34.375L48.125 34.375V11.4583C48.125 8.9375 46.0625 6.875 43.5417 6.875ZM18.3333 18.3333H36.6667C37.9271 18.3333 38.9583 19.3646 38.9583 20.625C38.9583 21.8854 37.9271 22.9167 36.6667 22.9167H18.3333C17.0729 22.9167 16.0417 21.8854 16.0417 20.625C16.0417 19.3646 17.0729 18.3333 18.3333 18.3333ZM25.2083 32.0833H18.3333C17.0729 32.0833 16.0417 31.0521 16.0417 29.7917C16.0417 28.5312 17.0729 27.5 18.3333 27.5H25.2083C26.4688 27.5 27.5 28.5312 27.5 29.7917C27.5 31.0521 26.4688 32.0833 25.2083 32.0833ZM32.0833 44.6875V34.375C32.0833 33.1146 33.1146 32.0833 34.375 32.0833H44.6875L32.0833 44.6875Z"
                                            fill="currentColor" />
                                    </svg>
                                </div>
                                <h4 class="title">Internal Memo</h4>
                                <div class="go-corner" href="#">
                                    <div class="go-arrow">→</div>
                                </div>
                            </a>
                        </div><!--End Icon Box -->

                        <div class="col-xl-3 col-md-6">
                            <a class="card1" href="{{ route('surat-perjanjian.index') }}">
                                <div class="icon">
                                    <svg width="55" height="55" viewBox="0 0 55 55" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.75 4.58333C11.2062 4.58333 9.16663 6.62292 9.16663 9.16667V45.8333C9.16663 47.0489 9.64951 48.2147 10.5091 49.0742C11.3686 49.9338 12.5344 50.4167 13.75 50.4167H22.9166V46.0396L27.7062 41.25H13.75V36.6667H32.2895L36.8729 32.0833H13.75V27.5H41.4562L45.8333 23.1229V18.3333L32.0833 4.58333H13.75ZM29.7916 8.02083L42.3958 20.625H29.7916V8.02083ZM46.177 29.7917C46.0074 29.7879 45.8388 29.8185 45.6813 29.8815C45.5238 29.9445 45.3806 30.0387 45.2604 30.1583L42.9229 32.4958L47.7125 37.2625L50.05 34.9479C50.5312 34.4437 50.5312 33.6187 50.05 33.1375L47.0708 30.1583C46.954 30.0404 46.8147 29.9472 46.6612 29.8842C46.5076 29.8212 46.343 29.7897 46.177 29.7917ZM41.5708 33.8479L27.5 47.9417V52.7083H32.2666L46.3604 38.6146L41.5708 33.8479Z"
                                            fill="currentColor" />
                                    </svg>
                                </div>
                                <h4 class="title">Surat Perjanjian</h4>
                                <div class="go-corner" href="#">
                                    <div class="go-arrow">→</div>
                                </div>
                            </a>
                        </div><!--End Icon Box -->

                        {{-- Backup --}}
                        {{-- <div class="col-xl-3 col-md-6">
                            <div class="icon-box">
                                <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="55"
                                        height="55" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M13 9h5.5L13 3.5zM6 2h8l6 6v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4c0-1.11.89-2 2-2m1 18h2v-6H7zm4 0h2v-8h-2zm4 0h2v-4h-2z" />
                                    </svg></div>
                                <h4 class="title"><a href="{{ route('surat-perjanjian.index') }}"
                                        class="stretched-link">Surat Perjanjian</a>
                                </h4>
                            </div>
                        </div><!--End Icon Box --> --}}

                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->
    </main>

    <!-- Import Js Files -->
    <script src="dist/libs/jquery/dist/jquery.min.js"></script>
    <script src="dist/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- core files -->
    <script src="dist/js/app.min.js"></script>
    {{-- <script src="dist/js/app.minisidebar.init.js"></script> --}}
    <script src="dist/js/app.init.js"></script>
    <script src="dist/js/app-style-switcher.js"></script>
    <script src="dist/js/sidebarmenu.js"></script>
    <script src="dist/js/custom.js"></script>
    <script src="dist/js/main.js"></script>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Event untuk logout
            document.getElementById('logoutLink').addEventListener('click', function(e) {
                e.preventDefault();
                if (confirm('Apakah Anda yakin ingin logout?')) {
                    // Redirect atau aksi logout di sini
                    window.location.href = 'logout.html'; // Ganti sesuai route logout Anda
                }
            });
        });
    </script>
    <script>
        const typewriterElement = document.getElementById("typewriter");
        const userName = typewriterElement.getAttribute("data-user"); // Ambil nama dari data-user

        const text = `${userName}!`;
        let index = 0;
        let isDeleting = false;

        function typeWriter() {
            if (isDeleting) {
                typewriterElement.textContent = text.substring(0, index--);
            } else {
                typewriterElement.textContent = text.substring(0, index++);
            }

            let speed = isDeleting ? 50 : 100;

            if (index === text.length) {
                isDeleting = true;
                speed = 1000; // Jeda sebelum menghapus
            }

            if (index === 0) {
                isDeleting = false;
                speed = 500; // Jeda sebelum mengetik ulang
            }

            setTimeout(typeWriter, speed);
        }

        typeWriter();
    </script>
    @include('sweetalert::alert')
</body>

</html>
