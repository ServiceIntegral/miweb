<?php
require_once('includes/load.php');
$user = current_user();
$i = $user["id"];
$sql = "Select a.id, m.file_name f From alerts a Inner Join media m On m.id = a.idmedia Where iduser = '$i' And status = 'P';";
$alertas = find_by_sql($sql);
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Sistema Archivos - SCIESC</title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="assets/images/">
  <link href="assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="assets/plugins/dropzone/css/dropzone.min.css" rel="stylesheet">
  <!-- Custom Stylesheet -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
  <!--*******************
        Preloader start
    ********************-->
  <div id="preloader">
    <div class="loader">
      <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
      </svg>
    </div>
  </div>
  <!--*******************
        Preloader end
    ********************-->


  <!--**********************************
        Main wrapper start
    ***********************************-->
  <div id="main-wrapper">

    <!--**********************************
            Nav header start
        ***********************************-->
    <div class="nav-header">
      <div class="brand-logo"><a href="index.html"><b><img src="assets/images/logo.png" width="120px" alt=""> </b><span class="brand-title p-5"><img src="assets/images/logo-sciesc-blanco.png" width="120px" alt=""></span></a>
      </div>
      <div class="nav-control">
        <div class="hamburger"><span class="line"></span> <span class="line"></span> <span class="line"></span>
        </div>
      </div>
    </div>
    <!--**********************************
            Nav header end
        ***********************************-->

    <!--**********************************
            Header start
        ***********************************-->
    <div class="header">
      <div class="header-content">
        <div class="header-left">
          <ul>
            <li class="icons position-relative"><a href="javascript:void(0)"><i class="icon-magnifier f-s-16"></i></a>
              <div class="drop-down animated bounceInDown">
                <div class="dropdown-content-body">
                  <div class="header-search" id="header-search">
                    <form action="#">
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-append"><span class="input-group-text"><i class="icon-magnifier"></i></span>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <div class="header-right">
          <ul>
            <li class="icons">
              <a href="javascript:void(0)">
                <i class="mdi mdi-bell"></i>
                <div class="<?php echo count($alertas) > 0 ? 'pulse-css' : ''; ?>"></div>
              </a>
              <div class="drop-down animated bounceInDown dropdown-notfication">
                <div class="dropdown-content-body">
                  <ul>
                    <?php foreach ($alertas as $a) { ?>
                      <li>
                        <a href="javascript:void()">
                          <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="fa fa-check"></i></span>
                          <div class="notification-content">
                            <div class="notification-heading">Archivo Cargado</div>
                            <div class="notification-text text-bold"><?php echo (($pos = strrpos($a["f"], "/")) === false) ? "???" : substr($a["f"], $pos + 1); ?></div>
                          </div>
                        </a>
                        <span class="notify-close" onclick='fA("<?php echo $a["id"]; ?>")'><i class="ti-close ntfy-alrt"></i>
                        </span>
                      </li>
                    <?php } ?>
                    <!-- <li class="text-left"><a href="javascript:void()" class="more-link">Show All
                        Notifications</a> <span class="pull-right"><i class="fa fa-angle-right"></i></span> -->
            </li>
          </ul>
        </div>
      </div>
      </li>
      <li class="icons">
        <a href="javascript:void(0)" class="log-user">
          <span><?php echo remove_junk(ucfirst($user['name'])); ?></span> <i class="fa fa-caret-down f-s-14" aria-hidden="true"></i>
        </a>
        <div class="drop-down dropdown-profile animated bounceInDown">
          <div class="dropdown-content-body">
            <ul>
              <li><a href="logout.php"><i class="icon-power"></i>
                  <span>Logout</span></a>
              </li>
            </ul>
          </div>
        </div>
      </li>
      </ul>
    </div>
  </div>
  </div>
  <!--********************************** Header end ***********************************-->
  <?php if ($session->isUserLoggedIn(true)) : ?>
    <div class="sidebar">
      <?php if ($user['user_level'] === '1') : ?>
        <!-- admin menu -->
        <?php include_once('admin_menu.php'); ?>
      <?php elseif ($user['user_level'] === '2') : ?>
        <!-- Special user -->
        <?php include_once('editor_menu.php'); ?>
      <?php elseif ($user['user_level'] === '3') : ?>
        <!-- User menu -->
        <?php include_once('clientes_menu.php'); ?>
      <?php endif; ?>
    </div>
  <?php endif; ?>