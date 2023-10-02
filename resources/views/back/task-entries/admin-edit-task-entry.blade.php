@extends('layouts.admin-master-layout')

@section('main-admin-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Task Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-right">
                            <a href="{{ route('admin.task.categories.index') }}" class="btn btn-success">
                                Task Categories List
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
                            <form class="form-horizontal"
                                action="{{ route('admin.task.categories.update', $category->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="task_category_name" class="col-sm-4 col-form-label">Task Category
                                            Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="task_category_name"
                                                id="task_category_name" value="{{ $category->task_category_name }}">
                                            <p class="text-danger mb-0">
                                                @error('task_category_name')
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
