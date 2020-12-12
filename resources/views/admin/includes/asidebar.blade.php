<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="../../index3.html" class="brand-link">
            <img src="{{ asset('images/srsogo.png') }}"
                 alt="SRS Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light"></span>
        </a>

        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
{{--                <a href="#" class="d-block">{{Auth::user('admin')->name}}</a>--}}
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="{{route('admin.home')}}" class="nav-link">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="{{route('admin.category')}}" class="nav-link">
                        <i class="nav-icon fa fa-th"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.job-details')}}" class="nav-link">
                        <i class="nav-icon fa fa-tree"></i>
                        <p>
                            Job Details
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.jobs-criteria') }}" class="nav-link">
                        <i class="nav-icon fa fa-tree"></i>
                        <p>
                            Job Criteria
                        </p>
                    </a>
                </li>


                <li class="nav-item has-treeview">
                    <a href="{{route('admin.cv-list')}}" class="nav-link">
                        <i class="nav-icon fa fa-pie-chart"></i>
                        <p>
                            Manage CV
                            <i class="right fa fa-arrow-circle-left"></i>
                        </p>
                    </a>

                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('admin.shortlisted.cv')}}" class="nav-link">
                        <i class="nav-icon fa fa-tree"></i>
                        <p> Shortlisted CV</p>
                    </a>

                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
