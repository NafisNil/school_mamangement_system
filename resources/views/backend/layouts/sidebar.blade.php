<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('backend') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ @Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">

              </li>

            </ul>
          </li>

          <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Content
                <i class="fas fa-angle-left right"></i>
                @php
                $prefix = Request::route()->getPrefix();
                $route = Request::route()->getName();
                @endphp
              </p>
            </a>
            <ul class="nav nav-treeview">

              @if (Auth::user()->user_type == 1)
              <li class="nav-item menu-is-opening menu-open">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{$route == 'admin.dashboard'?'active':''}}" >
                  <i class="far fa-user nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li> 
              <li class="nav-item menu-is-opening menu-open">
                <a href="{{ route('admin.list') }}" class="nav-link {{$route == 'admin.list'?'active':''}}" >
                  <i class="far fa-user nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li> 

              <li class="nav-item menu-is-opening menu-open">
                <a href="{{ route('class.list') }}" class="nav-link {{$route == 'class.list'?'active':''}}" >
                  <i class="far fa-user nav-icon"></i>
                  <p>Class</p>
                </a>
              </li> 

              <li class="nav-item menu-is-opening menu-open">
                <a href="{{ route('subject.list') }}" class="nav-link {{$route == 'subject.list'?'active':''}}" >
                  <i class="far fa-user nav-icon"></i>
                  <p>Subject</p>
                </a>
              </li> 

              <li class="nav-item menu-is-opening menu-open">
                <a href="{{ route('assign_subject.list') }}" class="nav-link {{$route == 'assign_subject.list'?'active':''}}" >
                  <i class="far fa-user nav-icon"></i>
                  <p>Assign Subject</p>
                </a>
              </li> 


              
              @elseif(Auth::user()->user_type == 2)
              <li class="nav-item menu-is-opening menu-open">
                <a href="{{ route('teacher.dashboard') }}" class="nav-link {{$route == 'teacher.dashboard'?'active':''}}" >
                  <i class="far fa-user nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li> 
              @elseif(Auth::user()->user_type == 3)
              <li class="nav-item menu-is-opening menu-open">
                <a href="{{ route('student.dashboard') }}" class="nav-link {{$route == 'student.dashboard'?'active':''}}" >
                  <i class="far fa-user nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li> 
              @elseif(Auth::user()->user_type == 4)
              <li class="nav-item menu-is-opening menu-open">
                <a href="{{ route('parent.dashboard') }}" class="nav-link {{$route == 'parent.dashboard'?'active':''}}" >
                  <i class="far fa-user nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li> 
              @endif

              
              <li class="nav-item menu-is-opening menu-open">
                <a href="{{ route('logout.user') }}" class="nav-link" >
                  <i class="far fa-user nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li> 
            </ul>
          </li>

          <li class="nav-header">EXAMPLES</li>
 
          <li class="nav-header">MISCELLANEOUS</li>

          <li class="nav-header">MULTI LEVEL EXAMPLE</li>

          <li class="nav-header">LABELS</li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>