<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cagitech Dashboard</title>

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,300;0,400;1,400&family=Nunito:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper" id="app">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">


        <li class="nav-item">
          <a href="#" class="nav-link" data-toggle="modal" data-target="#modelId"> <i class="fas fa-power-off  text-danger  "></i></a>
          <!-- <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                         <i class="fas fa-power-off  text-danger  "></i>
          </a> -->

          <!-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form> -->
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Logout modal -->
    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
    Launch
  </button> -->

    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-danger"><i class="fas fa-lock  mr-3  "></i> <strong>End session</strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{ route('logout') }}" method="post">
            @csrf
            <div class="modal-body">
              <div class="container-fluid">
                <strong class="text-info">Are you sure you want to logout ?</strong>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">No,close</button>
              <button type="submit" class="btn btn-danger">Yes,Logout</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Logout modal -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="" class="brand-link">
        <img src="{{asset('resources/imgs/logo 1.svg')}}" alt="Cagitech Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">CAGITECH</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{asset('resources/imgs/caxton.png')}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <router-link to="/profile">{{Auth::user()->name}}</router-link>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
              <router-link to="/home" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt cyan"></i>
                <p>
                  Cagitech Dash
                  <i class="right fas fa-angle-left"></i>
                </p>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link to="/home" class="nav-link">
                <i class="fas fa-chart-area  indigo nav-icon "></i>
                <p>
                  System Stats
                  <span class="right badge badge-danger">New</span>
                </p>
              </router-link>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy teal"></i>
                <p>
                  Services
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right">6</span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <router-link to="/services" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Management</p>
                </router-link>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fab fa-creative-commons-share  purple  "></i>
                <p>
                  Technologies
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link to="/techs" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Management</p>
                  </router-link>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie blue"></i>
                <p>
                  Testimonials
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link to="/testimonies" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Management</p>
                  </router-link>
                </li>
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="fa fa-users nav-icon orange" aria-hidden="true"></i>
                <p>
                  Users Management
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link to="/users" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage</p>
                  </router-link>
                </li>

              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="fas fa-envelope-open nav-icon teal   "></i>
                <p>
                  Messages
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link to="/inbox" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Inbox</p>
                  </router-link>
                </li>
              </ul>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper cntnt">

      <router-view></router-view>
      <vue-progress-bar></vue-progress-bar>

    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2021 <a href="http://cagifire.ml">CAGITECH</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.1
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->


  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>