@extends('layouts.app')
@section('content')
                    <div class="page-content">
                        <div class="container-fluid">
                            <div class="col-12">
                                <div>
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

                                        <div class="card-header">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#productnav-all" role="tab">
                                                                All <span class="badge bg-secondary align-middle rounded-pill ms-1"></span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-auto">
                                                    <div id="selection-element">
                                                        <div class="my-n1 d-flex align-items-center text-muted">
                                                            Select <div id="select-content" class="text-body fw-semibold px-1"></div> Result <button type="button" class="btn btn-link link-danger p-0 ms-3" data-bs-toggle="modal" data-bs-target="#removeItemModal">Remove</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <table class="table table-nowrap align-middle table-borderless mb-0">
                                            <thead class="table-light text-muted">
                                                <tr>
                                                    <th scope="col">Sl</th>
                                                    <th scope="col">Product Name</th>
                                                    <th scope="col">Item Price</th>
                                                    <th scope="col">In Stock</th>
                                                    <th scope="col">Sale Quantity</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($products as $key=>$product)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                <form action="{{ route('sales.store') }}" method="POST" id="createproduct-form" autocomplete="off" class="needs-validation">
                                                        @csrf
                                                    <td>
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1 ms-3">
                                                                
                                                                <input type="hidden" name="product_id" id="product-title-input" value="{{$product->id}}" required>
                                                                <input type="hidden" name="Product_name" id="product-title-input" value="{{$product->name}}" required>
                                                                <h5 class="fs-15"><a href="apps-ecommerce-product-details.html" class="link-primary">{{$product->name}}</a></h5>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{$product->price}}
                                                        <input type="hidden" name="sale_price" id="product-title-input" value="{{$product->price}}" required>
                                                    </td>
                                                    
                                                    <td>{{$product->quantity}}
                                                 
                                                    </td>
                                                    <td>
                                                        <div class="input-step step-warning">
                                                            <input type="number" class="product-quantity" name="sale_qty" value="1" min="1" max="100" required>
                                                                  
                                                        </div>
                                                    </td>

                                                    <td class="d-flex gap-2 text-end">
                                                        <button type="submit" class="btn btn-danger waves-effect waves-light">Sale</button>
                                                    </td>
                                                </form>
                                                </tr>
                                            @endforeach


                                            </tbody>
                                        </table>

                        
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->
                                </div>
                            </div>
                        </div>
                    </div>
@endsection