@extends('layouts.admin_main')

@section('content')
<div class="container-fluid py-4 col-lg-10">
    <div class="mb-4">
        <a href="{{ route('users.index') }}" class="text-decoration-none">
                    <h3 class="fw-bold mb-1" style="color: #2d3436;">User Table</h3>
        </a>   
    </div>
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
       style="background-color: var(--main-color); font-size: 13px; border: none; min-width: 140px;">
        <i class="bi bi-person-plus me-2"></i> 
        <span>Add New User</span>
    </a>
</div>

    <div class="card mt-2 border-0 shadow-sm overflow-hidden col">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                      <tr>
                        <th class="ps-4 py-3 fw-semibold">ID</th>
                        <th class="py-3 fw-semibold">USER NAME</th>
                        <th class="py-3 fw-semibold">EMAIL</th>
                        <th class="pe-4 py-3 text-end fw-semibold" style="font-size: 13px; color: #fff;">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td class="ps-4">
                            <span class="badge bg-light text-theme border border-primary-subtle rounded-pill px-3 fw-medium">{{ $user->id }}</span>
                        </td>
                        <td>
                            <span class="text-secondary" style="font-size: 14px;">{{ $user->name }}</span>
                        </td>
                        <td>
                            <span class="text-secondary" style="font-size: 14px;">{{ $user->email }}</span>
                        </td>
                        <td class="pe-4 text-end">
                            <div class="btn-group shadow-sm rounded-pill bg-white border overflow-hidden">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-white border-end py-1 px-3">
                                    <i class="bi bi-pencil-square" style="color: var(--main-color);"></i>
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
