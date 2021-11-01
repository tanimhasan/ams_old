<?php
session_start();
if (isset($_SESSION['email']))
  echo " ";
else
  header("location:index.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {


  $product_name = $_POST['product_name'];
  $product_code = $_POST['product_code'];
  $category_id = $_POST['product_category_id'];
  $sub_category_id = $_POST['sub_category_id'];
  $product_supplier_id = $_POST['product_supplier_id'];
  $product_weight = $_POST['product_weight'];
  $weight_unit_name = $_POST['weight_unit_name'];
  $product_sell_price = $_POST['product_price'];
  $product_discount_price = $_POST['product_discounted_price'];
  $product_stock = $_POST['product_stock'];
  $product_description = $_POST['product_description'];


  //get file name
  $filename = basename($_FILES['uploadedfile']['name']);


  include('db_connect.php');


  $result = mysqli_query($con, "SELECT * FROM products where product_code='$product_code'");
  $num_rows = mysqli_num_rows($result);

  if ($num_rows > 0) {
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal.fire("ERROR!","Product already exists!","error");';
    echo '}, 500);</script>';
  } else {


    if (empty($filename)) {
      $newfilename = 'image_placeholder.png';
    } else {

      $sms_code = time();
      //generate random file name
      $temp = explode(".", $_FILES["uploadedfile"]["name"]);
      $newfilename = $sms_code . '.' . end($temp);
      move_uploaded_file($_FILES["uploadedfile"]["tmp_name"], "product_images/" . $newfilename);
    }

    if (mysqli_query($con, "INSERT INTO products (`product_name`,`product_description`,`product_code`,`category_id`,`sub_category_id`,`product_price`,`product_discounted_price`,`product_stock`,`product_weight`,`weight_unit_name`,`product_image`,`product_supplier_id`) VALUE ('$product_name','$product_description','$product_code','$category_id','$sub_category_id','$product_sell_price','$product_discount_price','$product_stock','$product_weight','$weight_unit_name','$newfilename','$product_supplier_id')")) {
      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal.fire("Product Successfully Added!","Done!","success");';
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
  <title>Add Product</title>
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
    <div class="sidebar">
      <!-- Sidebar user (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard

              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="customers.php" class="nav-link ">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Customers

              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="suppliers.php" class="nav-link">
              <i class="nav-icon fas fa-people-carry"></i>
              <p>
                Suppliers

              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="category.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Products Category

              </p>
            </a>
          </li>

            <li class="nav-item">
                <a href="sub_category.php" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Sub Category

                    </p>
                </a>
            </li>

          <li class="nav-item">
            <a href="products.php" class="nav-link active">
              <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
                Products

              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="orders.php" class="nav-link">
              <i class="nav-icon fas fa-sort-amount-up"></i>
              <p>
                Orders

              </p>
            </a>
          </li>

            <li class="nav-item">
                <a href="coupon.php" class="nav-link">
                    <i class="nav-icon fas fa-gift"></i>
                    <p>
                        Coupon

                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="notification.php" class="nav-link">
                    <i class="nav-icon fas fa-bell"></i>
                    <p>
                        Notification
                    </p>
                </a>
            </li>

          <li class="nav-item">
            <a href="expense.php" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Expense
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Reports
                <i class="right fas fa-angle-left"></i>

              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="sales_report.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sales Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="expense_report.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Expense Report</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="sales_chart.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sales Chart </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="expense_chart.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Expense Chart</p>
                </a>
              </li>

            </ul>


          </li>

          <li class="nav-item">
            <a href="products.php" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>

              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="shop_information.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Shop Information</p>
                </a>
              </li>
                <li class="nav-item">
                    <a href="all_admin.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>All Admin</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="app_banner.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>App Banner</p>
                    </a>
                </li>


            </ul>

          </li>

          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
              </p>
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

              <h3 class="card-title">Add product information</h3>

            </div>


            <form enctype="multipart/form-data" role="form" id="quickForm" method="post" action="add_product.php">
              <div class="card-body">

                <div class="form-group">
                  <label for="exampleInputProductName">Product Name</label>
                  <input type="text" name="product_name" class="form-control" id="exampleInputProductName"
                         placeholder="Enter Product Name">
                </div>


                <div class="form-group">
                  <label for="exampleInputProductCode">Product Code</label>
                  <input type="text" name="product_code" class="form-control" id="exampleInputProductCode"
                         placeholder="Enter product code">
                </div>


                <div class="form-group">

                  <div class="form-group">
                    <label for="exampleInputCategory">Select Product Category</label>
                    <select class="form-control" name="product_category_id" id="inputCategory">


                      <?php
                      include('db_connect.php');

                      $result = mysqli_query($con, "SELECT * FROM category");
                      while ($row = mysqli_fetch_array($result)) {
                        echo "<option value='" . $row['category_id'] . "'>" . $row['category_name'] . "</option>";

                      }
                      echo "</select>";

                      ?>
                  </div>
                </div>

                  <div class="form-group">

                      <div class="form-group">
                          <label for="exampleInputCategory">Select Sub Category</label>
                          <select class="form-control" name="sub_category_id" id="subCategory">

z

                          </select>
                      </div>
                  </div>

                <div class="form-group">
                  <label for="exampleInputDescription">Product Description</label>
                  <textarea rows="5" type="text" name="product_description" class="form-control" id="exampleInputDescription"
                            placeholder="Enter product description"></textarea>
                </div>

                <div class="form-group">
                  <label for="exampleInputPrice">Product Price</label>
                  <input type="number" name="product_price" class="form-control" id="exampleInputPrice"
                         placeholder="Enter product price">
                </div>


                  <div class="form-group">
                      <label for="exampleInputPrice">Product Discounted Price (if available)</label>
                      <input type="number" name="product_discounted_price" class="form-control" id="exampleInputDiscountPrice"
                             placeholder="Enter product discounted price">
                  </div>

                <div class="form-group">
                  <label for="exampleInputWeight">Product Weight</label>
                  <input type="number" name="product_weight" class="form-control" id="exampleInputPrice"
                         placeholder="Enter product weight">


                </div>

                <div class="form-group">

                  <div class="form-group">
                    <label for="exampleInputWeightUnit">Product Weight Unit</label>
                    <select class="form-control" name="weight_unit_name">


                      <?php
                      include('db_connect.php');

                      $result = mysqli_query($con, "SELECT * FROM weight_unit");
                      while ($row = mysqli_fetch_array($result)) {
                        echo "<option value='" . $row['weight_unit_name'] . "'>" . $row['weight_unit_name'] . "</option>";

                      }
                      echo "</select>";

                      ?>
                  </div>
                </div>


                <div class="form-group">

                  <div class="form-group">
                    <label for="exampleInputSupplier">Product Supplier</label>
                    <select class="form-control" name="product_supplier_id">

                      <?php
                      include('db_connect.php');

                      $result = mysqli_query($con, "SELECT * FROM suppliers");
                      while ($row = mysqli_fetch_array($result)) {
                        echo "<option value='" . $row['suppliers_id'] . "'>" . $row['suppliers_name'] . "</option>";

                      }
                      echo "</select>";

                      ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="exampleInputStock">Product Stock</label>
                  <input type="number" name="product_stock" class="form-control" id="exampleInputStock"
                         placeholder="Enter product stock">
                </div>


                <div class="form-group ">
                  <label for="exampleInputImage">Product Image</label>


                  <div class="custom-file">
                    <input type="hidden" class="custom-file-input" id="fileupload" name="MAX_FILE_SIZE"
                           value="2000000"/>

                    Choose a jpg/png file to upload:<br> <input class="btn btn-default" name="uploadedfile"
                                                                type="file"/>
                    (Upload 500px x 500px picture)<br/>
                  </div>
                </div>


              </div>



          <!-- /.card-body -->
          <div class="card-footer">
            <button type="reset" class="btn btn-dark"><i class="fa fa-times-circle"></i> Reset</button>
            <button type="submit" id="add_product" class="btn btn-primary"><i class="fa fa-check-circle"></i> Add product</button>
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

  $(document).on('click', '#add_product', function (e) {


    $('#quickForm').validate({
      rules: {

        product_name: {
          required: true
        },
        product_code: {
          required: true,
        },
        product_category: {
          required: true,
        },
        product_description: {
          required: true,
        },
        product_price: {
          required: true,
        },

        product_weight: {
          required: true,
        },

        product_weight_unit: {
          required: true,
        },

        product_supplier: {
          required: true,
        },

        product_stock: {
          required: true,
        },


      },
      messages: {
        product_name: {
          required: "Please enter product name"
        },
        product_code: {
          required: "Please enter product code"
        },
        product_category: {
          required: "Please enter product category"
        },
        product_description: {
          required: "Please enter product description"
        },

        product_price: {
          required: "Please enter product price"
        },
        product_weight: {
          required: "Please enter product weight"
        },

        product_weight_unit: {
          required: "Please select product weight unit"
        },

        product_supplier: {
          required: "Please select product supplier"
        },
        product_stock: {
          required: "Please enter product stock"
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

  $(document).on('click', '#add_product', function (e) {
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


    <script type="text/javascript">
        $(document).ready(function(){

            $('#inputCategory').on("change",function () {
                var categoryId = $(this).find('option:selected').val();
                $.ajax({
                    url: "sub_category_ajax.php",
                    type: "POST",
                    data: "categoryId="+categoryId,
                    success: function (response) {
                        console.log(response);
                        $("#subCategory").html(response);
                    },
                });
            });

        });

    </script>

</body>
</html>
