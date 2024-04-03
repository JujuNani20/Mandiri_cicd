@extends('layout.admin.main')

@section('content')
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Dashboard 01</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard 01</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <a class="btn btn-primary" href="{{ route('product.create') }}">
                                    <i class="fe fe-plus"></i> Add Product
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <div class="row">
                    @foreach ($product as $item)
                        <div class="col-xl-4 col-md-12">
                            <div class="card">
                                <img src="{{ asset($item->product_images[0]->images) }}" class="card-img-top"
                                    alt="img">
                                <div class="card-body border-bottom">
                                    <p class="card-text">{{ $item->name }}</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">{{ $item->description }}</li>
                                    <li class="list-group-item">{{ $item->price }}</li>
                                    <li class="list-group-item">
                                        @if ($item->type == 'main')
                                            Main Course
                                        @elseif ($item->type == 'dessert')
                                            Dessert
                                        @elseif($item->type == 'appetizer')
                                            Appetizer
                                        @endif
                                    </li>



                                </ul>
                                <div class="card-body border-top">
                                    <a href="{{ route('product.edit', $item->id) }}"
                                        class= "btn btn-sm btn-warning card-link">
                                        <i class="fe fe-edit"></i> Edit
                                    </a>
                                    <button onclick="confirm({{$item->id}})"
                                        class="btn btn-sm btn-danger card-link">
                                        <i class="fe fe-trash"></i> Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>

            </div>
            <!-- CONTAINER END -->
        </div>
    </div>
@endsection

@section('javascript')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirm(id) {
            let url= `{{ route('product.delete', ':id') }}`
            url = url.replace(':id', id)
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                    window.location.replace(url)
                }
            });
        }
    </script>
@endsection
