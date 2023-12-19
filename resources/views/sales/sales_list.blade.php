@extends('layouts.app')
@section('content')
                    <div class="page-content">
                        <div class="container-fluid">
                            <div class="col-12">
                                <div>
                                        <div class="card-header">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#productnav-all" role="tab">
                                                                All Sales Transections <span class="badge bg-secondary align-middle rounded-pill ms-1"></span>
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
                                                    <th scope="col">Invoice ID</th>
                                                    <th scope="col">Product Name</th>
                                                    <th scope="col">Sale Price</th>
                                                    <th scope="col">Sale Quantity</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($sales as $key=>$sale)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$sale->id}}</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1 ms-3">
                                                                <h5 class="fs-15"><a href="apps-ecommerce-product-details.html" class="link-primary">{{$sale->Product_name}}</a></h5>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{$sale->sale_price}}</td>
                                                    <td>{{$sale->sale_qty}}</td>
                                                    <td class="d-flex gap-2 text-end">
                                                        <button type="button" class="btn btn-primary waves-effect waves-light">View</button>
                                                    </td>
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