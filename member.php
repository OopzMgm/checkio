<?php
session_start();
// echo '<pre>';
        // print_r($_SESSION);
// echo '</pre>';
include('condb.php');
$m_id = $_SESSION['m_id'];
$m_level = $_SESSION['m_level'];
if($m_level!='member'){
Header("Location: logout.php");
}
//query member login
$queryemp = "SELECT * FROM tbl_member WHERE m_id=$m_id";
$resultm = mysqli_query($condb, $queryemp) or die ("Error in query: $queryemp " . mysqli_error());
$rowm = mysqli_fetch_array($resultm);
//เวลาปัจจุบัน
$timenow = date('H:i:s');
$datenow = date('Y-m-d');
//เวลาที่บันทึก
$querycheckio = "SELECT MAX(checkdate) as lastdate, checkin, checkout FROM tbl_check_io WHERE m_id=$m_id AND checkdate='$datenow' ";
$resultio = mysqli_query($condb, $querycheckio) or die ("Error in query: $querycheckio " . mysqli_error());
$rowio = mysqli_fetch_array($resultio);
// print_r($rowio);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Member Page</title>
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
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-warning navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li> -->
            </ul>
            <!-- Right navbar links -->
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
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-warning elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light"><b>Checkin-Checkout</b></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
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

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
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
                                        <p>Checkin-Checkout</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header">Other</li>
                        <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p class="text">Home</p>
            </a>
          </li> -->
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link">
                                <i class="nav-icon far fa-circle text-danger"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Check-IO ระบบบันทึกเวลาการทำงาน</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Default box -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">ลงเวลาเข้า-ออกงาน <i class="fas fa-calendar-check"></i>
                                        <?php echo date('d-m-Y');?></h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i></button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove"
                                            data-toggle="tooltip" title="Remove">
                                            <i class="fas fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="save_db.php" method="post" class="form-horizontal">
                                        <div class="form-group row">
                                            <div class="col col-sm-2">
                                                <label for="m_id">รหัสสมาชิก</label>
                                                <input type="text" class="form-control" name=""
                                                    placeholder="รหัสสมาชิก" value="M<?php echo $rowm['m_id'];?>"
                                                    readonly>
                                            </div>
                                            <div class="col col-sm-5">
                                                <label for="m_id">เวลาเข้างาน</label>
                                                <?php if(isset($rowio['checkin'])){ ?>
                                                <input type="text" class="form-control" name="checkin"
                                                    value="<?php echo $rowio['checkin'];?>" disabled>
                                                <?php }else{ ?>
                                                <input type="text" class="form-control" name="checkin"
                                                    value="<?php echo date('H:i:s');?>" readonly>
                                                <?php  } ?>
                                            </div>
                                            <div class="col col-sm-5">
                                                <label for="m_id">เวลาออกงาน</label>
                                                <?php
                if($timenow > '17:00:00'){
                if(isset($rowio['checkout'])){ ?>
                                                <input type="text" class="form-control" name="checkout"
                                                    value="<?php echo $rowio['checkout'];?>" disabled>
                                                <?php }else{ ?>
                                                <input type="text" class="form-control" name="checkout"
                                                    value="<?php echo date('H:i:s');?>" readonly>
                                                <?php
                } //if(isset($rowio['checkout'])){
                }else{  //if($timenow > '11:00:00'){
                echo '<br><font color="red"> หลัง 17.00 น. </font>';
                } ?>
                                            </div>
                                            <!-- <div class="col col-sm-1">
                <label>-</label>
               
              </div> -->
                                        </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <input type="hidden"  name="m_id" value="<?php echo $rowm['m_id'];?>">
                                    <button type="submit" class="btn btn-warning float-right">บันทึก</button>
                                </div>
                                <!-- /.card-footer-->
                            </div>
                            <!-- /.card -->
                            </form>
                            <?php
                              $querylist = "SELECT * FROM tbl_check_io WHERE m_id = $m_id ORDER BY checkdate DESC";
                              $resultlist = mysqli_query($condb, $querylist)  or die("Error:" . mysqli_error($querylist));
                              echo "
                              <div class='card'>
                              <div class='card-header'>
                                <h3 class='card-title'>ตารางลงเวลาเข้า-ออกงาน</h3>
                              </div>
                              <div class='card-body p-0'>
                              <table class='table table-striped'>
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>date</th>
                                  <th>check-in</th>
                                  <th>check-out</th>
                                </tr>
                                </thead>
                                ";
                                foreach ($resultlist as $value) {
                                echo "<tr>";
                                  echo "<td>".'CH'.$value["check_id"] ."</td>";
                                  echo "<td>" .date('d-m-Y', strtotime($value["checkdate"])).  "</td> ";
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
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="float-right d-none d-sm-inline">
            Project LEARN
        </div>
        <strong>Create 2020 <a href="#" style="color:black">Checkin-Checkout</a>.</strong> By OopzMgm.
    </footer>

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