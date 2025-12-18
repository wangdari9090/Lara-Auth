<!-- Sidebar Offcanvas -->
    <div class="offcanvas-lg offcanvas-start bg-light" tabindex="-1" id="sidebar" style="top: 56px; height: calc(100% - 56px);">
        <div class="offcanvas-header d-lg-none">
            <h5 class="offcanvas-title">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body p-0">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2 me-2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link {{ request()->routeIs('admin.students.*') ? 'active' : '' }}">
                        <i class="bi bi-people me-2"></i> Students
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link {{ request()->routeIs('admin.courses.*') ? 'active' : '' }}">
                        <i class="bi bi-journal-bookmark me-2"></i> Courses
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                        <i class="bi bi-gear me-2"></i> Settings
                    </a>
                </li>
            </ul>
        </div>
    </div>
