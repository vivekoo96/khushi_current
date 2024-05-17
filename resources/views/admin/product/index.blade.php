@extends('layouts.admin')

@section('brandcrume')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Admin</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Product</a></li>

                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row mx-auto">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <div class="row py-3">
                        <div class="col-md-6">
                            <h4 class="card-title">Product</h4>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end"><a class="btn btn-success"
                                href="{{ route('product.create') }}">+
                                Product</a></div>
                    </div>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->subcategory->name }}</td>
                                        <td>
                                            @php
                                                $images = json_decode($product->images);
                                                $firstImage = !empty($images) ? $images[0] : null;
                                            @endphp
                                            @if ($firstImage)
                                                <img src="{{ asset('Product/' . $firstImage) }}"
                                                    alt="{{ $product->name }} Image" width="50">
                                            @else
                                                <p>No image available</p>
                                            @endif
                                        </td>
                                        <td>


                                            <a href="{{ route('product.edit', ['id' => $product->id]) }}"><i
                                                    class="fas fa-edit text-success"></i></a>
                                            <a href="{{ route('product.delete', ['id' => $product->id]) }}"><i
                                                    class="fas fa-trash text-danger"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse

                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
