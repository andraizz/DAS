@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Incoming Mail</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted text-decoration-none"
                                        href="./">Dashboard</a></li>
                                <li class="breadcrumb-item"><a class="text-muted text-decoration-none"
                                        href="{{ route('incoming-mail.index') }}">On Going Document</a></li>
                                <li class="breadcrumb-item" aria-current="page">{{ $ticket->ticket_number }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="dist/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
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
                                    <div class="col-lg-2">
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
                                            <h6 class="control-label col-md-2">Judul</h6>
                                            <div class="col-10">
                                                <h6 class="form-control-static">: {{ $ticket->judul }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group row">
                                            <h6 class="control-label col-md-2">Nomor Surat</h6>
                                            <div class="col-10">
                                                <h6 class="form-control-static">: {{ $ticket->nomor_surat }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group row">
                                            <h6 class="control-label col-md-2">Pengirim</h6>
                                            <div class="col-10">
                                                <h6 class="form-control-static">: {{ $ticket->pengirim }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group row">
                                            <h6 class="control-label col-md-2">Perusahaan</h6>
                                            <div class="col-10">
                                                <h6 class="form-control-static">: {{ $ticket->perusahaan }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group row">
                                            <h6 class="control-label col-md-2">Tujuan</h6>
                                            <div class="col-10">
                                                <h6 class="form-control-static">: {{ $ticket->tujuan }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group row">
                                            <h6 class="control-label col-md-2">Perihal</h6>
                                            <div class="col-10">
                                                <h6 class="form-control-static">: {{ $ticket->perihal }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group row">
                                            <h6 class="control-label col-md-2">Disposisi</h6>
                                            <div class="col-10">
                                                <h6 class="form-control-static">: {{ $ticket->disposisi }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group row">
                                            <h6 class="control-label col-md-2">Tanggal Diterima</h6>
                                            <div class="col-10">
                                                <h6 class="form-control-static">: {{ $ticket->tanggal_diterima }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group row">
                                            <h6 class="control-label col-md-2">Tanggal Surat</h6>
                                            <div class="col-10">
                                                <h6 class="form-control-static">: {{ $ticket->tanggal_surat }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group row">
                                            <h6 class="control-label col-md-2">Confidential Criteria</h6>
                                            <div class="col-10">
                                                <h6 class="form-control-static">: {{ $ticket->confidential }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group row">
                                            <h6 class="control-label col-md-2">Nomor Dokumen</h6>
                                            <div class="col-10">
                                                <h6 class="form-control-static">: {{ $ticket->document_number }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group row">
                                            <h6 class="control-label col-md-2">Tanggal Dibuat</h6>
                                            <div class="col-10">
                                                <h6 class="form-control-static">: {{ $ticket->created_at }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group row">
                                            <h6 class="control-label col-md-2">File</h6>
                                            <div class="col-10">
                                                @if ($ticket->file_path && Storage::exists('public/' . $ticket->file_path))
                                                    <h6 class="form-control-static">
                                                        : <a href="{{ asset('storage/' . $ticket->file_path) }}"
                                                            target="_blank">Lihat File</a>
                                                    </h6>
                                                @else
                                                    <h6 class="form-control-static">: -</h6>
                                                @endif
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
                                                action="{{ route('incoming-mail.upload', ['ticket_number' => $ticket->ticket_number]) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group mb-3">
                                                    <label for="file" class="form-label">File
                                                        ({{ $ticket->confidential == 'No' ? 'Required' : 'Optional' }})</label>
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
