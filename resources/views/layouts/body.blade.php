<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Suivit des cautions</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('access') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('access') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('access') }}/css/adminlte.min.css">

   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="{{ asset('access') }}/plugins/fontawesome-free/css/all.min.css">
   <!-- Ionicons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- Tempusdominus Bootstrap 4 -->
   <link rel="stylesheet" href="{{ asset('access') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
   <!-- iCheck -->
   <link rel="stylesheet" href="{{ asset('access') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <!-- JQVMap -->
   <link rel="stylesheet" href="{{ asset('access') }}/plugins/jqvmap/jqvmap.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="{{ asset('access') }}/css/adminlte.min.css">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="{{ asset('access') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="{{ asset('access') }}/plugins/daterangepicker/daterangepicker.css">
   <!-- summernote -->
   <link rel="stylesheet" href="{{ asset('access') }}/plugins/summernote/summernote-bs4.min.css">

</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        <span style="margin-left:340px; margin-top: 0px;" class="brand-text font-weight-light;"><h1 style="text-align: center; color: black" > SUIVI DES CAUTIONS </h1></span>
        <img class="animation__wobble" src="{{ asset('access') }}/img/afrik.png" alt="Suivit_Caution" height="70" width="100">

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

          <!-- Messages Dropdown Menu -->

          <!-- Notifications Dropdown Menu -->

          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
        </ul>
      </nav>


<div class="wrapper">

  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ asset('access') }}/img/afrik.png" alt="Suivit_Logo" height="60" width="60">
  </div>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">

          <div style="margin-top: 4px;" class="sidebar">


            <nav class="mt-2">


            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


              <li class="nav-item">
                      <a href="{{ route('caution.prevenir') }}" class="nav-link">
                        <i class="fas fa-home"></i>
                        <p style="margin-left: 00px;"> HOME </p>
                      </a>
                   </li>

                   <li class="nav-item">
                    <a href="{{ route('dossier.index') }}" class="nav-link">
                      <i class="fas fa-folder"></i>
                      <p style="margin-left: 00px;"> DOSSIER </p>
                    </a>
                 </li>

                 <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-balance-scale"></i>
                      <p>
                        Bilan
                        <i class="fas fa-angle-left right"></i>
                        <span class="badge badge-info right">2</span>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('bilan.dossier') }}" class="nav-link">
                              <i class="fas fa-wallet"></i>
                              <p>Bilan par dossier</p>
                            </a>
                          </li>
                      <li class="nav-item">
                        <a href="" class="nav-link">
                          <i class="far fa-arrow-alt-circle-down"></i>
                          <p>General
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info warning">5</span>
                          </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('caution.bilanGeneral') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Toutes les cautions</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ route('caution.bilansoumission') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Cautions de soumission</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ route('caution.bilanretenue') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Cautions de retenue de garantie</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ route('caution.bilanrestitution') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Cautions de Restitution</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ route('caution.bilanfin') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Cautions de bonne fin</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ route('bilan.credit') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Cautions avec ligne de credit</p>
                                </a>
                              </li>
                        </ul>
                      </li>
                      <li class="nav-item">
                        <a href="/selection" class="nav-link">
                          <i class="far fa-arrow-alt-circle-down"></i>
                          <p>Sur une periode
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info warning">5</span>
                          </p>
                        </a>
                        @php
                            $total="GENERAL";
                            $soumission="SOUMISSION";
                            $restitution="RESTITUTION";
                            $fin="FIN";
                            $retenue="RETENUE";
                        @endphp
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('selection',[$total]) }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Toutes les cautions</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ route('selection',[$soumission]) }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Cautions de soumission</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ route('selection',[$retenue]) }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Cautions de retenue de garantie</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ route('selection',[$restitution]) }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Cautions de Restitution</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ route('selection',[$fin]) }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Cautions de bonne fin</p>
                                </a>
                              </li>

                        </ul>
                      </li>
                    </ul>
                 </li>

                 <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-copy"></i>
                      <p>
                        Liste
                        <i class="fas fa-angle-left right"></i>
                        <span class="badge badge-success right">6</span>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{ route('liste.caution') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Liste des cautions</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('liste.lot') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Liste des lots</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('liste.objet') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Liste des Objets</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('liste.appel') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Liste des Appels</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('caution.credit') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>cautions avec ligne de credit</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('caution.libre') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>cautions sans ligne de credit</p>
                        </a>
                      </li>
                    </ul>
                 </li>
                 <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                      <p>
                        Prérequis
                        <i class="fas fa-angle-left right"></i>
                        <span class="badge badge-success right">1</span>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{route('garant.index')}}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Institution financière</p>
                        </a>
                      </li>
            </nav>

           </div>

          </aside>
        </div>


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div id="app">

<search-component></search-component>

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


@yield('content')


