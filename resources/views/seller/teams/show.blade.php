@extends('admin.layouts.master')

@section('title', 'Team Member Details')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="page-title">Team Member Details</h3>
            <a href="{{ route('teams.index') }}" class="btn btn-outline-primary btn-sm">← Back to Teams</a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-4">

                <div class="row">
                    <div class="col-md-4 text-center">
                        @if ($team->photo)
                            <img src="{{ asset('uploads/teams/' . $team->photo) }}" alt="{{ $team->name }}" class="img-fluid rounded shadow-sm mb-3" style="max-height: 250px; object-fit: cover;">
                        @else
                            <div class="bg-secondary text-white rounded d-flex align-items-center justify-content-center mb-3" style="height: 250px;">
                                <span class="fs-4">No Photo Available</span>
                            </div>
                        @endif
                    </div>

                    <div class="col-md-8">
                        <h2 class="fw-bold mb-2">{{ $team->name }}</h2>
                        <p class="text-muted fs-5 mb-3">{{ $team->position ?? 'Position not specified' }}</p>

                        <div class="mb-3">
                            <strong>Email:</strong> 
                            <a href="mailto:{{ $team->email ?? '' }}" class="text-decoration-none">
                                {{ $team->email ?? 'N/A' }}
                            </a>
                        </div>

                        <div class="mb-3">
                            <strong>Status:</strong>
                            <span class="badge {{ $team->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                                {{ ucfirst($team->status) }}
                            </span>
                        </div>

                        <div class="mb-3">
                            <strong>Order:</strong> {{ $team->order ?? 'N/A' }}
                        </div>

                        <div class="mb-4">
                            <strong>Short Bio:</strong>
                            <p class="mt-2 text-secondary" style="white-space: pre-line;">
                                {{ $team->bio ?? 'No bio available.' }}
                            </p>
                        </div>

                        <div>
                            <strong>Social Links:</strong>
                            <ul class="list-inline mt-2">
                                @if ($team->facebook)
                                    <li class="list-inline-item me-3">
                                        <a href="{{ $team->facebook }}" target="_blank" class="text-primary fs-5" title="Facebook">
                                            <i class="mdi mdi-facebook"></i> Facebook
                                        </a>
                                    </li>
                                @endif
                                @if ($team->twitter)
                                    <li class="list-inline-item me-3">
                                        <a href="{{ $team->twitter }}" target="_blank" class="text-info fs-5" title="Twitter">
                                            <i class="mdi mdi-twitter"></i> Twitter
                                        </a>
                                    </li>
                                @endif
                                @if ($team->linkedin)
                                    <li class="list-inline-item me-3">
                                        <a href="{{ $team->linkedin }}" target="_blank" class="text-primary fs-5" title="LinkedIn">
                                            <i class="mdi mdi-linkedin"></i> LinkedIn
                                        </a>
                                    </li>
                                @endif
                                @if (!$team->facebook && !$team->twitter && !$team->linkedin)
                                    <li class="list-inline-item text-muted">No social links available.</li>
                                @endif
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
