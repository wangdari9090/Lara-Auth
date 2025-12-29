<aside id="sidebar-wrapper" class="bg-white border-end shadow-sm" 
       style="position: fixed; top: 58px; left: 0; width: 220px; height: calc(100vh - 58px); z-index: 1030; transition: all 0.3s ease;">
    
    <div class="p-3">
        <ul class="nav flex-column gap-2">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link d-flex align-items-center rounded px-3 py-2 sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2 me-2 sidebar-icon"></i> <span class="mb-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link d-flex align-items-center rounded px-3 py-2 sidebar-link" 
                   data-bs-toggle="collapse" href="#studentsDropdown">
                    <i class="bi bi-people me-2 sidebar-icon"></i> <span class="mb-1">Students</span>
                    <i class="bi bi-chevron-down ms-auto small"></i>
                </a>
                <div class="collapse {{ request()->is('students*') ? 'show' : '' }}" id="studentsDropdown">
                    <ul class="nav flex-column ms-4 mt-1">
                        <li><a href="{{ route('students.index') }}" class="nav-link py-1">All Students</a></li>
                        <li><a href="{{ route('students.create') }}" class="nav-link py-1">Add New</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center rounded px-3 py-2 sidebar-link" 
                   data-bs-toggle="collapse" href="#courseDropdown">
                    <i class="bi bi-layers me-2 sidebar-icon"></i> <span class="mb-1">Courses</span>
                    <i class="bi bi-chevron-down ms-auto small"></i>
                </a>
                <div class="collapse {{ request()->is('course*') ? 'show' : '' }}" id="courseDropdown">
                    <ul class="nav flex-column ms-4 mt-1">
                        <li><a href="{{ route('courses.index') }}" class="nav-link py-1">All course</a></li>
                        <li><a href="{{ route('courses.create') }}" class="nav-link py-1">Add New</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link d-flex align-items-center rounded px-3 py-2 sidebar-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
                    <i class="bi bi-person-circle me-2"></i> <span>Users</span>
                </a>
            </li>
        </ul>
    </div>
</aside>