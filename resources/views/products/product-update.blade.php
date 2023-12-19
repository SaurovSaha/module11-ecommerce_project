@extends('layouts.app')
@section('content')
<div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Update Product</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                        <li class="breadcrumb-item active">Update Product</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('products.update', ['id' => $product->id]) }}" method="post" id="createproduct-form" autocomplete="off" class="needs-validation">
                    @csrf
                    @method('PUT')
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label" for="product-title-input">Product Name</label>
                                            <input type="text" class="form-control" name="name" id="product-title-input" value="{{$product->name}}" placeholder="Enter product title" required>
                                            
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="product-title-input">Product price</label>
                                            <input type="text" class="form-control" name="price" id="product-title-input" value="{{$product->price}}" placeholder="Enter product title" required>
                                            
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="product-title-input"> Product Quantity</label>
                                            <input type="text" class="form-control" name="quantity" id="product-title-input" value="{{$product->quantity}}" placeholder="Enter product title" required>
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="text-end mb-3">
                                    <button type="submit" class="btn btn-primary w-sm">Update</button>
                                </div>
                            </div>

                        </div>

                    </form>

                </div>
                <!-- container-fluid -->
            </div>
@endsection