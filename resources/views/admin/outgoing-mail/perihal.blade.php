@extends('layout')

@section('content')
    <div class="container-fluid">

        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Master Admin</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted text-decoration-none"
                                        href="./">Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page">Outgoing Mail - Perihal</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="dist/images/breadcrumb/emailSv.png" alt="" class="img-fluid mb-n4">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row align-items-center mx-4">
            <div class="col-lg-10">
                <h4 style="display: flex; align-items: center;">Outgoing Mail - Perihal</h4>
            </div>
            <div class="col-lg-2">
                <a href="{{ route('admin.outgoing-mail.form2') }}"
                    class="justify-content-center btn mb-1 btn-rounded btn-dark d-flex align-items-center">
                    <i class="ti ti-plus fs-4 me-2"></i>Add New
                </a>
            </div>
        </div>

        <section class="datatables">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="scroll_hor" class="table border table-striped table-bordered display nowrap"
                                    style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Perihal</th>
                                            <th>Kode Perihal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($perihalList as $perihal)
                                            <tr>
                                                <td>{{ $perihal->perihal }}</td>
                                                <td>{{ $perihal->kode_perihal }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
