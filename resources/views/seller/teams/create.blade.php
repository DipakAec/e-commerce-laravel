@extends('admin.layouts.master')

@section('title', 'Add Team Member')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-account-plus"></i>
                    </span> Add Team Member
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
                        <h4 class="card-title">Team Member Info</h4>
                        <form class="forms-sample" action="{{ route('teams.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                    value="{{ old('name') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="position">Position</label>
                                <input type="text" class="form-control" id="position" name="position"
                                    placeholder="Position (e.g. Developer)" value="{{ old('position') }}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                    value="{{ old('email') }}">
                            </div>

                            <div class="mb-3">
                                <label for="photo" class="form-label">Photo</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="photo" name="photo">
                                    <label class="input-group-text" for="photo">Upload</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="bio">Short Bio</label>
                                <textarea class="form-control" id="bio" name="bio" rows="4"
                                    placeholder="Write something about the team member...">{{ old('bio') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input type="text" class="form-control" id="facebook" name="facebook"
                                    placeholder="Facebook URL" value="{{ old('facebook') }}">
                            </div>

                            <div class="form-group">
                                <label for="twitter">Twitter</label>
                                <input type="text" class="form-control" id="twitter" name="twitter"
                                    placeholder="Twitter URL" value="{{ old('twitter') }}">
                            </div>

                            <div class="form-group">
                                <label for="linkedin">LinkedIn</label>
                                <input type="text" class="form-control" id="linkedin" name="linkedin"
                                    placeholder="LinkedIn URL" value="{{ old('linkedin') }}">
                            </div>

                            <div class="form-group">
                                <label for="order">Order</label>
                                <input type="number" class="form-control" id="order" name="order"
                                    placeholder="Display order (e.g. 1)" value="{{ old('order') }}">
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
                            <a href="{{ route('teams.index') }}" class="btn btn-light">Cancel</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
