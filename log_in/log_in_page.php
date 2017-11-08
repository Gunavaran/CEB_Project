<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Adminox - Responsive Web App Kit</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="../assets/js/modernizr.min.js"></script>

    </head>


    <body class="bg-accpunt-pages">

        <!-- HOME -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page">

                            <div class="account-pages">
                                <div class="account-box">
                                    <div class="account-logo-box">
                                        <h5 class="text-uppercase font-bold m-b-5 m-t-50">Sign In</h5>

                                    </div>
                                    <div class="account-content">
                                        <form class="form-horizontal" action="index.php" autocomplete="off" method="post">

                                            <div class="form-group m-b-20 row">
                                                <div class="col-12">
                                                    <label>Username</label>
                                                    <input class="form-control" type="text" required="" name="username">
                                                </div>
                                            </div>

                                            <div class="form-group row m-b-20">
                                                <div class="col-12">
                                                    <label for="password">Password</label>
                                                    <input class="form-control" type="password" required="" id="password" name="password">
                                                </div>
                                            </div>



                                            <div class="form-group row text-center m-t-10">
                                                <div class="col-12">
                                                    <input class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit" value="Sign In" >

                                                </div>
                                            </div>

                                            <?php
                                            $message = '';
                                            if (isset($_POST['username']) && isset($_POST['password'])) {
                                                $username1 = $_POST['username'];
                                                $password = $_POST['password'];

                                                if (!empty($username1) && !empty($password)) {
                                                    $customer_query = "SELECT user_id FROM customer WHERE username = '$username1' AND password = '$password'";
                                                    $admin_query = "SELECT user_id FROM staff WHERE username = '$username1' AND password = '$password'";
                                                    $reader_query = "SELECT user_id FROM  meter_reader WHERE username = '$username1' AND password = '$password'";
                                                    if ($admin_query_run = mysqli_query($link, $admin_query)) {
                                                        if (mysqli_num_rows($admin_query_run) == 1) {
                                                            $query_row = mysqli_fetch_assoc($admin_query_run);
                                                            $_SESSION['user_id'] = $query_row['user_id'];
                                                            $_SESSION['user_type'] = 'admin';
                                                            header('Location: index.php');
                                                        }
                                                    }

                                                    if ($reader_query_run = mysqli_query($link, $reader_query)) {
                                                        if (mysqli_num_rows($reader_query_run) == 1) {
                                                            $query_row = mysqli_fetch_assoc($reader_query_run);
                                                            $_SESSION['user_id'] = $query_row['user_id'];
                                                            $_SESSION['user_type'] = 'meter_reader';
                                                            header('Location: index.php');
                                                        }
                                                    }

                                                    if ($customer_query_run = mysqli_query($link, $customer_query)) {
                                                        if (mysqli_num_rows($customer_query_run) == 1) {
                                                            $query_row = mysqli_fetch_assoc($customer_query_run);
                                                            $_SESSION['user_id'] = $query_row['user_id'];
                                                            $_SESSION['user_type'] = 'customer';
                                                            header('Location: index.php');
                                                        }
                                                    }

                                                    $message = "username and password mismatch";


                                                } else {
                                                    $message = 'You should enter username and password';
                                                }

                                            }
                                            ?>
                                            <h5 style="color: red"><?php  echo $message; ?></h5>

                                        </form>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="text-center">
                                                    <button type="button" class="btn m-r-5 btn-facebook waves-effect waves-light">
                                                        <i class="fa fa-facebook"></i>
                                                    </button>
                                                    <button type="button" class="btn m-r-5 btn-googleplus waves-effect waves-light">
                                                        <i class="fa fa-google"></i>
                                                    </button>
                                                    <button type="button" class="btn m-r-5 btn-twitter waves-effect waves-light">
                                                        <i class="fa fa-twitter"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row m-t-50">
                                            <div class="col-sm-12 text-center">
                                                <p class="text-muted">Don't have a connection? <a href="requestee_req_form.php" class="text-dark m-l-5"><b>Request New Connection</b></a></p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- end card-box-->


                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
          </section>
          <!-- END HOME -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/tether.min.js"></script><!-- Tether for Bootstrap -->
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/metisMenu.min.js"></script>
        <script src="../assets/js/waves.js"></script>
        <script src="../assets/js/jquery.slimscroll.js"></script>

        <!-- App js -->
        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>

    </body>
</html>