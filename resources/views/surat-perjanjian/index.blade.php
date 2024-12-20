@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Surat Perjanjian</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted text-decoration-none"
                                        href="./">Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page">On Going Document</li>
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

        <div class="row align-items-center mx-4">
            <div class="col-lg-10">
                <h4 style="display: flex; align-items: center;">On Going Ticket</h4>
            </div>
            <div class="col-lg-2">
                <a href="{{ route('surat-perjanjian.form') }}"
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
                                            <th>Tiket</th>
                                            <th>Judul</th>
                                            <th>Tujuan</th>
                                            <th>Perihal</th>
                                            <th>Nomor Dokumen</th>
                                            <th>Tanggal Dibuat</th>
                                            <th>Tanggal Berakhir</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($mails as $mail)
                                            <tr>
                                                <td>
                                                    <a
                                                        href="{{ route('surat-perjanjian.detail', ['ticket_number' => $mail->ticket_number]) }}">
                                                        {{ $mail->ticket_number }}
                                                    </a>
                                                </td>
                                                <td>{{ $mail->judul }}</td>
                                                <td>{{ $mail->tujuan }}</td>
                                                <td>{{ $mail->perihal }}</td>
                                                <td>{{ $mail->document_number }}</td>
                                                <td>{{ $mail->created_at->format('d-m-Y H:i') }}</td>
                                                <td>
                                                    @if ($mail->is_closed)
                                                        <!-- Tampilkan ceklis atau tanda tertentu jika status closed -->
                                                        <span class="check-icon">✔️</span>
                                                    @else
                                                        @if ($mail->remaining_days > 0)
                                                            <span
                                                                class="badge bg-warning fs-2 rounded-3 gap-1 d-inline-flex align-items-center"><i
                                                                    class="ti ti-clock-hour-4 fs-3"></i>{{ $mail->remaining_days }}
                                                                hari</span>
                                                        @elseif ($mail->remaining_days === 0)
                                                            <span
                                                                class="badge bg-danger fs-2 rounded-3 gap-1 d-inline-flex align-items-center"><i
                                                                    class="ti ti-clock-hour-4 fs-3"></i>{{ $mail->remaining_days }}
                                                                hari</span>
                                                        @else
                                                            <span
                                                                class="badge bg-secondary fs-2 rounded-3 gap-1 d-inline-flex align-items-center"><i
                                                                    class="ti ti-clock-hour-4 fs-3"></i>{{ $mail->remaining_days }}
                                                                hari</span>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge fw-semibold fs-2 rounded-3
														{{ $mail->status === 'Submitted' ? 'bg-primary text-white' : '' }}
														{{ $mail->status === 'Closed' ? 'bg-muted text-white' : '' }}">
                                                        {{ $mail->status }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse
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

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        "use strict";
        window.addEventListener(
            "load",
            function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName("needs-validation");
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(
                    forms,
                    function(form) {
                        form.addEventListener(
                            "submit",
                            function(event) {
                                if (form.checkValidity() === false) {
                                    event.preventDefault();
                                    event.stopPropagation();
                                }
                                form.classList.add("was-validated");
                            },
                            false
                        );
                    }
                );
            },
            false
        );
    })();
</script>
