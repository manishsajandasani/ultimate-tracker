<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
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
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ active_tab1() == 'dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item {{ active_tab1() == 'admin-task-categories' ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#!" class="nav-link {{ active_tab1() == 'admin-task-categories' ? 'active' : '' }}">
                        <i class="nav-icon far fa-hospital"></i>
                        <p>
                            Task Categories
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.task.categories.index') }}"
                                class="nav-link {{ active_tab2() == 'admin.task.categories.index' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Task Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.task.categories.create') }}"
                                class="nav-link {{ active_tab2() == 'admin.task.categories.create' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Task Category</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li
                    class="nav-item {{ active_tab1() == 'admin-task-sub-categories' ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#!"
                        class="nav-link {{ active_tab1() == 'admin-task-sub-categories' ? 'active' : '' }}">
                        <i class="nav-icon far fa-hospital"></i>
                        <p>
                            Task Sub Categories
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.task.sub.categories.index') }}"
                                class="nav-link {{ active_tab2() == 'admin.task.sub.categories.index' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Task Sub Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.task.sub.categories.create') }}"
                                class="nav-link {{ active_tab2() == 'admin.task.sub.categories.create' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Task Sub Category</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
