<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap Admin Template</title>


  <!-- Favicons -->

  <!-- Bootstrap core CSS -->

  <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
  <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
  <link rel="stylesheet" href="lib/file-uploader/css/jquery.fileupload.css">
  <link rel="stylesheet" href="lib/file-uploader/css/jquery.fileupload-ui.css">
  <link href="{{ asset('/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">



</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>GStage<span>PFE</span></b></a>
      <!--logo end-->

      <div class="top-menu">
        <ul class="nav pull-right top-menu">
            <li><a  class="logout" href="{{ route('login') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
             {{ __('Logout') }}
         </a>
            </li>
         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf
         </form>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

          <li class="mt">
            <a href="{{ route('Etudiant.index') }}">
              <i class="fa fa-graduation-cap"></i>
              <span>Student</span>
              </a>
          </li>


          <li class="sub-menu">
            <a href="{{ route('Pedagogiqueencadrant.index') }}">
              <i class="fa fa-book"></i>
              <span>Pedagogical supervision</span>
              </a>

          </li>
          <li class="sub-menu">
            <a href="{{ route('CompanyEncadrant.index') }}">
              <i class="fa fa-building"></i>
              <span>Company Supervision</span>
              </a>

          </li>
        </li>
          <li class="sub-menu">

            <a  href="{{ route('Affectation.create') }}">
              <i class="fa fa-comments-o"></i>
              <span>Affecter</span>
              </a>
            <ul class="sub">
              <li><a href="lobby.html">Lobby</a></li>
              <li><a href="chat_room.html"> Chat Room</a></li>
            </ul>
          </li>
          <li>
            <a href="google_maps.html">
              <i class="fa fa-map-marker"></i>
              <span>Google Maps </span>
              </a>
          </li>

            <li >
            <a href="{{ route('Soutenance.create') }}">
              <i class="fa fa-dashboard"></i>
              <span>Soutenance</span>
              </a>
          </li>

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>



<x-alert> </x-alert>
<section class="container">
    @yield('content')
</section>

</body>

</html>
