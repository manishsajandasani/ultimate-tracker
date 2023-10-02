<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('admin.task.dashboard') }}" class="btn brand-link d-flex">
        <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ Config::get('global.website_name') }}</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Session::get('username') }}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.task.dashboard') }}"
                        class="nav-link {{ active_tab1() == 'admin-task-dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Task Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.task.entries.index') }}"
                        class="nav-link {{ active_tab1() == 'admin-task-entries' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>
                            Task Entries
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.task.categories.index') }}"
                        class="nav-link {{ active_tab1() == 'admin-task-categories' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>
                            Task Categories
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.task.sub.categories.index') }}"
                        class="nav-link {{ active_tab1() == 'admin-task-sub-categories' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>
                            Task Sub Categories
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.task.assigned.by.index') }}"
                        class="nav-link {{ active_tab1() == 'admin-task-assigned-by' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>
                            Task Assigned By
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.statuses.index') }}"
                        class="nav-link {{ active_tab1() == 'admin-statuses' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>
                            Statuses
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.priorities.index') }}"
                        class="nav-link {{ active_tab1() == 'admin-priorities' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>
                            Priorities
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
