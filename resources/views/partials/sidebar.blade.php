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
                            <a href="{{ route('users.profile') }}">
                                <i class="fa mdi-face-profile"></i> Profile
                            </a>
                        </li>
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
                            <i class="ti-plus"></i>
                            <span class="hide-menu">Roles</span>
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
                            <i class="ti-plus"></i>
                            <span class="hide-menu">Departments</span>
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
                            <i class="ti-plus"></i>
                            <span class="hide-menu">Users</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('users.index') }}">All Users</a>
                                <a href="{{ route('users.create') }}">Create User</a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('section-list')
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="ti-plus"></i>
                            <span class="hide-menu">Sections</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('sections.index') }}">All Sections</a>
                                <a href="{{ route('sections.create') }}">Create Section</a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('class-list')
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="ti-plus"></i>
                            <span class="hide-menu">Classes</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('classes.index') }}">All Classes</a>
                                <a href="{{ route('classes.create') }}">Create Classes</a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('student-list')
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="ti-plus"></i>
                            <span class="hide-menu">Students</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('students.index') }}">All Students</a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('subject-list')
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="ti-plus"></i>
                            <span class="hide-menu">Subjects</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('subjects.index') }}">All Subjects</a>
                                <a href="{{ route('subjects.create') }}">Create Subject</a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('staff-list')
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="ti-plus"></i>
                            <span class="hide-menu">Staffs</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('staffs.index') }}">All Staffs</a>
                                <a href="{{ route('staffs.create') }}">Create Staff</a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('teacher-list')
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="ti-plus"></i>
                            <span class="hide-menu">Teachers</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('teachers.index') }}">All Teachers</a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('reg-list')
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="ti-plus"></i>
                            <span class="hide-menu">Registrations</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('registrations.students') }}">All Registrations</a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('admission-list')
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="ti-plus"></i>
                            <span class="hide-menu">Admissions</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('admission.index') }}">All Admissions</a>
                                <a href="{{ route('admission.create') }}">Create Admission</a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('transfer-list')
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="ti-plus"></i>
                            <span class="hide-menu">Transfers</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('transfers.index') }}">All Transfers</a>
                                <a href="{{ route('transfers.create') }}">Create Transfers</a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('transport-list')
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="ti-plus"></i>
                            <span class="hide-menu">Transports</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('transports.index') }}">All Transports</a>
                                <a href="{{ route('transports.create') }}">Create Transport</a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('troute-list')
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="ti-plus"></i>
                            <span class="hide-menu">Routes</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('transport-routes.index') }}">All Routes</a>
                                <a href="{{ route('transport-routes.create') }}">Create Route</a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('session-list')
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="ti-plus"></i>
                            <span class="hide-menu">Sessions</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('yearly-session.index') }}">All Sessions</a>
                                <a href="{{ route('yearly-session.create') }}">Create Sessions</a>
                            </li>
                        </ul>
                    </li>
                @endcan


                @can('fee-list')
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="ti-plus"></i>
                            <span class="hide-menu">Fees</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('fees.index') }}">All Fees</a>
                                <a href="{{ route('fees.create') }}">Create Fee</a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('s_att-list')
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="ti-plus"></i>
                            <span class="hide-menu">Student Attendance</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('s_atd.list') }}">View Attendance</a>
                                <a href="{{ route('s_atd.create') }}">Attendance</a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('st_atd-list')
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="ti-plus"></i>
                            <span class="hide-menu">Staff Attendance</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('staff-attendance.index') }}">View Attendance</a>
                                <a href="{{ route('staff-attendance.create') }}">Create Attendance</a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('salary-list')
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="ti-plus"></i>
                            <span class="hide-menu">Staff Salary</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('salaries.index') }}">View Staff Salary</a>
                                <a href="{{ route('salaries.create') }}">Create Staff Salary</a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('expense-list')
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="ti-plus"></i>
                            <span class="hide-menu">Expenses</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('expenses.index') }}">View Expenses</a>
                                <a href="{{ route('expenses.create') }}">Create Expenses</a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('expense-list')
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="ti-plus"></i>
                            <span class="hide-menu">Notices</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('notices.index') }}">View Notices</a>
                                <a href="{{ route('notices.create') }}">Create Notice</a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('result-list')
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="ti-plus"></i>
                            <span class="hide-menu">Exam Result</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('results.index') }}">View Result</a>
                                <a href="{{ route('results.create') }}">Create Result</a>
                            </li>
                        </ul>
                    </li>
                @endcan


                @can('student-leave-list')
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="ti-plus"></i>
                            <span class="hide-menu">Student Leave</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('student-leaves.index') }}">View Student Leave</a>
                                <a href="{{ route('student-leaves.create') }}">Create Student Leave</a>
                            </li>
                        </ul>
                    </li>
                @endcan


                @can('staff-leave-list')
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="ti-plus"></i>
                            <span class="hide-menu">Staff Leave</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('staff-leaves.index') }}">View Staff Leave</a>
                                <a href="{{ route('staff-leaves.create') }}">Create Staff Leave</a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('live-class-list')
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="ti-plus"></i>
                            <span class="hide-menu">Live Classes</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('live-classes.index') }}">View Live Classes</a>
                                <a href="{{ route('live-classes.create') }}">Create Live Classes</a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('study-material-list')
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="ti-plus"></i>
                            <span class="hide-menu">Study Material</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('study-materials.index') }}">View Study Material</a>
                                <a href="{{ route('study-materials.create') }}">Create Study Material</a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('time-table-list')
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="ti-plus"></i>
                            <span class="hide-menu">Time Tables</span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a href="{{ route('time-tables.index') }}">View Time Tables</a>
                                <a href="{{ route('time-tables.create') }}">Create Time Tables</a>
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
