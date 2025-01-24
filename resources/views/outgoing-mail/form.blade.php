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
                                <li class="breadcrumb-item" aria-current="page">Form</li>
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

        <section id="form-section">
            <div class="row">
                <div class="col-sm-12">
                    <div>
                        <div class="card">
                            <div class="card-body">
                                <form class="needs-validation" method="POST" action="{{ route('outgoing-mail.store') }}"
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
                                        <label for="inlineFormCustomSelect" class="col-md-2 col-form-label">Perusahaan
                                            Pengirim</label>
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
                                        <label for="inlineFormCustomSelect" class="col-md-2 col-form-label">Tujuan</label>
                                        <div class="col-md-10">
                                            <select class="select2 form-control col-12" style="width: 100%; height: 36px;"
                                                id="tujuanSk" name="tujuan" required>
                                                <option value="" selected>Choose...</option>
                                                @foreach ($tujuanList as $tujuan)
                                                    <option value="{{ $tujuan->tujuan }}"
                                                        data-kode="{{ $tujuan->kode_tujuan }}">
                                                        {{ $tujuan->tujuan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please provide a valid input.</div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="inlineFormCustomSelect"
                                            class="col-md-2 col-form-label">Penandatangan</label>
                                        <div class="col-md-10">
                                            <select class="form-select col-12" id="inlineFormCustomSelect"
                                                name="penandatangan" required>
                                                <option value="" selected>Choose...</option>
                                                <option value="KOM">KOM</option>
                                                <option value="DIR">DIR</option>
                                                <option value="GM">GM</option>
                                                <option value="MGR">MGR</option>
                                            </select>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please provide a valid input.</div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="inlineFormCustomSelect" class="col-md-2 col-form-label">Divisi /
                                            Direktorat</label>
                                        <div class="col-md-10">
                                            <select class="form-select col-12" id="inlineFormCustomSelect" name="divisi"
                                                required>
                                                <option value="" selected>Choose...</option>
                                                <option value="MS">MS </option>
                                                <option value="CORSEC">CORSEC</option>
                                                <option value="ENG">ENG</option>
                                                <option value="SALES">SALES</option>
                                                <option value="PROC">PROC</option>
                                                <option value="FIN">FIN</option>
                                                <option value="CORP">CORP</option>
                                                <option value="HRD">HRD</option>
                                                <option value="SP">SP</option>
                                                <option value="IA">IA</option>
                                                @if (Auth::user()->nik == 'KT-25010503')
                                                    <option value="BETARI">BETARI</option>
                                                @endif
                                                @if (Auth::user()->nik == 'KT-22071206')
                                                    <option value="ACC">ACC</option>
                                                @endif
                                                @if (Auth::user()->nik == 'KT-23111401')
                                                    <option value="SITAC">SITAC</option>
                                                @endif
                                                @if (Auth::user()->nik == 'KT-19100823')
                                                    <option value="LEG">LEG</option>
                                                @endif
                                                @if (Auth::user()->nik == 'KT-23051308' || Auth::user()->nik == 'KT-22081208')
                                                    <option value="CME">CME</option>
                                                @endif
                                            </select>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please provide a valid input.</div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="inlineFormCustomSelect"
                                            class="col-md-2 col-form-label">Perihal</label>
                                        <div class="col-md-10">
                                            <select class="select2 form-control col-12" id="perihalSk" name="perihal"
                                                required>
                                                <option value="" selected>Choose...</option>
                                                @foreach ($perihalList as $perihal)
                                                    <option value="{{ $perihal->perihal }}"
                                                        data-kode="{{ $perihal->kode_perihal }}">
                                                        {{ $perihal->perihal }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div id="perihal_other_div" style="display: none;">
                                                <input type="text" class="form-control mt-2" id="perihal_other"
                                                    name="perihal_other" placeholder="Input perihal lainnya">
                                            </div>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please provide a valid input.</div>
                                        </div>
                                    </div>

                                    @if (Auth::user()->divisi == 'Finance & Accounting')
                                        <div class="mb-3 row">
                                            <label for="validationCustom01" class="col-md-2 col-form-label">No.
                                                Invoice</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="invoice"
                                                    id="validationCustom01" placeholder="Nomor Invoice" required />
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please provide a valid input.</div>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="mb-3 row">
                                        <label for="example-date-input" class="col-md-2 col-form-label">Tanggal
                                            Dikirim</label>
                                        <div class="col-md-4">
                                            <input class="form-control" type="date" name="tanggal_dikirim"
                                                id="example-date-input" required />
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please provide a valid input.</div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-date-input" class="col-md-2 col-form-label">Tanggal
                                            Surat</label>
                                        <div class="col-md-4">
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
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
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
    // function toggleOtherInput(type) {
    //     const select = document.getElementById(type);
    //     const otherDiv = document.getElementById(`${type}_other_div`);
    //     if (select.value === "others") {
    //         otherDiv.style.display = "block";
    //     } else {
    //         otherDiv.style.display = "none";
    //     }
    // }
</script>
