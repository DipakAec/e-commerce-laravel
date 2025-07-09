@extends('admin.layouts.master')

@section('title', 'Teams')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-account-group"></i>
                    </span> Teams
                </h3>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            <span></span>Manage Teams <i
                                class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                        </li>
                    </ul>
                </nav>
            </div>

            {{-- Teams Table --}}
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">

                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success!</strong> {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title mb-0">All Team Members</h4>
                                <a href="{{ route('teams.create') }}" class="btn btn-sm btn-primary">+ Add Team Member</a>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th> Photo </th>
                                            <th> Name </th>
                                            <th> Position </th>
                                            <th> Status </th>
                                            <th> Order </th>
                                            <th> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($teams as $index => $team)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>
                                                    @if ($team->photo)
                                                        <img src="{{ asset('uploads/teams/' . $team->photo) }}"
                                                            alt="image" width="50">
                                                    @else
                                                        <span>No Photo</span>
                                                    @endif
                                                </td>
                                                <td>{{ $team->name }}</td>
                                                <td>{{ $team->position }}</td>
                                                <td>
                                                    <a href="javascript:void(0);"
                                                        class="badge toggle-status badge-gradient-{{ $team->status == 'active' ? 'success' : 'danger' }}"
                                                        data-id="{{ $team->id }}">
                                                        {{ ucfirst($team->status) }}
                                                    </a>
                                                </td>

                                                <td>{{ $team->order }}</td>
                                                <td>
                                                    <a href="{{ route('teams.show', $team->id) }}"
                                                        class="btn btn-sm btn-primary">
                                                        Show
                                                    </a>


                                                    <a href="{{ route('teams.edit', $team->id) }}"
                                                        class="btn btn-sm btn-info">Edit</a>
                                                    <form action="{{ route('teams.destroy', $team->id) }}" method="POST"
                                                        style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Are you sure to delete?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @if ($teams->isEmpty())
                                            <tr>
                                                <td colspan="7" class="text-center">No team members found.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
 <div class="d-flex justify-content-center mt-3">
                                    {{ $teams->links('pagination::bootstrap-5') }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- Load jQuery first --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- Load SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Your Custom Script --}}
    <script>
        $(document).ready(function() {
            $('.toggle-status').on('click', function() {
                let $badge = $(this);
                let teamId = $badge.data('id');
                
                $.ajax({
                    url: "{{ url('admin/toggle-status') }}", // Make sure this route exists
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: teamId
                    },
                    success: function(response) {
                        if (response.status) {
                            let newStatus = response.new_status;
                            let newClass = (newStatus === 'active') ? 'badge-gradient-success' :
                                'badge-gradient-danger';

                            $badge
                                .removeClass('badge-gradient-success badge-gradient-danger')
                                .addClass(newClass)
                                .text(newStatus.charAt(0).toUpperCase() + newStatus.slice(1));

                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'success',
                                title: response.message,
                                showConfirmButton: false,
                                timer: 2000
                            });
                        } else {
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'error',
                                title: response.message,
                                showConfirmButton: false,
                                timer: 2000
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            title: 'Something went wrong!',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                });
            });
        });
    </script>


@endsection
