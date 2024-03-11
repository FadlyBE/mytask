<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">

      <li class="{{request()->is('home') ? 'active' : ''}}">
        <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
      </li>

      @if(Auth::user()->role_id == 1)
      <li class="{{request()->is('user') ? 'active' : ''}}">
        <a href="{{url('/user')}}">
          <i class="fa fa-user"></i> <span>Users</span>
        </a>
      </li>
      @endif()

      <li class="">
        <a href="{{url('/pegawai')}}">
          <i class="fa fa-user"></i> <span>Data Pegawai</span>
        </a>
      </li>

      <li class="treeview">
        <a href="#" onclick="$('#logout-form').submit()">
          <i class="fa fa-share"></i> <span>Sign Out</span>
        </a>
      </li>

      <form action="{{ url('/logout') }}" method="POST" id="logout-form" style="display: none;">
        @csrf
      </form>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>