<div class="offcanvas offcanvas-start mt-2 sidebar"
     tabindex="-1" id="sidebar"
    style="top:58px; height:calc(100% - 58px); --bs-offcanvas-width:220px; z-index: 1030;">
    <div class="offcanvas-body">
        <ul class="nav flex-column gap-2">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}"
                   class="nav-link d-flex align-items-center rounded px-3 py-2 sidebar-link">
                   <i class="bi bi-speedometer2 me-2"></i> <span class="sidebar-text">Dashboard</span>
                </a>

            </li>

             <li class="nav-item">
                <a class="nav-link d-flex align-items-center rounded px-3 py-2 sidebar-link"
                data-bs-toggle="collapse" href="#studentsDropdown" role="button"
                aria-expanded="false" aria-controls="studentsDropdown">
                    <i class="bi bi-people me-2"></i> <span class="sidebar-text">Students</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>

                <div class="collapse" id="studentsDropdown">
                    <ul class="nav flex-column ms-3 mt-1 sidebar-submenu">
                        <li class="nav-item">
                            <a href="{{ route('students.index') }}" class="nav-link px-3 py-2">
                                All Students
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('students.create') }}" class="nav-link px-3 py-2">
                                Add New Student
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center rounded px-3 py-2 sidebar-link"
                data-bs-toggle="collapse" href="#coursesDropdown" role="button"
                aria-expanded="false" aria-controls="coursesDropdown">
                    <i class="bi bi-journal-bookmark me-2"></i><span class="sidebar-text">Courses</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>

                <div class="collapse" id="coursesDropdown">
                    <ul class="nav flex-column ms-3 mt-1 sidebar-submenu">
                        <li class="nav-item">
                            <a href="{{ route('students.index') }}" class="nav-link px-3 py-2">
                                All Courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('students.create') }}" class="nav-link px-3 py-2">
                                Add New Courses
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center rounded px-3 py-2 sidebar-link"
                data-bs-toggle="collapse" href="#settingsDropdown" role="button"
                aria-expanded="false" aria-controls="settingsDropdown">
                    <i class="bi bi-gear me-2"></i> <span class="sidebar-text">Setting</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>

                <div class="collapse" id="settingsDropdown">
                    <ul class="nav flex-column ms-3 mt-1 sidebar-submenu">
                        <li class="nav-item">
                            <a href="{{ route('students.index') }}" class="nav-link px-3 py-2">
                                All Students
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('students.create') }}" class="nav-link px-3 py-2">
                                Add New Student
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>
    </div>
</div>
