@extends('layouts.admin_main')

@section('content')
<div class="container-fluid py-4">
 <div class="d-flex align-items-center gap-2">
    <form action="{{ route('users.index') }}" method="GET" autocomplete="off" class="d-none d-md-flex mb-0">
        <div class="filter-control-group px-3 bg-white border rounded-pill custom-pill-height" style="width: 250px;">
            <input type="text" name="search" 
                   value="{{ request('search') }}" 
                   class="border-0 bg-transparent flex-grow-1" 
                   placeholder="Search user..." 
                   style="outline: none; font-size: 13px;">

            <button type="submit" class="border-0 bg-transparent p-0 ms-2">
                <i class="bi bi-search text-muted small"></i>
            </button>
        </div>
    </form>

    <a href="{{ route('users.create') }}" 
       class="btn rounded-pill px-4 text-white shadow-sm custom-pill-height justify-content-center" 
       style="background-color: var(--accent); font-size: 13px; border: none; min-width: 140px;">
        <i class="bi bi-person-plus me-2"></i> 
        <span>Add New User</span>
    </a>
</div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 py-3 text-muted fw-semibold" style="font-size: 13px;">ID</th>
                        <th class="py-3 text-muted fw-semibold" style="font-size: 13px;">USER</th>
                        <th class="py-3 text-muted fw-semibold" style="font-size: 13px;">EMAIL</th>
                        <th class="pe-4 py-3 text-end text-muted fw-semibold" style="font-size: 13px;">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td class="ps-4">
                            <span class="text-muted fw-medium">{{ $user->id }}</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-light d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;">
                                    <i class="bi bi-person text-muted"></i>
                                </div>
                                <span class="fw-bold text-dark">{{ $user->name }}</span>
                            </div>
                        </td>
                        <td>
                            <span class="text-secondary" style="font-size: 14px;">{{ $user->email }}</span>
                        </td>
                        <td class="pe-4 text-end">
                            <div class="btn-group shadow-sm rounded-pill bg-white border overflow-hidden">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-white border-end py-1 px-3">
                                    <i class="bi bi-pencil-square" style="color: var(--accent);"></i>
                                </a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Delete user?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-white py-1 px-3">
                                        <i class="bi bi-trash text-danger"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4 d-flex justify-content-center">
        {{ $users->links() }}
    </div>
</div>
@endsection
