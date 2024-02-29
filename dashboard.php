<?php
session_start();
include 'dbconn.php';
if (isset($_SESSION['useremail'])) {
} else {
  header("location: index.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>DICT - Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="img/profile.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <style>
    @media (max-width: 768px) {
      .header .logo-name {
        display: none;
      }

    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="img/profile.png" alt="" style="width: auto; height: 50px">
        <span class="logo-name">COVID-19 Assistant</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <!-- profile button-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <?php
            $email = $_SESSION['useremail'];
            $result = mysqli_query($conn, "SELECT * FROM admin WHERE username ='$email'");

            while ($row = mysqli_fetch_array($result)) {

            ?>
              <i class="bi bi-person" style="font-size: 2rem;"></i><!--change it to user profile-->
              <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $row["username"]; ?></span><!--change it to username-->
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $row["username"]; ?></h6><!--change to username-->
            <?php
            }
            ?>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" href="user_info.php">
          <i class="bi bi-journal-text"></i><span>Record Lists</span>
        </a>
      </li>

    </ul>
    <div class="circle3"></div>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    

    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> Delete Student Data </h5>
            <button type="button" id="close" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
          </div>

          <form action="student-delete.php" method="POST">

            <div class="modal-body">

              <input type="hidden" name="id" id="id">

              <h4> Do you want to Delete this Data ??</h4>
            </div>
            <div class="modal-footer">
              <button type="button" id="closeAndOpenModalBtn" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
              <button type="submit" name="deletedata" class="btn btn-primary"> Yes !! Delete it. </button>
            </div>
          </form>

        </div>
      </div>
    </div>

    
    


    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-9 col">
          <div class="row">
            <?php include 'config.php'; ?>
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Covid-19 ENCOUNTER</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-clipboard-data"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $total_encounter; ?></h6><!-- create a php code for the number of students int he system -->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">VACCINATED</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-shield-fill-check"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $total_vaccine; ?></h6><!--number of narrative in the system using php-->
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->


            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">FEVER</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-capsule"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $total_fever; ?></h6><!-- change the number to number of reports submited -->

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
          </div>
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">ADULT</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $total_adult; ?></h6><!-- create a php code for the number of students int he system -->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">MINOR</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $total_minor; ?></h6><!--number of narrative in the system using php-->
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->


            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">FOREIGNER</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $total_foreign; ?></h6><!-- change the number to number of reports submited -->

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
          </div>
        </div>

        <!-- Recent Sales change to data of the students -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">

            <div class="card-body">
              <h5 class="card-title">Record List</h5>

              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Mobile <i class="bi bi-phone"></i></th>
                    <th>Temp <i class="bi bi-thermometer-half"></i></th>
                    <th>Diagnosed</th>
                    <th>Encounter</th>
                    <th>Vaccinated</th>
                    <th>Nationality</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $result = mysqli_query($conn, "SELECT * FROM users");
                  while ($rows = mysqli_fetch_array($result)) {

                  ?>
                    <tr>
                      <td scope="row"><?php echo $rows["id"]; ?></td>
                      <td><?php echo $rows["name"]; ?></td>
                      <td><?php echo $rows["gender"]; ?></td>
                      <td><?php echo $rows["age"]; ?></td>
                      <td><?php echo $rows["contact"]; ?></td>
                      <td><?php echo $rows["body_temp"]; ?></td>
                      <td><?php echo $rows["covid_diagnose"]; ?></td>
                      <td><?php echo $rows["covid_encounter"]; ?></td>
                      <td><?php echo $rows["vacinated"]; ?></td>
                      <td><?php echo $rows["nationality"]; ?></td>
                      <td><button type="button" class="btn btn-primary updatebtn">EDIT</a></td>
                      <td><button type="button" class="btn btn-danger deletebtn"> DELETE </button></td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>

          </div>
        </div>

      </div>
      </div><!-- End Left side columns -->

      </div>
    </section>
    <!--edit modal-->
    <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> Edit Student Data </h5>
            <button type="button" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
          </div>

          <form action="student-update.php" method="POST">

            <div class="modal-body">

              <input type="hidden" name="update_id" id="update_id">

              <div class="form-group">
                <label> First Name </label>
                <input type="text" name="name" id="fname" class="form-control" placeholder="Enter First Name">
              </div>

              <div class="form-group">
                <label> Gender </label>
                <input type="text" name="name" id="fgender" class="form-control" placeholder="Enter First Name">
              </div>

              <div class="form-group">
                <label> Course </label>
                <input type="text" name="age" id="fage" class="form-control" placeholder="Enter Course">
              </div>

              <div class="form-group">
                <label> Phone Number </label>
                <input type="text" name="contact" id="fcontact" class="form-control" placeholder="Enter Phone Number">
              </div>

              <div class="form-group">
                <label> Phone Number </label>
                <input type="text" name="temp" id="ftemp" class="form-control" placeholder="Enter Phone Number">
              </div>

              <div class="form-group">
                <label> Phone Number </label>
                <input type="text" name="diagnose" id="fdiagnose" class="form-control" placeholder="Enter Phone Number">
              </div>

              <div class="form-group">
                <label> Phone Number </label>
                <input type="text" name="encounter" id="fencounter" class="form-control" placeholder="Enter Phone Number">
              </div>

            <div class="form-group">
                <label> Phone Number </label>
                <input type="text" name="vacinated" id="fvacinated" class="form-control" placeholder="Enter Phone Number">
              </div>

            <div class="form-group">
                <label> Phone Number </label>
                <input type="text" name="nationality" id="fnationality" class="form-control" placeholder="Enter Phone Number">
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
            </div>
          </form>
    </div>
      </div>
    </div>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>CubeCodes</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- testLocalJS CJ-->
  <script src="assets/vendor/testLocalJs/jquery.min.js"></script>
  <script src="assets/vendor/testLocalJs/popper.min.js"></script>
  <script src="assets/vendor/testLocalJs/bootstrap.min.js"></script>
  <script src="assets/vendor/testLocalJs/dataTables.min.js"></script>
  <script src="assets/vendor/testLocalJs/bootstrap4.min.js"></script>






  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
    $(document).ready(function() {

      $('.deletebtn').on('click', function() {

        $('#deletemodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();

        console.log(data);

        $('#id').val(data[0]);

      });
    });
  </script>


  <script>
    $(document).ready(function() {

      $('.updatebtn').on('click', function() {

        $('#editmodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();

        console.log(data);

        $('#update_id').val(data[0]);
        $('#fname').val(data[1]);
        $('#fgender').val(data[2]);
        $('#fage').val(data[3]);
        $('#fcontact').val(data[4]);
        $('#ftemp').val(data[5]);
        $('#fdiagnose').val(data[6]);
        $('#fencounter').val(data[7]);
        $('#fvacinated').val(data[8]);
        $('#fnationality').val(data[9]);
      });
    });
  </script>

  <script>
    $(document).ready(function() {

      $('.updatebtn').on('click', function() {

        $('#editmodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();

        console.log(data);

        $('#id').val(data[0]);

      });
    });
  </script>


</body>

</html>