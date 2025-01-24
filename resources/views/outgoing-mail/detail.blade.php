@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Outgoing Document</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted text-decoration-none"
                                        href="./">Dashboard</a></li>
                                <li class="breadcrumb-item"><a class="text-muted text-decoration-none"
                                        href="{{ route('outgoing-mail.index') }}">On Going Document</a></li>
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
                                                Judul</h6>
                                            <div class="col-9">
                                                <div class="bg-grey p-2">
                                                    <h6 class="form-control-static mb-0">{{ $ticket->judul }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group row">
                                            <h6 class="control-label col-md-3 mb-0 d-flex align-items-center fw-bolder">
                                                Perusahaan Pengirim</h6>
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
                                                Tujuan</h6>
                                            <div class="col-9">
                                                <div class="bg-grey p-2">
                                                    <h6 class="form-control-static mb-0">{{ $ticket->tujuan }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group row">
                                            <h6 class="control-label col-md-3 mb-0 d-flex align-items-center fw-bolder">
                                                Penandatangan</h6>
                                            <div class="col-9">
                                                <div class="bg-grey p-2">
                                                    <h6 class="form-control-static mb-0">{{ $ticket->penandatangan }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group row">
                                            <h6 class="control-label col-md-3 mb-0 d-flex align-items-center fw-bolder">
                                                Divisi / Direktorat</h6>
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
                                                Perihal</h6>
                                            <div class="col-9">
                                                <div class="bg-grey p-2">
                                                    <h6 class="form-control-static mb-0">{{ $ticket->perihal }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if (Auth::user()->divisi == 'Finance & Accounting')
                                        <div class="col-lg-12 mb-2">
                                            <div class="form-group row">
                                                <h6 class="control-label col-md-3 mb-0 d-flex align-items-center fw-bolder">
                                                    No. Invoice</h6>
                                                <div class="col-9">
                                                    <div class="bg-grey p-2">
                                                        <h6 class="form-control-static mb-0">{{ $ticket->invoice }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group row">
                                            <h6 class="control-label col-md-3 mb-0 d-flex align-items-center fw-bolder">
                                                Tanggal Dikirim</h6>
                                            <div class="col-9">
                                                <div class="bg-grey p-2">
                                                    <h6 class="form-control-static mb-0">{{ $ticket->tanggal_dikirim }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group row">
                                            <h6 class="control-label col-md-3 mb-0 d-flex align-items-center fw-bolder">
                                                Tanggal Surat</h6>
                                            <div class="col-9">
                                                <div class="bg-grey p-2">
                                                    <h6 class="form-control-static mb-0">{{ $ticket->tanggal_surat }}</h6>
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
                                                Tanggal Tiket Dibuat</h6>
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
                                                        <h6 class="form-control-static mb-0">{{ $ticket->updated_at }}
                                                        </h6>
                                                    @else
                                                        <h6 class="form-control-static mb-0">-</h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group row">
                                            <h6 class="control-label col-md-3 mb-0 d-flex align-items-center fw-bolder">
                                                File</h6>
                                            <div class="col-9">
                                                <div class="bg-grey p-2">
                                                    @if ($ticket->file_path && Storage::exists('public/' . $ticket->file_path))
                                                        <h6 class="form-control-static mb-0">
                                                            <a href="{{ 'https://das.triasmitra.com/storage/app/public/' . $ticket->file_path }}"
                                                                target="_blank">Lihat File</a>
                                                        </h6>
                                                    @else
                                                        <h6 class="form-control-static mb-0">-</h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($daysLate > 0)
                                        <div class="col-lg-12 mb-2">
                                            <p class="text-danger">
                                                Anda terlambat {{ $daysLate }} hari untuk upload file
                                            </p>
                                        </div>
                                    @endif
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h4 class="mb-3">Upload File</h4>
                                        @if (
                                            $ticket->status !== 'Closed' ||
                                                (Auth::user()->divisi === 'Finance & Accounting' && $ticket->status === 'Closed' && !$ticket->is_final))
                                            <form
                                                action="{{ route('outgoing-mail.upload', ['ticket_number' => $ticket->ticket_number]) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <!-- Input Tanggal Dikirim -->
                                                <div class="form-group mb-3">
                                                    <label for="tanggal_surat" class="form-label">Tanggal
                                                        Surat</label>
                                                    <input type="date" name="tanggal_surat" id="tanggal_surat"
                                                        class="form-control" value="{{ $ticket->tanggal_surat }}"
                                                        required>
                                                    <small id="textHelp" class="form-text text-dark">Perbarui
                                                        tanggal surat jika diperlukan</small>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="tanggal_dikirim" class="form-label">Tanggal
                                                        Dikirim</label>
                                                    <input type="date" name="tanggal_dikirim" id="tanggal_dikirim"
                                                        class="form-control" value="{{ $ticket->tanggal_dikirim }}"
                                                        required>
                                                    <small id="textHelp" class="form-text text-dark">Perbarui
                                                        tanggal dikirim jika diperlukan</small>
                                                </div>
                                                <!-- Input File -->
                                                <div class="form-group mb-3">
                                                    <label for="file" class="form-label">File
                                                        ({{ $ticket->confidential == 'No' ? 'Required' : 'Optional' }})</label>
                                                    <small id="textHelp" class="form-text text-danger">Max upload
                                                        2MB</small>
                                                    <input type="file" name="file" class="form-control"
                                                        {{ $ticket->confidential == 'No' ? 'required' : '' }}>
                                                    <small id="textHelp" class="form-text text-dark">PDF
                                                        only</small>
                                                </div>
                                                <!-- Checkbox Final -->
                                                <div class="form-group mb-3">
                                                    <label for="is_final" class="form-label">Apakah sudah final?</label>
                                                    <input type="checkbox" name="is_final" id="is_final"
                                                        value="1">
                                                    <small id="textHelp" class="form-text text-dark">Centang jika file
                                                        ini sudah final</small>
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
