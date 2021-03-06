  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link navbar-purple">
      <img src="{{asset('images/logo-white.png')}}" alt="AdminLTE Logo" class="brand-image elevation-3" style="max-height: 27px;">
      <span class="brand-text font-weight-light">Data2Income</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ Storage::exists('profilepicture/'.Auth::user()->id.'.png') ? asset('profilepicture/'.Auth::user()->id.'.png?'.rand())  : asset('dist/img/user.svg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{route('userprofile')}}" class="d-block">{{Auth()->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link">
              <i class="fas fa-tachometer-alt nav-icon"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('userprofile')}}" class="nav-link">
              <i class="far fa-user nav-icon"></i>
              <p>Profile</p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Inactive</p>
            </a>
          </li> -->
          <!-- <li class="nav-item has-treeview menu-open">
            <a href="{{route('dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

            </ul>
          </li> -->
          <li class="nav-item">
            <a href="{{route('availablejobs')}}" class="nav-link">
              <i class="fas fa-lock-open nav-icon"></i>
              <p>Available Jobs</p>
              <span class="right badge badge-danger">{{Auth()->user()->numberOfActiveJobs()}}</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('completedjobs')}}" class="nav-link">
              <i class="fas fa-flag-checkered nav-icon"></i>
              <p>Completed jobs</p>
              <span class="right badge badge-danger">{{Auth()->user()->numberOfCompletedJobs()}}</span>
            </a>
          </li>
          <!-- <li class="nav-item has-treeview menu-open">
            <a href="" class="nav-link ">
              <i class="nav-icon fas fa-hammer"></i>
              <p>
                Jobs
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
            </ul>
          </li> -->



          <li class="nav-item">
            <a href="{{route('paymentrequests')}}" class="nav-link">
              <i class="fas fa-credit-card nav-icon"></i>
              <p>Payment Requests</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('referrals')}}" class="nav-link">
              <i class="fas fa-link nav-icon"></i>
              <p>Referrals</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('user.tickets')}}" class="nav-link">
              <i class="fas fa-hammer nav-icon"></i>
              <p>Disputes</p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="{{route('completedjobs')}}" class="nav-link">
              <i class="fas fa-flag-checkered nav-icon"></i>
              <p></p>
            </a>
          </li> -->


          <!-- <li class="nav-item has-treeview menu-open">
            <a href="" class="nav-link ">
              <i class="nav-icon fas fa-money-bill-alt"></i>
              <p>
                Payments
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

            </ul>
          </li> -->

          @can('isAdmin')
          <!-- <li class="nav-item has-treeview menu-open">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Admin
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
            </ul>
          </li> -->
          <li class="nav-item">
            <a href="{{route('postjob')}}" class="nav-link">
              <i class="fas fa-plus nav-icon"></i>
              <p>Create Job</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('viewusers')}}" class="nav-link">
              <i class="fas fa-users nav-icon"></i>
              <p>View Users</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('settings')}}" class="nav-link">
              <i class="fas fa-cogs nav-icon"></i>
              <p>Settings</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('viewpaymentrequests')}}" class="nav-link">
              <i class="fas fa-eye nav-icon"></i>
              <p>View Requests</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.tickets')}}" class="nav-link">
              <i class="fas fa-eye nav-icon"></i>
              <p>View Disputes</p>
            </a>
          </li>
          @endcan

          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();" class="nav-link">
              <i class="fa fa-power-off nav-icon"></i>
              <p>{{__('Logout')}}</p>
            </a>
          </li>
        </ul>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>