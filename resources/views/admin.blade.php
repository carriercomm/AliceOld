<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="UTF-8">
    <title>Admin Panel - {{ App\Setting::find('sitename')->value }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/skins/skin-black.min.css" rel="stylesheet" type="text/css" />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-black sidebar-mini">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="/" class="logo">
          <span class="logo-mini"><b>A</b>P</span>
          <span class="logo-lg"><b>Admin</b> Panel</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="https://secure.gravatar.com/avatar/{{ md5(Auth::user()->email) }}?s=160" class="user-image" alt="User Image"/>
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="https://secure.gravatar.com/avatar/{{ md5(Auth::user()->email) }}?s=160" class="img-circle" alt="User Image" />
                    <p>
                      {{ Auth::user()->name }}
                      <small>注册于 {{ Auth::user()->created_at->toDateString() }}</small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="/" class="btn btn-default btn-flat">返回前台</a>
                    </div>
                    <div class="pull-right">
                      <a href="/auth/logout" class="btn btn-default btn-flat">退出</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="https://secure.gravatar.com/avatar/{{ md5(Auth::user()->email) }}?s=160" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>{{ Auth::user()->name }}</p>
              <!-- Status -->
              <a href="javascript:void(0);"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">MAIN MENU</li>
            <li @if (Request::is('admin')) class="active" @endif><a href="/admin"><i class="fa fa-dashboard"></i> <span>管理面板首页</span></a></li>
            <li @if (Request::is('admin/announcement*')) class="active" @endif><a href="/admin/announcement"><i class="fa fa-bullhorn"></i> <span>系统公告</span></a></li>

            <li class="header">SERVER</li>
            <li @if (Request::is('admin/server*')) class="active" @endif><a href="/admin/server"><i class="fa fa-server"></i> <span>服务器列表</span></a></li>
            <li @if (Request::is('admin/domain')) class="active" @endif><a href="/admin/domain"><i class="fa fa-globe"></i> <span>已绑定域名</span></a></li>
            
            <li class="header">HOSTING</li>
            <li @if (Request::is('admin/hosting*')) class="active" @endif><a href="/admin/hosting"><i class="fa fa-tasks"></i> <span>主机列表</span></a></li>
            
            <li class="header">MEMBER</li>
            <li @if (Request::is('admin/user*')) class="active" @endif><a href="/admin/user"><i class="fa fa-users"></i> <span>用户列表</span></a></li>
            
            <li class="header">TICKET</li>
            <li @if (Request::is('admin/ticket')) class="active" @endif><a href="/admin/ticket"><i class="fa fa-reply"></i> <span>待回复工单</span></a></li>
            <li @if (Request::is('admin/ticket/all')) class="active" @endif><a href="/admin/ticket/all"><i class="fa fa-archive"></i> <span>全部工单</span></a></li>
            
            <li class="header">SETTING</li>
            <li @if (Request::is('admin/setting-basic')) class="active" @endif><a href="/admin/setting-basic"><i class="fa fa-cog"></i> <span>基本设置</span></a></li>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        @yield('content')
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          Powered by Alice Panel {{ ALICE_VERSION }} by <a href="http://tokiya.me" target="_blank">Tokiya Kurosaki</a>.
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; {{ date("Y") }} <a href="{{ App\Setting::find('siteurl')->value }}" target="_blank">{{ App\Setting::find('sitename')->value }}</a>.</strong> All rights reserved.
      </footer>
      <div class='control-sidebar-bg'></div>
    </div><!-- ./wrapper -->

    <script src="/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/assets/js/app.min.js" type="text/javascript"></script>
  </body>
</html>
