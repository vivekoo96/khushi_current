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
                <form class="form-horizontal" action="{{ route('category.update') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $category->id }}">
                    <div class="card-body">
                        <div class="row py-3">
                            <div class="col-md-6">
                                <h4 class="card-title">Category</h4>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end"><a class="btn btn-success"
                                    href="{{ route('category') }}">+
                                    Category</a></div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 text-right control-label col-form-label">
                                Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" value="{{ old('name') ?? $category->name }}"
                                    class="form-control  @error('name')is-invalid  @enderror" id="name"
                                    placeholder="Category Name">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="parent_id" class="col-sm-3 text-right control-label col-form-label">Parent
                                Category:</label>
                            <div class="col-sm-9">
                                <select name="parent_id" id="parent_id" class="form-control">
                                    <option value="">None</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}"
                                            {{ $category->parent_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-3 text-right control-label col-form-label">Status
                            </label>
                            <div class="col-sm-9">
                                <select name="status" id="status" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Inactive</option>
                                    <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Active</option>
                                </select>
                            </div>
                        </div>



                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
