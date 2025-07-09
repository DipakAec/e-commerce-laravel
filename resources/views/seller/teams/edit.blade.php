@extends('admin.layouts.master')

@section('title', 'Edit Team Member')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="page-title">Edit Team Member</h3>
            <a href="{{ route('teams.index') }}" class="btn btn-outline-primary btn-sm">← Back to Teams</a>
        </div>

        <div class="card shadow-sm border-0">
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
            <div class="card-body p-4">

                <form action="{{ route('teams.update', $team->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" id="name" name="name" 
                               class="form-control @error('name') is-invalid @enderror" 
                               value="{{ old('name', $team->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="position" class="form-label">Position</label>
                        <input type="text" id="position" name="position" 
                               class="form-control @error('position') is-invalid @enderror" 
                               value="{{ old('position', $team->position) }}">
                        @error('position')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               value="{{ old('email', $team->email) }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        @if ($team->photo)
                            <div class="mb-2">
                                <img src="{{ asset('uploads/teams/' . $team->photo) }}" alt="Current Photo" 
                                     class="img-thumbnail" style="max-width: 150px;">
                            </div>
                        @endif
                        <input type="file" id="photo" name="photo" 
                               class="form-control @error('photo') is-invalid @enderror">
                        @error('photo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Upload a new photo to replace the existing one.</small>
                    </div>

                    <div class="mb-3">
                        <label for="bio" class="form-label">Short Bio</label>
                        <textarea id="bio" name="bio" rows="4" 
                                  class="form-control @error('bio') is-invalid @enderror">{{ old('bio', $team->bio) }}</textarea>
                        @error('bio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="facebook" class="form-label">Facebook</label>
                        <input type="text" id="facebook" name="facebook" 
                               class="form-control @error('facebook') is-invalid @enderror" 
                               value="{{ old('facebook', $team->facebook) }}">
                        @error('facebook')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="twitter" class="form-label">Twitter</label>
                        <input type="text" id="twitter" name="twitter" 
                               class="form-control @error('twitter') is-invalid @enderror" 
                               value="{{ old('twitter', $team->twitter) }}">
                        @error('twitter')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="linkedin" class="form-label">LinkedIn</label>
                        <input type="text" id="linkedin" name="linkedin" 
                               class="form-control @error('linkedin') is-invalid @enderror" 
                               value="{{ old('linkedin', $team->linkedin) }}">
                        @error('linkedin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="order" class="form-label">Order</label>
                        <input type="number" id="order" name="order" 
                               class="form-control @error('order') is-invalid @enderror" 
                               value="{{ old('order', $team->order) }}">
                        @error('order')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="status" class="form-label">Status</label>
                        <select id="status" name="status" class="form-select @error('status') is-invalid @enderror" required>
                            <option value="active" {{ old('status', $team->status) == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status', $team->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
                    <a href="{{ route('teams.index') }}" class="btn btn-light">Cancel</a>
                </form>

            </div>
        </div>

    </div>
</div>
@endsection
