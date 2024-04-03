@extends('layout.admin.main')

@section('content')

<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">LIST Pengguna</h3>
            </div>
            <div class="card-body">

                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ (Session::get('success')) }}
                </div>
                @endif

                <div class="table-responsive">
                    
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
                                    @foreach ($pengguna as $item )
                                    <tr>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->jurusan }}</td>
                                        <td>{{ $item->no_hp }}</td>
                                        <td>{{ $item->kelas }}</td>
                                        <td>{{ $item->jk }}</td>
                                        <td>
                                            
                                            <a href="{{ route('daftar-pengguna.destroy', $item->id) }}" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>
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
