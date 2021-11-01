<?php
session_start();
if (isset($_SESSION['email']) AND isset($_SESSION['user_type']) AND isset($_SESSION['key']) )
    echo " ";
else {
    header("location:index.php");

}


if ($_SERVER["REQUEST_METHOD"] == "POST") {


  $renter_name = $_POST['renter_name'];
  $renter_email = $_POST['renter_email'];
  $renter_phone = $_POST['renter_phone'];
  $renter_nid = $_POST['renter_nid'];
  $renter_address = $_POST['renter_address'];


    include('db_connect.php');


    $result = mysqli_query($con, "SELECT * FROM renters where renter_email='$renter_email' OR renter_phone='$renter_phone'");
    $num_rows = mysqli_num_rows($result);


    if ($num_rows > 0) {
      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal.fire("ERROR!","renter email or phone already exists!","error");';
      echo '}, 500);</script>';
    } else {
      if (mysqli_query($con, "INSERT INTO renters (`renter_name`,`renter_email`,`renter_phone`,`renter_nid`,`renter_address`) VALUE ('$renter_name','$renter_email','$renter_phone','$renter_nid','$renter_address')")) {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal.fire("renter Successfully Added!","Done!","success");';
        echo '}, 500);</script>';
      } else {// display the error message
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal.fire("ERROR!","Something Wrong!","error");';
        echo '}, 500);</script>';
      }


  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Add Renters</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="plugins/jquery.min/jquery.min.js"></script>

  <!--Preloader-->
  <link rel="stylesheet" href="dist/css/preloader.css">
  <script src="dist/js/preloader.js"></script>

  <script src="plugins/jquery.min/jquery.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">
  <script src="plugins/sweetalert2/sweetalert2.min.js"></script>


  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">


  <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>

  <!-- Bootstrap core CSS     -->
  <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="se-pre-con"></div>
<div class="wrapper">

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

      <!-- Sidebar -->
      <?php include 'sidebar.php'?>
      <!-- /.sidebar -->

  </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">


        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <!-- /.card -->

          <div class="card">
            <div class="card-header">

              <h3 class="card-title">Add renters information</h3>

            </div>


            <form role="form" id="quickForm" method="post" action="add_renters.php">
              <div class="card-body">

                <div class="form-group">
                  <label for="exampleInputrenterName">Renter Name</label>
                  <input type="text" name="renter_name" class="form-control" id="exampleInputrenterName"
                         placeholder="Enter Renter Name">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="renter_email" class="form-control" id="exampleInputEmail1"
                         placeholder="Enter email">
                </div>


                <div class="form-group">
                  <label for="exampleInputPhone">Phone Number</label>
                  <input type="tel" name="renter_phone" class="form-control" id="exampleInputPhone"
                         placeholder="Enter phone number">
                </div>

              <div class="form-group">
                  <label for="exampleInputPhone">ID / NID Number</label>
                  <input type="tel" name="renter_nid" class="form-control" id="exampleInputPhone"
                         placeholder="Enter nid number">
              </div>

                <div class="form-group">
                  <label for="exampleInputAddress">Renter Permanent Address</label>
                  <input type="text" name="renter_address" class="form-control" id="exampleInputAddress"
                         placeholder="Enter renter address">
                </div>


              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="reset" class="btn btn-dark"><i class="fa fa-times-circle"></i> Reset</button>
                <button type="submit" id="add_renter" class="btn btn-primary"><i class="fa fa-check-circle"></i> Add renter</button>
              </div>
            </form>


          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

  <!-- /.control-sidebar -->
</div>


<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>

<script type="text/javascript">

  $(document).on('click', '#add_renter', function (e) {


    $('#quickForm').validate({
      rules: {

        renter_name: {
          required: true
        },
        renter_email: {
          required: true,
          email: true,
        },
        renter_phone: {
          required: true
        },
        renter_nid: {
          required: true
        },
        renter_address: {
          required: true
        },


      },
      messages: {
        renter_name: {
          required: "Please enter renter name"
        },
        renter_email: {
          required: "Please enter renter email address",
          email: "Please enter a valid email address"
        },
        renter_phone: {
          required: "Please enter renter phone number"
        },
        renter_nid: {
          required: "Please enter renter nid number"
        },
        renter_address: {
          required: "Please enter renter address"
        },

      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });

  });


</script>



<script type="text/javascript">

  $(document).on('click', '#add_renter', function (e) {
    e.preventDefault();
    Swal.fire({
      title: 'Want to add ?',
      text: 'Are you sure?',
      icon: 'warning',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.value) {

        $('#quickForm').submit();

      }
    })

  });
</script>



</body>
</html>
