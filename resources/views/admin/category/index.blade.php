@extends('layouts.admin')

@section('brandcrume')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Admin</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Category</a></li>

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
                            <h4 class="card-title">Category</h4>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end"><a class="btn btn-success"
                                href="{{ route('category.create') }}">+
                                Category</a></div>
                    </div>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Parent Category</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <td>{{ $category->parent ? $category->parent->name : 'None' }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{!! $category->status == 1
                                            ? "<span class='badge badge-success'> Active</span>"
                                            : '<span class="badge badge-danger"> InActive</span>' !!}
                                        </td>
                                        <td>
                                            <a href="{{ route('category.edit', ['id' => $category->id]) }}"><i
                                                    class="fas fa-edit text-success"></i></a>
                                            <a href="{{ route('category.delete', ['id' => $category->id]) }}"><i
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
