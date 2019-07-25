
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      {{--  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/web">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Expense Manager</div>
      </a>  --}}

      <hr class="sidebar-divider d-md-block">
      <div class="text-center d-none d-md-inline text-white" style="margin-bottom: 1rem;">
        <img src="https://via.placeholder.com/120" alt="" class="rounded-circle img-thumbnail">
      </div>

      <div class="text-center d-none d-md-inline text-white" style="margin-bottom: 1rem;">
          <p style="margin:0;padding:0 7px;">{{ \Auth::user()->name }}</p>
          <small style="padding:0 7px;">
              <em>{{ isset(\Auth::user()->role) ? '('.\Auth::user()->role->display_name.')' : '' }}</em>
          </small>
      </div>
      
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item {{ (\Request::route()->getName() == 'dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

        @if(\Auth::user()->role->is_admin)

            <div class="sidebar-heading" style="color:white;font-weight:bold;margin-left:10px;">
                User Management
            </div>

            <li class="nav-item {{ (Request::segment(1) == 'users') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('users.index') }}" style="padding-bottom:0;">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span></a>
            </li>

            <li class="nav-item {{ (Request::segment(1) == 'roles') ? 'active' : '' }}" style="padding-top:0;">
                <a class="nav-link" href="{{ route('roles.index') }}">
                    <i class="fas fa-fw fa-user-cog"></i>
                    <span>Roles</span></a>
            </li>
            
        @endif
        <div class="sidebar-heading" style="color:white;font-weight:bold;margin-left:10px;">
            Expense Management
        </div>

        <li class="nav-item {{ (Request::segment(1) == 'expenses') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('expenses.index') }}" style="padding-bottom:0;">
                <i class="fas fa-fw fa-id-card"></i>
                <span>Expenses</span>
            </a>
        </li>

        @if(\Auth::user()->role->is_admin)

            <li class="nav-item {{ (Request::segment(2) == 'categories') ? 'active' : '' }}" style="padding-top:0;">
                <a class="nav-link" href="{{ route('categories.index') }}">
                    <i class="fas fa-fw fa-user-cog"></i>
                    <span>Expense Categories</span></a>
            </li>

        @endif

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">


    </ul>
    <!-- End of Sidebar -->