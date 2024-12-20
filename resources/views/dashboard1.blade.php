@extends('layout_old')


@section('content')
    {{-- WELCOME --}}
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row d-flex align-items-center justify-content-between">
                <div class="col-lg-6 col-md-6 col-sm-6 d-block align-items-center mb-4 mb-sm-0">
                    <a href="#" class="text-nowrap logo-img text-center">
                        <img src="dist/images/logos/logo.png" width="180" alt="">
                    </a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 d-block align-items-center text-md-end">
                    <h4 class="fw-semibold mb-8">Welcome</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb float-md-end">
                            <li class="breadcrumb-item"><a class="text-muted">NIK</a></li>
                            <li class="breadcrumb-item" aria-current="page"></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-6">
                    <div class="text-center mb-n5">
                        <img src="dist/images/breadcrumb/in.png" alt="" class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- END WELCOME --}}

    {{-- APP --}}
    <section class="section-app">
        <div class="container py-4">
            <div class="row">
                <div class="col-6">
                    <a href="{{ route('incoming-mail.index') }}" class="card card-hover">
                        <div class="bg-primary rounded-5 text-white">
                            <div class="card-body2">
                                <div class="d-grid gap-2 align-items-center justify-content-center mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M13 9h5.5L13 3.5zM6 2h8l6 6v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4c0-1.11.89-2 2-2m1 18h2v-6H7zm4 0h2v-8h-2zm4 0h2v-4h-2z" />
                                    </svg>
                                </div>
                                <div class="text-center">
                                    <h4 class="mb-0 text-white">Incoming Mail</h4>
                                    <span class="mb-0 text-white">deskripsi</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6">
                    <a href="{{ route('outgoing-mail.index') }}" class="card card-hover">
                        <div class="bg-green rounded-5 text-white">
                            <div class="card-body2">
                                <div class="d-grid gap-2 align-items-center justify-content-center mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M13 9h5.5L13 3.5zM6 2h8l6 6v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4c0-1.11.89-2 2-2m1 18h2v-6H7zm4 0h2v-8h-2zm4 0h2v-4h-2z" />
                                    </svg>
                                </div>
                                <div class="text-center">
                                    <h4 class="mb-0 text-white">Outgoing Mail</h4>
                                    <span class="mb-0 text-white">deskripsi</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6">
                    <a href="{{ route('internal-memo.index') }}" class="card card-hover">
                        <div class="bg-red rounded-5 text-white">
                            <div class="card-body2">
                                <div class="d-grid gap-2 align-items-center justify-content-center mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M13 9h5.5L13 3.5zM6 2h8l6 6v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4c0-1.11.89-2 2-2m1 18h2v-6H7zm4 0h2v-8h-2zm4 0h2v-4h-2z" />
                                    </svg>
                                </div>
                                <div class="text-center">
                                    <h4 class="mb-0 text-white">Internal Memo</h4>
                                    <span class="mb-0 text-white">deskripsi</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6">
                    <a href="#" class="card card-hover">
                        <div class="bg-warning rounded-5 text-white">
                            <div class="card-body2">
                                <div class="d-grid gap-2 align-items-center justify-content-center mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M13 9h5.5L13 3.5zM6 2h8l6 6v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4c0-1.11.89-2 2-2m1 18h2v-6H7zm4 0h2v-8h-2zm4 0h2v-4h-2z" />
                                    </svg>
                                </div>
                                <div class="text-center">
                                    <h4 class="mb-0 text-white">Surat Perjanjian</h4>
                                    <span class="mb-0 text-white">deskripsi</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    {{-- END APP --}}
@endsection
