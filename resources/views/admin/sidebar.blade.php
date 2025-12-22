<div class="offcanvas offcanvas-start bg-light"
     tabindex="-1" id="sidebar"
     style="top:56px; height:calc(100% - 56px); --bs-offcanvas-width:220px;">
    <div class="offcanvas-body p-2">
        <ul class="nav flex-column gap-2">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}"
                   class="nav-link d-flex align-items-center rounded px-3 py-2 text-secondary">
                   <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
            </li>

             <li class="nav-item">
                <a class="nav-link d-flex align-items-center rounded px-3 py-2 text-secondary"
                   data-bs-toggle="collapse" href="#coursesDropdown" role="button" aria-expanded="false" aria-controls="coursesDropdown">
                   <i class="bi bi-people me-2"></i> Students
                   <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <div class="collapse" id="coursesDropdown">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a href="{{ route('students.index') }}" class="nav-link px-3 py-2 text-secondary">All Students</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('students.create') }}" class="nav-link px-3 py-2 text-secondary">Add New Student</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link d-flex align-items-center rounded px-3 py-2 text-secondary"
                   data-bs-toggle="collapse" href="#coursesDropdown" role="button" aria-expanded="false" aria-controls="coursesDropdown">
                   <i class="bi bi-journal-bookmark me-2"></i> Courses
                   <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <div class="collapse" id="coursesDropdown">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a href="#" class="nav-link px-3 py-2 text-secondary">All Courses</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link px-3 py-2 text-secondary">Add New Course</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a href="#"
                   class="nav-link d-flex align-items-center rounded px-3 py-2 text-secondary">
                   <i class="bi bi-gear me-2"></i> Settings
                </a>
            </li>
        </ul>
    </div>
</div>
