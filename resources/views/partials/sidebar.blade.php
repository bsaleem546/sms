<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <img src="{{ url('public/assets/images/users/1.jpg')  }}" alt="user-img" class="img-circle">
                        <span class="hide-menu">{{ Auth::user()->name }}</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off"></i> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>

                @can('role-list')
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="ti-anchor"></i>
                            <span class="hide-menu">Roles Management</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('roles.index') }}">All Roles</a>
                                <a href="{{ route('roles.create') }}">Create Role</a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('department-list')
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="ti-layout-grid2"></i>
                            <span class="hide-menu">Department Management</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('departments.index') }}">All Department</a>
                                <a href="{{ route('departments.create') }}">Create Department</a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('user-list')
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="ti-user"></i>
                            <span class="hide-menu">Users Management</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('users.index') }}">All Users</a>
                                <a href="{{ route('users.create') }}">Create User</a>
                            </li>
                        </ul>
                    </li>
                @endcan

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
