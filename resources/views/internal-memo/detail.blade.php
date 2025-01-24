@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Internal Memo</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted text-decoration-none"
                                        href="./">Dashboard</a></li>
                                <li class="breadcrumb-item"><a class="text-muted text-decoration-none"
                                        href="{{ route('internal-memo.index') }}">On Going Document</a></li>
                                <li class="breadcrumb-item" aria-current="page">{{ $ticket->ticket_number }}</li>
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

        <section>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h5 class="mb-0 text-white">Detail Tiket</h5>
                        </div>
                        <div class="form-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <h5 class="card-title mb-0">{{ $ticket->ticket_number }}</h5>
                                    </div>
                                    <div class="col-lg-2">
                                        <span
                                            class="badge fw-semibold fs-2 rounded-3
														{{ $ticket->status === 'Submitted' ? 'bg-light-primary text-primary' : '' }}
														{{ $ticket->status === 'Closed' ? 'bg-light-dark text-dark' : '' }}">
                                            {{ $ticket->status }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-0" />
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group row">
                                            <h6 class="control-label col-md-3 mb-0 d-flex align-items-center fw-bolder">
                                                Perusahaan</h6>
                                            <div class="col-9">
                                                <div class="bg-grey p-2">
                                                    <h6 class="form-control-static mb-0">{{ $ticket->perusahaan }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group row">
                                            <h6 class="control-label col-md-3 mb-0 d-flex align-items-center fw-bolder">
                                                Divisi</h6>
                                            <div class="col-9">
                                                <div class="bg-grey p-2">
                                                    <h6 class="form-control-static mb-0">{{ $ticket->divisi }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group row">
                                            <h6 class="control-label col-md-3 mb-0 d-flex align-items-center fw-bolder">
                                                Project</h6>
                                            <div class="col-9">
                                                <div class="bg-grey p-2">
                                                    <h6 class="form-control-static mb-0">{{ $ticket->project }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group row">
                                            <h6 class="control-label col-md-3 mb-0 d-flex align-items-center fw-bolder">
                                                Perihal</h6>
                                            <div class="col-9">
                                                <div class="bg-grey p-2">
                                                    <h6 class="form-control-static mb-0">{{ $ticket->perihal }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group row">
                                            <h6 class="control-label col-md-3 mb-0 d-flex align-items-center fw-bolder">
                                                Tanggal Memo</h6>
                                            <div class="col-9">
                                                <div class="bg-grey p-2">
                                                    <h6 class="form-control-static mb-0">{{ $ticket->tanggal_memo }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group row">
                                            <h6 class="control-label col-md-3 mb-0 d-flex align-items-center fw-bolder">
                                                Confidential Criteria</h6>
                                            <div class="col-9">
                                                <div class="bg-grey p-2">
                                                    <h6 class="form-control-static mb-0">{{ $ticket->confidential }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group row">
                                            <h6 class="control-label col-md-3 mb-0 d-flex align-items-center fw-bolder">
                                                Nomor Dokumen</h6>
                                            <div class="col-9">
                                                <div class="bg-grey p-2">
                                                    <h6 class="form-control-static mb-0">{{ $ticket->document_number }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group row">
                                            <h6 class="control-label col-md-3 mb-0 d-flex align-items-center fw-bolder">
                                                Tanggal Dibuat</h6>
                                            <div class="col-9">
                                                <div class="bg-grey p-2">
                                                    <h6 class="form-control-static mb-0">{{ $ticket->created_at }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group row">
                                            <h6 class="control-label col-md-3 mb-0 d-flex align-items-center fw-bolder">
                                                Tanggal Tiket Ditutup</h6>
                                            <div class="col-9">
                                                <div class="bg-grey p-2">
                                                    @if ($ticket->status === 'Closed')
                                                        <h6 class="form-control-static mb-0">{{ $ticket->updated_at }}</h6>
                                                    @else
                                                        <h6 class="form-control-static mb-0">-</h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group row">
                                            <h6 class="control-label col-md-3 mb-0 d-flex align-items-center fw-bolder">File
                                            </h6>
                                            <div class="col-9">
                                                <div class="bg-grey p-2">
                                                    @if ($ticket->file_path && Storage::exists('public/' . $ticket->file_path))
                                                        <h6 class="form-control-static">
                                                            : <a href="{{ asset('storage/' . $ticket->file_path) }}"
                                                                target="_blank">Lihat File</a>
                                                        </h6>
                                                    @else
                                                        <h6 class="form-control-static mb-0">-</h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h4 class="mb-3">Upload File</h4>
                                        @if ($ticket->status !== 'Closed')
                                            <form
                                                action="{{ route('internal-memo.upload', ['ticket_number' => $ticket->ticket_number]) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group mb-3">
                                                    <label for="file" class="form-label">File
                                                        ({{ $ticket->confidential == 'No' ? 'Required' : 'Optional' }})</label>
                                                    <small id="textHelp" class="form-text text-danger">Max upload
                                                        2MB</small>
                                                    <input type="file" name="file" class="form-control"
                                                        {{ $ticket->confidential == 'No' ? 'required' : '' }}>
                                                    <small id="textHelp" class="form-text text-muted">PDF only</small>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        @else
                                            <p class="text-danger">Tiket ini telah ditutup. Tidak dapat mengunggah file.
                                            </p>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
