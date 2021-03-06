<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Fuad Amahoru</p>

          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div> -->
      <!-- <div class="container">
             <p class="text-warning" style="font-size:3rem; height:5rem; line-height:5rem">{{$admin}}</p>
      </div> -->

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU :</li>
        <!-- Optionally, you can add icons to the links -->
        @if(Request::is('admin')||Request::is('admin/adminReports'))
        <li class="active"><a href="{{url('/admin/adminReports')}}"><i class="fa fa-warning"></i> <span>Report</span></a></li>
        <li><a href="{{url('admin/preferences')}}"><i class="fa fa-user-plus"></i> <span>Preferences</span></a></li>
        @endif
        @if(Request::is('admin/preferences'))
        <li><a href="{{url('/admin/adminReports')}}"><i class="fa fa-warning"></i> <span>Report</span></a></li>
        <li class="active"><a href="{{url('admin/preferences')}}"><i class="fa fa-user-plus"></i> <span>Preferences</span></a></li>
        @endif
       <!--  <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li> -->
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
