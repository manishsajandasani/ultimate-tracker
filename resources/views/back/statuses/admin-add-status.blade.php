@extends('layouts.admin-master-layout')

@section('admin-styles')
    <link rel="stylesheet" href="{{ asset('admin/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/dist/css/select2-bootstrap4.min.css') }}">
@endsection

@section('main-admin-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Status</h1>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-right">
                            <a href="{{ route('admin.statuses.index') }}" class="btn btn-success">
                                Statuses List
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
                            <form class="form-horizontal" action="{{ route('admin.statuses.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="status_name" class="col-sm-4 col-form-label">
                                            Status Name
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="status_name" id="status_name"
                                                placeholder="Enter Status Name" value="{{ old('status_name') }}">
                                            <p class="text-danger mt-1 mb-0">
                                                @error('status_name')
                                                    {{ $message }}
                                                @enderror
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-4 col-form-label">Is Active?</label>
                                        <div class="col-sm-8">
                                            <select name="is_active" id="is_active" class="form-control">
                                                <option value="1" selected>Yes</option>
                                                <option value="0">No</option>
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
                                        Submit
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

@section('admin-scripts')
    <script src="{{ asset('admin/dist/js/select2.full.min.js') }}"></script>
    <script>
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    </script>
@endsection
