@extends('layouts.admin_main')

@section('title', 'Admin Dashboard')

@section('dashboard')


<div class="row m-4">
    <div class="col align-self-center">
        
<div class="mb-4">
    <h1 class="fw-bold">Admin Dashboard</h1>
    <p class="text-muted">Welcome back, {{ auth()->user()->name }} 👋</p>
</div>

<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6 class="text-muted">Total Users</h6>
                <h2 class="fw-bold">{{ $userCount }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6 class="text-muted">Admins</h6>
                <h2 class="fw-bold">
                    {{ \App\Models\User::where('role','admin')->count() }}
                </h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6 class="text-muted">Regular Users</h6>
                <h2 class="fw-bold">
                    {{ \App\Models\User::where('role','user')->count() }}
                </h2>
            </div>
        </div>
    </div>
</div>

<!-- Users Table -->
<div class="card shadow-sm border-0">
    <div class="card-body">
        <h5 class="mb-3">Users List</h5>

        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Joined</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(\App\Models\User::latest()->get() as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge {{ $user->role === 'admin' ? 'bg-danger' : 'bg-secondary' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td>{{ $user->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
    </div>

</div>
@endsection
