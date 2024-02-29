<?php
session_start();
include 'dbconn.php';
if (isset($_SESSION['useremail'])) {
} else {
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>DICT - Edit Patient</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="img/logo3.png" rel="icon">

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


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Record Lists</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM users WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($rows = $result->fetch_assoc()) {
        ?>

<section class="section profile" >
                    <div class="row">

                        <div class="col-xl-12">
                        <div class="card">
                                <div class="card-body pt-3">
                                    <div class="tab-content pt-2">
                                        <h2 class="pagetitle">Edit Records</h2>
                                        <hr>
                                    <form action="student-update.php" method="POST" autocomplete="off">
                                    <input type="hidden" name="id" value="<?php echo $rows["id"]; ?>">
                                    <div class="row mb-4">
                                                <label for="fullName" class="col-md-5 col-lg-3 col-form-label" style="font-size: 18px; font-weight: 500;">Full Name</label>
                                                <div class="col-md-9 col-lg-9">
                                                    <input type="text" class="form-control" name="name" value="<?php echo $rows['name']?>">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="fullName" class="col-md-5 col-lg-3 col-form-label" style="font-size: 18px; font-weight: 500;">Gender</label>
                                                <div class="col-md-9 col-lg-9">
                                                <select name="gender" class="form-control" id="gender" required>
                                                <option value="<?php echo $rows['gender']?>"><?php echo $rows['gender']?></option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="fullName" class="col-md-5 col-lg-3 col-form-label" style="font-size: 18px; font-weight: 500;">Age</label>
                                                <div class="col-md-9 col-lg-9">
                                                    <input type="number" class="form-control" name="age" value="<?php echo $rows['age']?>">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="fullName" class="col-md-5 col-lg-3 col-form-label" style="font-size: 18px; font-weight: 500;">Mobile Number</label>
                                                <div class="col-md-9 col-lg-9">
                                                    <input type="text" class="form-control" name="contact" value="<?php echo $rows['contact']?>">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="fullName" class="col-md-5 col-lg-3 col-form-label" style="font-size: 18px; font-weight: 500;">Body Temperature</label>
                                                <div class="col-md-9 col-lg-9">
                                                    <input type="text" class="form-control" name="temp" value="<?php echo $rows['body_temp']?>">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="fullName" class="col-md-5 col-lg-3 col-form-label" style="font-size: 18px; font-weight: 500;">Covid-19 Diagnose</label>
                                                <div class="col-md-9 col-lg-9">
                                                <select name="diagnose" class="form-control" id="diagnose" required>
                                                <option value="<?php echo $rows['covid_diagnose']?>"><?php echo $rows['covid_diagnose']?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="fullName" class="col-md-5 col-lg-3 col-form-label" style="font-size: 18px; font-weight: 500;">Covid-19 Encounter</label>
                                                <div class="col-md-9 col-lg-9">
                                                <select name="encounter" class="form-control" id="encounter" required>
                                                <option value="<?php echo $rows['covid_encounter']?>"><?php echo $rows['covid_encounter']?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="fullName" class="col-md-5 col-lg-3 col-form-label" style="font-size: 18px; font-weight: 500;">Vaccinated</label>
                                                <div class="col-md-9 col-lg-9">
                                                <select name="vacinated" class="form-control" id="vacinated" required>
                                                <option value="<?php echo $rows['vacinated']?>"><?php echo $rows['vacinated']?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="fullName" class="col-md-5 col-lg-3 col-form-label" style="font-size: 18px; font-weight: 500;">Nationality</label>
                                                <div class="col-md-9 col-lg-9">
                                                    <input type="text" class="form-control" name="nationality" value="<?php echo $rows['nationality']?>">
                                                </div>
                                            </div>

                                            <div class="text-center">
                                                <ul>
                                                <li><button type="submit" class="btn btn-primary" style="background-color: #606C5D;">Save Changes</button></li>
                                                <li><a href="user_info.php" class="cancel-btn">Close</a></li>
                                                </ul>
                                            </div>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
    </main>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>ArchiveMo.</span></strong>. All Rights Reserved
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

<?php

            }
        }
        $conn->close();
?>