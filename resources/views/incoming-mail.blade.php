{{-- @extends('layout')

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
                                        href="./index.html">Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page">Incoming Mail</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="../../dist/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4 mx-4">
            <button id="btn-add-form" type="button"
                class="justify-content-center btn mb-1 btn-rounded btn-dark d-flex align-items-center">
                <i class="ti ti-plus fs-4 me-2"></i>Add New
            </button>
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
                                            <th>Nomor Surat</th>
                                            <th>Tujuan</th>
                                            <th>Perihal</th>
                                            <th>Nomor Dokumen</th>
                                            <th>Tanggal Dibuat</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($mails as $mail)
                                            <tr>
                                                <td>
                                                    <a
                                                        href="{{ route('incoming-mail.detail', ['ticket_number' => $mail->ticket_number]) }}">
                                                        {{ $mail->ticket_number }}
                                                    </a>
                                                </td>
                                                <td>{{ $mail->judul }}</td>
                                                <td>{{ $mail->nomor_surat }}</td>
                                                <td>{{ $mail->tujuan }}</td>
                                                <td>{{ $mail->perihal }}</td>
                                                <td>{{ $mail->document_number }}</td>
                                                <td>{{ $mail->created_at->format('d-m-Y H:i') }}</td>
                                                <td>
                                                    <span
                                                        class="badge fw-semibold fs-2
														{{ $mail->status === 'On Progress' ? 'bg-light-warning text-warning' : '' }}
														{{ $mail->status === 'Submitted' ? 'bg-light-primary text-primary' : '' }}
														{{ $mail->status === 'Closed' ? 'bg-light-dark text-dark' : '' }}">
                                                        {{ $mail->status }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center">Data tidak ditemukan</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="form-section" style="display: none;">
            <div class="row">
                <div class="col-sm-12">
                    <div>
                        <div class="card">
                            <div class="card-body">
                                <form class="needs-validation" method="POST" action="./incoming-mail"
                                    enctype="multipart/form-data" novalidate>
                                    @csrf
                                    <div class="mb-3 row">
                                        <label for="validationCustom01" class="col-md-2 col-form-label">Judul</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text" name="judul"
                                                id="validationCustom01" placeholder="Judul" required />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please provide a valid input.</div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="validationCustom02" class="col-md-2 col-form-label">Nomor
                                            Surat</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text" name="nomor_surat"
                                                id="validationCustom02" placeholder="Nomor Surat" required />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please provide a valid input.</div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="validationCustom03" class="col-md-2 col-form-label">Pengirim</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text" name="pengirim"
                                                id="validationCustom03" placeholder="Pengirim" required />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please provide a valid input.</div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="inlineFormCustomSelect" class="col-md-2 col-form-label">Perusahaan
                                            Dituju</label>
                                        <div class="col-md-10">
                                            <select class="form-select col-12" id="inlineFormCustomSelect" name="perusahaan"
                                                required>
                                                <option value="" selected>Choose...</option>
                                                <option value="KT">KT</option>
                                                <option value="JMP">JMP</option>
                                                <option value="TMI">TMI</option>
                                            </select>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please provide a valid input.</div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="inlineFormCustomSelect" class="col-md-2 col-form-label">Tujuan
                                            (DIV/DIR)</label>
                                        <div class="col-md-10">
                                            <select class="form-select col-12" id="inlineFormCustomSelect" name="tujuan"
                                                required>
                                                <option value="" selected>Choose...</option>
                                                <option value="MS">MS </option>
                                                <option value="LEG">LEG</option>
                                                <option value="CORSEC">CORSEC</option>
                                                <option value="ENG">ENG</option>
                                                <option value="SALES">SALES</option>
                                                <option value="PROC">PROC</option>
                                                <option value="FIN">FIN</option>
                                                <option value="CORP">CORP</option>
                                                <option value="HRD">HRD</option>
                                                <option value="SP">SP</option>
                                                <option value="IA">IA</option>
                                            </select>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please provide a valid input.</div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="validationCustom04" class="col-md-2 col-form-label">Perihal</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text" name="perihal"
                                                id="validationCustom04" placeholder="Perihal" required />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please provide a valid input.</div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="validationCustom05" class="col-md-2 col-form-label">Disposisi</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text" name="disposisi"
                                                id="validationCustom05" placeholder="Disposisi" required />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please provide a valid input.</div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-date-input" class="col-md-2 col-form-label">Tanggal
                                            Diterima</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="date" name="tanggal_diterima"
                                                id="example-date-input" required />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please provide a valid input.</div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-date-input" class="col-md-2 col-form-label">Tanggal
                                            Surat</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="date" name="tanggal_surat"
                                                id="example-date-input" required />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please provide a valid input.</div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="inlineFormCustomSelect" class="col-md-2 col-form-label">Confidential
                                            Criteria</label>
                                        <div class="col-md-10">
                                            <select class="form-select col-12" id="confidentialCriteria"
                                                name="confidential" required>
                                                <option value="" selected>Choose...</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please provide a valid input.</div>
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <div class="card-body border-top">
                                            <button type="submit" class="btn btn-success rounded-pill px-4"
                                                id="btn-save">
                                                <div class="d-flex align-items-center">
                                                    <i class="ti ti-device-floppy me-1 fs-4"></i>Save
                                                </div>
                                            </button>
                                            <button type="button"
                                                class="btn btn-danger rounded-pill px-4 ms-2 text-white"
                                                id="btn-cancel">Cancel</button>
                                        </div>
                                    </div>
                                </form>
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

    document.addEventListener("DOMContentLoaded", function() {
        const addButton = document.getElementById("btn-add-form");
        const formSection = document.getElementById("form-section");

        if (addButton && formSection) {
            addButton.addEventListener("click", function() {
                formSection.style.display = "block"; // Menampilkan form
            });

            const cancelButton = document.getElementById("btn-cancel");
            if (cancelButton) {
                cancelButton.addEventListener("click", function() {
                    formSection.style.display = "none"; // Menyembunyikan form
                });
            }
        }
    });
</script> --}}
