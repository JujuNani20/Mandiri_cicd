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

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Add Product</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('product.store') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class=" row mb-4">
                            <label class="col-md-3 form-label">Name Product</label>
                            <div class="col-md-9">
                                <input name="name" type="text" class="form-control" placeholder="Input Product Name">
                            </div>
                        </div>
                        <div class=" row mb-4">
                            <label class="col-md-3 form-label" for="example-email">Description</label>
                            <div class="col-md-9">
                                <select class="form-select" name="type">
                                    <option value="main">Main Course</option>
                                    <option value="dessert">Dessert</option>
                                    <option value="appetizer">Appetizer</option>
                                </select>

                    
                            </div>
                        </div>
                        <div class=" row mb-4">
                            <label class="col-md-3 form-label" for="example-email">Description</label>
                            <div class="col-md-9">
                                <input name="description" type="text" class="form-control" placeholder="Input Product Description">
                            </div>
                        </div>
                        <div class=" row mb-4">
                            <label class="col-md-3 form-label">Price</label>
                            <div class="col-md-9">
                                <input name="price" type="number" class="form-control" placeholder="Input Product Price">
                            </div>
                        </div>
                        <div class=" row mb-4">
                            <label class="col-md-3 form-label">Image Product 1</label>
                            <div class="col-md-9">
                                <input name="images[]" class="form-control" type="file">
                            </div>
                        </div>
                        <div class=" row mb-4">
                            <label class="col-md-3 form-label">Image Product 2</label>
                            <div class="col-md-9">
                                <input name="images[]" class="form-control" type="file">
                            </div>
                        </div>
                        <div class=" row mb-4">
                            <label class="col-md-3 form-label">Image Product 3</label>
                            <div class="col-md-9">
                                <input name="images[]" class="form-control" type="file">
                            </div>
                        </div>
                        <button class="btn btn-primary">
                            <i class="fe fe-save"></i> Submit
                        </button>
                    </div>

                </form>
            </div>
        </div>
            
            
        </div>
        <!-- CONTAINER END -->
    </div>
</div>





