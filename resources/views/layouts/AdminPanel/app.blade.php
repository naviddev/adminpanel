<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{url("bootstrap/css/bootstrap.min.css")}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url("css/font-awesome.min.css")}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{url('/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url("dist/css/AdminLTE.min.css")}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{url("dist/css/skins/_all-skins.min.css")}}">

    <link rel="stylesheet" href="{{url("plugins/jvectormap/jquery-jvectormap-1.2.2.css")}}">

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{url("plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css")}}">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b></b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b></b>Dashboard</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            @if(session()->has('sam'))
                <div class="alert alert-{{session('session_admin_type')}} alert-dismissible"style=" height: 32px;padding: 4px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                    {{session('sam')}}
                </div>
            @endif
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->

                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">{{mailc(Auth::guard('admin')->user()->mails)}}</span>
                        </a>

                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->

                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">{{notifyc(Auth::guard('admin')->user()->mails)}}</span>
                        </a>

                    </li>
                    <!-- Tasks: style can be found in dropdown.less -->
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger">{{warningc(Auth::guard('admin')->user()->mails)}}</span>
                        </a>

                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{url('uploads\AdminPic/'.Auth::guard('admin')->user()->username.'.jpg')}}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ Auth::guard('admin')->user()->username }}  </span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{url('uploads\AdminPic/'.Auth::guard('admin')->user()->username.'.jpg')}}" class="img-circle" alt="User Image">

                                <p>
                                    {{ Auth::guard('admin')->user()->FName." ".  Auth::guard('admin')->user()->LName  }}
                                    <small>super admin</small>
                                </p>
                            </li>
                            <!-- Menu Body -->

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{url('/admin/setting')}}" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url('/admin/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>

                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">

                </div>
                <div class="pull-left info">


                </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active treeview">
                    <a href="{{url("/admin")}}">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa "></i>
            </span>
                    </a>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-file-text-o"></i>
                        <span>Posts</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
                    </a>

                        <ul class="treeview-menu">
                            <li><a href="{{url('/admin/posts')}}"><i class="fa fa-th-list"></i> Posts List</a></li>

                            <li><a href="{{url('/admin/postAdd')}}"><i class="fa fa-plus"></i> Add Post</a></li>


                        </ul>

                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-comments"></i>
                        <span>Comments</span>
            <span class="pull-right-container">
                <span class="label label-primary pull-right">{{commentCount('unseen')}}</span>
              <span class="label label-primary pull-right"></span>
            </span>
                    </a>

                    <ul class="treeview-menu">
                        <li><a href="{{url('/admin/comments')}}"><i class="fa fa-th-list"></i> All Comment</a></li>

                        <li><a href="{{url('/admin/comments/new')}}"><i class="fa fa-square-o"></i> New Comments</a></li>
                        <li><a href="{{url('/admin/comments/seen')}}"><i class="fa fa-check-square-o"></i> old Comments</a></li>


                    </ul>

                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa  fa-users"></i>
                        <span>Users</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
                    </a>
                     @if(Auth::guard('admin')->user()->SuperAdmin)
                    <ul class="treeview-menu">
                        <li><a href="{{url('admin/users')}}"><i class="fa fa-th-list"></i> User List</a></li>

                        <li><a href="{{url('/admin/Users/delete')}}"><i class="fa fa-user-times"></i> Delete User</a></li>
                        <li><a href="{{url('/admin/Users/Vip')}}"><i class="fa fa-key"></i> Vip User</a></li>
                    </ul>
                        @endif
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user-secret"></i>
                        <span>Admins</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{url("/superadmin")}}"><i class="fa fa-th-list"></i> Admins panel</a></li>

                        <li><a href="{{url("/superadmin/newadmin")}}"><i class="fa fa-user-plus"></i> Add Admin</a></li>
                        <li><a href="{{url('/superadmin/delete')}}"><i class="fa fa-user-times"></i> Delete Admin</a></li>
                        <li><a href="{{url('/superadmin/feature')}}"><i class="fa fa-key"></i>  Admin feature</a></li>
                    </ul>
                </li>
                <li class="treeview active">
                    <a href="{{url("/admin/mail/inbox")}}">
                        <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <i class=""></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active">
                            <a href="{{url("/admin/mail/inbox")}}">Inbox
                <span class="pull-right-container">
                  <span class="label label-primary pull-right">{{counter(Auth::guard('admin')->user()->mails)}}</span>
                </span>
                            </a>
                        </li>
                        <li><a href="{{url('/admin/mail/compose')}}">Compose</a></li>
                        <li><a href="{{url('/admin/read')}}">Read</a></li>
                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
@yield('content')
    </div>


    </section>
    <!-- /.content -->

    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{url("plugins/jQuery/jquery-2.2.3.min.js")}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url("https://code.jquery.com/ui/1.11.4/jquery-ui.min.js")}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{url("bootstrap/js/bootstrap.min.js")}}"></script>



<!-- Bootstrap WYSIHTML5 -->
<script src="{{url("plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js")}}"></script>
<!-- Slimscroll -->

<!-- FastClick -->
<script src="{{url("plugins/fastclick/fastclick.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{url("dist/js/app.min.js")}}"></script>




<script>
    $('div.alert').delay(1500).slideUp(300);
</script>
</body>
</html>
