<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

<div class="wrapper">

  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ asset('access') }}/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">


            <img src="images/logo1.jpg" alt=" Logo " class="brand-image img-circle elevation-3" style="opacity: .8; width:11em;">

          <div style="margin-top: 4px;" class="sidebar">


            <nav class="mt-2">


            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


              <li class="nav-item">
                      <a href="{{route('dossier.index')}}" class="nav-link">
                        <i class="fas fa-home"></i>
                        <p style="margin-left: 00px;"> HOME </p>
                      </a>
                   </li>

             <li class="nav-item">

            </nav>

           </div>

          </aside>
        </div>

<br>


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          <span style="margin-left: 440px; margin-top: -50px;" class="brand-text font-weight-light;"><h1 style="text-align: center" > Bienvenue </h1></span>


          <!-- SidebarSearch Form -->
      <div style="margin-left: 400px;" class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input style="text-align: center" class="form-control form-control-sidebar" type="search" placeholder="Rechercher.." aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
       </div>
      </div>
           <!-- /.col -->
          <div class="col-sm-6">

          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

@yield('content')
