<?php
session_start();
include('condb.php');
$m_id = $_SESSION['m_id'];
$m_level = $_SESSION['m_level'];
if($m_level!='admin'){
Header("Location: logout.php");
}
$queryemp = "SELECT * FROM tbl_member WHERE m_id=$m_id";
$resultm = mysqli_query($condb, $queryemp) or die ("Error in query: $queryemp " . mysqli_error());
$rowm = mysqli_fetch_array($resultm);  
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-boxed">
    <div class="wrapper">
        <!-- Nav -->
        <nav class="main-header navbar navbar-expand navbar-warning navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="logout.php" class="nav-link">Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /Nav -->
        <!-- aside -->
        <aside class="main-sidebar sidebar-dark-warning elevation-4">
            <a href="index3.html" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light"><b>Checkin-Checkout</b></span>
            </a>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="m_img/<?php echo $rowm['m_img'];?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">
                            <?php echo $rowm['m_title'].$rowm['m_firstname']. ' '.$rowm['m_lastname'];?></a>
                        <br>
                        <a href="#" class="d-block"> Position : <?php echo $rowm['m_position'];?></a>
                        </b>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-user-clock"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="index.html" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List Checkin-Checkout</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header">Other</li>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link">
                                <i class="nav-icon far fa-circle text-danger"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- /aside -->
        <!-- content-wrapper  -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Check-IO ระบบบันทึกเวลาการทำงาน</h1>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <?php
                              $querylist = "SELECT * FROM tbl_check_io as ch_io 
                              INNER JOIN tbl_member as m ON m.m_id = ch_io.m_id  
                              WHERE ch_io.check_id  ORDER BY check_id DESC";
                              $resultlist = mysqli_query($condb, $querylist)  or die("Error:" . mysqli_error($querylist));
                              echo "
                              <div class='card'>
                              <div class='card-header'>
                                <h3 class='card-title'><i class='fas fa-table'></i> ตารางลงเวลาเข้า-ออกงาน</h3>
                              </div>
                              <div class='card-body p-0'>
                              <table class='table table-striped'>
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Name</th>
                                  <th>Date</th>
                                  <th>Check In</th>
                                  <th>Check Out</th>
                                </tr>
                                </thead>
                                ";
                                foreach ($resultlist as $value) {
                                echo "<tr>";
                                  echo "<td>".'CH'.$value["check_id"] ."</td>";
                                  echo "<td>" .$value["m_title"] .''.$value["m_firstname"] .' '.$value["m_lastname"] ."</td> ";
                                  echo "<td>" .date('l : d-m-Y', strtotime($value["checkdate"])).  "</td> ";
                                  echo "<td>" .$value["checkin"] .  "</td> ";
                                  echo "<td>" .$value["checkout"] .  "</td> ";
                                echo "</tr>";
                                }
                              echo '</table>';
                            ?>
                        </div>
                    </div>
                </div>
              </div>
            </section>
        </div>
      <!-- content-wrapper  -->
    <!-- footer -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-inline">
            Project LEARN
        </div>
        <strong>Create 2020 <a href="#" style="color:black">Checkin-Checkout</a>.</strong> By OopzMgm.
    </footer>
    <!-- /footer  -->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
</body>

</html>