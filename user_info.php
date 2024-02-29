<?php
session_start();
include 'dbconn.php';
if (isset($_SESSION['useremail'])){
}
else{
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
        .header .logo-name{
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

while($row = mysqli_fetch_array($result)){

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
        <a class="nav-link collapsed" href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link" data-bs-target="#forms-nav" href="user_info.php">
          <i class="bi bi-journal-text"></i><span>Record Lists</span>
        </a>
      </li>

    </ul>
    <div class="circle3"></div>

  </aside><!-- End Sidebar-->

  <main id="main" class="main" style="height: 100vh;">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Patient List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<?php
 include 'config.php';
?>
    <section class="section dashboard">
      <div class="row">
      <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">Record List</h5>

                  <table class="table table-borderless datatable">
                    <thead>
                    <tr>
                      <th>Email</th>
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
                          while($row = mysqli_fetch_array($result)){

                          ?>
                      <tr>
                      <td scope="row"><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["gender"]; ?></td>
                        <td><?php echo $row["age"]; ?></td>
                        <td><?php echo $row["contact"]; ?></td>
                        <td><?php echo $row["body_temp"]; ?></td>
                        <td><?php echo $row["covid_diagnose"]; ?></td>
                        <td><?php echo $row["covid_encounter"]; ?></td>
                        <td><?php echo $row["vacinated"]; ?></td>
                        <td><?php echo $row["nationality"]; ?></td>
                        <td><a href="student-edit.php?id='<?php echo $row["id"]; ?>'">Edit</a></td>
                        <td><a href="student-delete.php?id='<?php echo $row["id"]; ?>'">Delete</a></td>
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
    </section>

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

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>