@extends('layout.admin.main')

@section('content')

<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">LIST KONSELOR SEBAYA</h3>
            </div>
            <div class="card-body">

                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ (Session::get('success')) }}
                </div>
                @endif

                <div class="table-responsive">
                    <a href="{{ route('daftar-konselor.create') }}" id="button" style="z-index: 1" class="btn btn-primary mb-4 data-table-btn">Tambah Konselor</a>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="delete-datatable" class="table table-bordered text-nowrap border-bottom dataTable no-footer" role="grid" aria-describedby="delete-datatable_info">
                                <thead>
                                    <tr role="row">
                                        <th>Nama</th>
                                        <th>Jurusan</th>
                                        <th>No Hp</th>
                                        <th>Kelas</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($konselor as $item )
                                    <tr>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->jurusan }}</td>
                                        <td>{{ $item->no_hp }}</td>
                                        <td>{{ $item->kelas }}</td>
                                        <td>{{ $item->jk }}</td>
                                        <td>
                                            <a href="{{ route('daftar-konselor.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('daftar-konselor.destroy', $item->id) }}" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('#delete-datatable').DataTable();

    });

</script>
@endsection
