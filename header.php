<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Perpustakaan | SKK Migas</title>

    <link rel="icon" href="images/icon.jpg" type="image/x-icon">


    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.min.css"> 
    <!-- Ionicons -->
    <link rel="stylesheet" href="ionicons-2.0.1/css/ionicons.min.css"> 
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    
  </head>
  <body class="hold-transition skin-yellow layout-boxed sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>SKK</b>M</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SKK Migas </b>Perpus</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
             
              <?php
                if(empty($_SESSION['userid'])){
                    echo '<li>
                          <a href="login.html"><i class="fa fa-user"></i> Login</a>
                        </li>';

                }else{





              ?>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="images/logo.jpg" class="user-image">
                  <span class="hidden-xs"><?php echo $_SESSION['vName']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="images/logo.jpg" class="img-circle">
                    <p>
                      <?php echo $_SESSION['vName'];  ?>
                      <small>Member since  <?php echo date('M Y',strtotime($_SESSION['tgl_daftar']));  ?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                 
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="index.php?action=8" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="login_out.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>


              <?php  } ?>
              <!-- Control Sidebar Toggle Button -->
              
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->

          <?php
            if(empty($_SESSION['userid'])){
                

              }else{
                    $image = $_SESSION['foto'];
                  echo ' <div class="user-panel">
                        <div class="pull-left image">
                          <img src="images/logo.jpg" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                          <p>'.$_SESSION["vName"].'</p>
                          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                      </div>';

              }

          ?>
         
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            <li class="treeview">
              <a href="index.php">
                <i class="fa fa-dashboard"></i> <span>Home</span>
              </a>
              
            </li>
			
            <?php
              if ($_SESSION['userid']!= ''){

                  $sql = "SELECT COALESCE(SUM(qty),0) AS qty FROM tmp_keranjang WHERE  kdanggota='".$userid."' ";
                  $query = mysqli_query($conn,$sql);
                  $r = mysqli_fetch_array($query);
                  $qty = $r['qty'];
                  echo '<li><a href="index.php?action=3"><i class="fa fa-cart-plus"></i> Keranjang Buku
                            <span id="total_keranjang" class="label label-warning pull-right">'.$qty.'</span></a>
                        </li>';
              }
            ?>
            <li><a href="index.php?action=7"><i class="fa fa-shield"></i> Peraturan Peminjaman</a></li>
            <li><a href="index.php?action=1"><i class="fa fa-reorder"></i> Daftar Buku</a></li>
            
            
			
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Jenis Buku</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <?php  
                    $sql = "SELECT * FROM jenis ORDER BY nmjenis ASC";
                    $result = mysqli_query($conn,$sql);
                    while ($data = mysqli_fetch_array($result)){
                        $id = $data['kdjenis'];
                      echo '<li><a href="index.php?action=2&jenis='.$id.'"><i class="fa fa-circle-o"></i>'.$data["nmjenis"].'</a></li>';
                    }
                ?>
          
              </ul>
            </li>
			
			       <?php
              if ($_SESSION['userid']!= ''){
                  ?>
                      <li class="treeview">
                    <a href="#">
                      <i class="fa fa-bar-chart"></i>
                      <span>Transaction</span>
                      <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="index.php?action=4"><i class="fa fa-circle-o"></i> List Peminjaman</a></li>
                    </ul>
                  </li>


                  <?php
                 
              }
            ?>
            
            
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->