@extends('layout.admin.main')

@section('content')

<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Konselor</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('daftar-konselor.store') }}" class="form-horizontal" method="POST">
                    @csrf
                    <div class=" row mb-4">
                        <label class="col-md-3 form-label">Nama Konselor</label>
                        <div class="col-md-9">
                            <input name="nama" type="text" class="form-control">
                        </div>
                    </div>
                    <div class=" row mb-4">
                        <label class="col-md-3 form-label" for="example-email">Jurusan</label>
                        <div class="col-md-9">
                            <select class="form-select" name="jurusan">
                                <option>Teknik Informatika</option>
                                <option>Teknik Mesin</option>
                                <option>Teknik Pendingin dan Tata Udara</option>
                                <option>Keperawatan</option>
                            </select>
                        </div>
                    </div>
                    <div class=" row mb-4">
                        <label class="col-md-3 form-label">No HP</label>
                        <div class="col-md-9">
                            <input type="text" name="no_hp" class="form-control">
                        </div>
                    </div>
                    <div class=" row mb-4">
                        <label class="col-md-3 form-label">Kelas</label>
                        <div class="col-md-9">
                            <input type="text" name="kelas" class="form-control">
                        </div>
                    </div>
                    <div class=" row mb-4">
                        <label class="col-md-3 form-label">Jenis Kelamin</label>
                        <div class="col-md-9">
                            <select class="form-select" name="jk">
                                <option>Laki-Laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>

                    </div>
                    <button class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
