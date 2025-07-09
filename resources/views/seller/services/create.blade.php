@extends('admin.layouts.master')

@section('title', 'Add Service')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-plus-box"></i>
                    </span> Add Service
                </h3>
            </div>

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>There were some problems with your input:</strong>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card-body">
                        <h4 class="card-title">Service Details</h4>
                        <form class="forms-sample" action="{{ route('services.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                                    value="{{ old('title') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug"
                                    placeholder="Slug (optional)" value="{{ old('slug') }}">
                                <small class="form-text text-muted">Optional: Auto-generated if left blank.</small>
                            </div>

                            <div class="form-group">
                                <label for="icon">Icon (e.g. mdi mdi-cog)</label>
                                <input type="text" class="form-control" id="icon" name="icon"
                                    placeholder="Icon class or path" value="{{ old('icon') }}">
                            </div>

                            <div class="form-group">
                                <label for="banner">Banner Image</label>
                                <input type="file" class="form-control" id="banner" name="banner">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="5" placeholder="Service description">{{ old('description') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" class="form-control" id="meta_title" name="meta_title"
                                    value="{{ old('meta_title') }}" placeholder="SEO Meta Title">
                            </div>

                            <div class="form-group">
                                <label for="meta_description">Meta Description</label>
                                <input type="text" class="form-control" id="meta_description" name="meta_description"
                                    value="{{ old('meta_description') }}" placeholder="SEO Meta Description">
                            </div>

                            <div class="form-group">
                                <label for="position">Position</label>
                                <input type="number" class="form-control" id="position" name="position"
                                    value="{{ old('position', 0) }}" placeholder="Display order">
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                            <a href="{{ route('services.index') }}" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
