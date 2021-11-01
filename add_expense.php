<?php
session_start();
if (isset($_SESSION['email']) AND isset($_SESSION['user_type']) AND isset($_SESSION['key']) )
    echo " ";
else {
    header("location:index.php");

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {


  $expense_name = $_POST['expense_name'];
  $category_id = $_POST['category_id'];
  $expense_note = $_POST['expense_note'];
  $expense_amount = $_POST['expense_amount'];
  $expense_time = date('h:i A ', strtotime($_POST['expense_time']));
  $expense_date = $_POST['expense_date'];


  include('db_connect.php');


  $result = mysqli_query($con, "SELECT * FROM expense WHERE expense_name='$expense_name' AND category_id='$category_id' AND expense_note='$expense_note' AND expense_time='$expense_time' AND expense_date='$expense_date'");
  $num_rows = mysqli_num_rows($result);


  if ($num_rows > 0) {
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal.fire("ERROR!","Expense already exists!","error");';
    echo '}, 500);</script>';
  } else {
    if (mysqli_query($con, "INSERT INTO expense (`expense_name`,`category_id`,`expense_note`,`expense_amount`,`expense_time`,`expense_date`) VALUE ('$expense_name','$category_id','$expense_note','$expense_amount','$expense_time','$expense_date')")) {
      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal.fire("Expense Successfully Added!","Done!","success");';
      echo '}, 500);</script>';
        echo "<script>window.open('expense_list.php','_self')</script>";
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
  <title>Add Expenses</title>
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

              <h3 class="card-title">Add expense information</h3>

            </div>


            <form role="form" id="quickForm" method="post" action="add_expense.php">
              <div class="card-body">

                <div class="form-group">
                  <label for="exampleInputexpenseName">Expense Name</label>
                  <input type="text" name="expense_name" class="form-control" id="exampleInputexpenseName"
                         placeholder="Enter Expense Name">
                </div>

                  <div class="form-group">
                      <label for="exampleInputWeightUnit">Select Expense Category</label>
                      <select class="form-control" name="category_id">
                          <option disabled selected hidden>Select Category</option>

                          <?php
                          include('db_connect.php');

                          $result = mysqli_query($con, "SELECT * FROM expense_category");
                          while ($row = mysqli_fetch_array($result)) {
                              echo "<option value='" . $row['category_id'] . "'>" . $row['category_name'] . "</option>";

                          }
                          echo "</select>";

                          ?>
                  </div>

                <div class="form-group">
                  <label for="exampleInputNote">Expense Note</label>
                  <input type="text" name="expense_note" class="form-control" id="exampleInputNote"
                         placeholder="Enter expense note">
                </div>


                <div class="form-group">
                  <label for="exampleInputPhone">Expense Amount</label>
                  <input type="number" name="expense_amount" class="form-control" id="exampleInputAmount"
                         placeholder="Enter expense amount">
                </div>

                <div class="form-group">
                  <label for="exampleInputAddress">Expense Time</label>
                  <input type="time" name="expense_time" class="form-control" id="exampleInputTime"
                         placeholder="Enter expense time">
                </div>

                <div class="form-group">
                  <label for="exampleInputAddress">Expense Date</label>
                  <input type="date" name="expense_date" class="form-control" id="exampleInputDate"
                         placeholder="Enter expense date">
                </div>

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="reset" class="btn btn-dark"><i class="fa fa-times-circle"></i> Reset</button>
                <button type="submit" id="add_expense" class="btn btn-primary"><i class="fa fa-check-circle"></i> Add
                  Expense
                </button>
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


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>

<script type="text/javascript">

  $(document).on('click', '#add_expense', function (e) {


    $('#quickForm').validate({
      rules: {

        expense_name: {
          required: true
        },
        category_id: {
          required: true
        },
        expense_note: {
          required: true,
        },
        expense_amount: {
          required: true
        },
        expense_time: {
          required: true
        },
        expense_date: {
          required: true
        },


      },
      messages: {
        expense_name: {
          required: "Please enter expense name"
        },
        category_id: {
          required: "Please select expense category"
        },
        expense_note: {
          required: "Please enter expense note",
        },
        expense_amount: {
          required: "Please enter expense amount"
        },
        expense_time: {
          required: "Please enter expense time"
        },

        expense_date: {
          required: "Please enter expense date"
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

  $(document).on('click', '#add_expense', function (e) {
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
