<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-warning">
            <div class="container">
                <a href="index3.html" class="navbar-brand">
                    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                        style="opacity: .8">
                    <span class="brand-text font-weight-light"><b>Checkin-Checkout</b></span>
                </a>
            </div>
        </nav>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"> LOGIN PAGE <small>check.io</small></h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <div class="card card-warning card-outline">
                                <div class="card-header">
                                    <h5 class="card-title m-0">Login Here!</h5>
                                </div>
                                <div class="card-body">
                                    <form action="login_db.php" method="post">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="inputEmail3">Username</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="m_username"
                                                    name="m_username" placeholder="Enter Your Username" minlength="2"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="inputPassword3">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="exampleInputPassword1"
                                                    name="m_password" placeholder="Enter Your Password" minlength="2" required>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-warning float-right">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3"></div>
                    </div>
                </div>
            </div>
        </div>
        <aside class="control-sidebar control-sidebar-dark">
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                Project LEARN
            </div>
            <strong>Create 2020 <a href="#" style="color:black">Checkin-Checkout</a>.</strong> By OopzMgm.
        </footer>
    </div>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>