  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset( Auth::user()->picture ) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('admin.profile') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          {{-- <li class="nav-item active">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::is('admin') ? 'active' : '' }} {{ Route::is('admin.dashboard') ? 'active' : '' }}">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li> --}}
          <li class="nav-item active">
          <a href="{{ route('posts.list') }}" class="nav-link {{ (Route::is('posts.list') || Route::is('posts.create') || Route::is('posts.edit') || Route::is('posts.images')) ? 'active' : '' }}">
              <i class="nav-icon fa fa-newspaper-o"></i>
              <p>
                Posts
              </p>
            </a>
          </li>
          <li class="nav-item active">
            <a href="{{ route('categories.list') }}" class="nav-link {{ (Route::is('categories.list') || Route::is('categories.create') || Route::is('categories.edit') ) ? 'active' : '' }}">
              <i class="nav-icon fa fa-tag"></i>
              <p>
                Categories
              </p>
            </a>
          </li>
          <li class="nav-item active">
            <a href="{{ route('pages.list') }}" class="nav-link {{ (Route::is('pages.list') || Route::is('pages.create') || Route::is('pages.edit') || Route::is('pages.view') ) ? 'active' : '' }}">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Pages
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview {{ (Route::is('admin.settings') || Route::is('admin.profile') || Route::is('menu.list') || Route::is('menu.create') || Route::is('menu.edit')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-gear"></i>
              <p>
                Settings
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.settings') }}" class="nav-link {{ (Route::is('admin.settings')) ? 'active' : '' }}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>General</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('menu.list') }}" class="nav-link {{ (Route::is('menu.list') || Route::is('menu.create') || Route::is('menu.edit')) ? 'active' : '' }}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.profile') }}" class="nav-link {{ (Route::is('admin.profile')) ? 'active' : '' }}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item active">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="nav-icon fa fa-sign-out"></i> 
                <p> {{ __('Logout') }}</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>