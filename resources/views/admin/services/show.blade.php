@extends('admin.layouts.master')

@section('title', 'View Service')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-eye"></i>
                </span> View Service
            </h3>
        </div>

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">{{ $service->title }}</h4>

                    @if($service->banner)
                        <div class="mb-3">
                            <img src="{{ asset('uploads/services/' . $service->banner) }}" alt="{{ $service->title }}" style="max-width: 300px; height: auto;">
                        </div>
                    @endif

                    <p><strong>Slug:</strong> {{ $service->slug }}</p>
                    <p><strong>Icon:</strong> <i class="{{ $service->icon }}"></i> ({{ $service->icon }})</p>
                    <p><strong>Description:</strong></p>
                    <p>{!! nl2br(e($service->description)) !!}</p>

                    <p><strong>Meta Title:</strong> {{ $service->meta_title }}</p>
                    <p><strong>Meta Description:</strong> {{ $service->meta_description }}</p>
                    <p><strong>Position:</strong> {{ $service->position }}</p>
                    <p><strong>Status:</strong> 
                        @if($service->status === 'active')
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Inactive</span>
                        @endif
                    </p>

                    <a href="{{ route('services.index') }}" class="btn btn-light mt-3">Back to Services</a>
                    <a href="{{ route('services.edit', $service->id) }}" class="btn btn-primary mt-3">Edit Service</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
