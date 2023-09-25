@extends('layouts.admin-master-layout')

@section('main-admin-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-right">
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-success">
                                Categories List
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Edit Category Form</h3>
                            </div>
                            <form class="form-horizontal" action="{{ route('admin.categories.update', $category->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="cat_name" class="col-sm-4 col-form-label">Category Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="cat_name" id="cat_name"
                                                value="{{ $category->cat_name }}">
                                            <p class="text-danger mb-0">
                                                @error('cat_name')
                                                    {{ $message }}
                                                @enderror
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="is_active" class="col-sm-4 col-form-label">Is Active?</label>
                                        <div class="col-sm-8">
                                            <select name="is_active" id="is_active" class="form-control">
                                                <option value="1" {{ $category->is_active == 1 ? 'selected' : '' }}>
                                                    Yes
                                                </option>
                                                <option value="0" {{ $category->is_active == 0 ? 'selected' : '' }}>
                                                    No
                                                </option>
                                            </select>
                                            <p class="text-danger mb-0">
                                                @error('is_active')
                                                    {{ $message }}
                                                @enderror
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-success">
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
