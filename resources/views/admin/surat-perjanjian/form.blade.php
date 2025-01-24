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
                                <li class="breadcrumb-item"><a class="text-muted text-decoration-none"
                                        href="{{ route('admin.surat-perjanjian.tujuan') }}">Surat Perjanjian - Tujuan</a>
                                </li>
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
                                <form class="needs-validation" method="POST"
                                    action="{{ route('admin.surat-perjanjian.store') }}" enctype="multipart/form-data"
                                    novalidate>
                                    @csrf
                                    <div class="mb-3 row">
                                        <!-- Input untuk Tujuan -->
                                        <label for="tujuan" class="col-md-2 col-form-label">Tujuan</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="tujuan" name="tujuan"
                                                placeholder="Masukkan tujuan" required>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Harap masukkan tujuan yang valid.</div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <!-- Input untuk Kode Tujuan -->
                                        <label for="kode_tujuan" class="col-md-2 col-form-label">Kode Tujuan</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="kode_tujuan" name="kode_tujuan"
                                                placeholder="Masukkan kode tujuan (max 15 karakter)" maxlength="15"
                                                required>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Harap masukkan kode tujuan yang valid (max 15
                                                karakter).</div>
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <div class="card-body border-top">
                                            <button type="submit" class="btn btn-success rounded-pill px-4" id="btn-save">
                                                <div class="d-flex align-items-center">
                                                    <i class="ti ti-device-floppy me-1 fs-4"></i>Save
                                                </div>
                                            </button>
                                            <button type="button" class="btn btn-danger rounded-pill px-4 ms-2 text-white"
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
    function toggleOtherInput(type) {
        const select = document.getElementById(type);
        const otherDiv = document.getElementById(`${type}_other_div`);
        if (select.value === "others") {
            otherDiv.style.display = "block";
        } else {
            otherDiv.style.display = "none";
        }
    }
</script>
