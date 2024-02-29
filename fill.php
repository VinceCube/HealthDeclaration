<?php
include_once 'dbconn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Tracker Form</title>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <!-- Favicons -->
    <link href="img/profile.png" rel="icon">


    <style>
        body {
            background-color: #F7E6C4;
        }

        .container {
            margin-left: auto;
            margin-right: auto;
            width: 20cm;
            height: 15cm;
        }

        .row {
            margin-left: 2px;
            ;
        }

        .card-footer {
            background-color: white;
        }
    </style>
</head>


<body>
    <br>
    <br>
    <div class="container">
        <div class="card card-primary">
            <div class="card-header" style="background-color: #606C5D;">
                <h3 class="card-title">COVID-19 Health Decleration</h3>
            </div>
            <form name="fillForm" action="" method="POST" required>
                <br>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="inputName">Full Name:</label>
                        <input type="text" name="name" class="form-control" placeholder="ex. Juan Dela Cruz" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-7 ms-2">
                        <div class="form-group">
                            <label for="inputGender">Gender:</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="SELECT GENDER">SELECT GENDER</option>
                                <option value="MALE">MALE</option>
                                <option value="FEMALE">FEMALE</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-4 ml-4">
                        <div class="form-group">
                            <label for="inputAge">Age:</label>
                            <input type="number" name="age" class="form-control" placeholder="Enter your Age" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-7">
                        <div class="form-group">
                            <label for="inputNumber">Mobile Number:</label>
                            <input type="number" name="mobileNum" class="form-control" placeholder="ex. 09547895282" required>
                        </div>
                    </div>

                    <div class="col-sm-4 ml-4">
                        <div class="form-group">
                            <label for="inputTemp">Body Temp:</label>
                            <input type="number" name="temp" class="form-control" placeholder="Celcius" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-7">
                        <div class="form-group">
                            <label for="inputDiagnosed">COVID-19 Diagnosed:</label>
                            <select name="diagnosed" id="diagnosed" class="form-control">
                                <option value="NO">NO</option>
                                <option value="YES">YES</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-4 ml-4">
                        <div class="form-group">
                            <label for="inputEncountered">COVID-encountered19 Encountered:</label>
                            <select name="encountered" id="encountered" class="form-control">
                                <option value="NO">NO</option>
                                <option value="YES">YES</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-7">
                        <div class="form-group">
                            <label for="inputNation">Nationality:</label>
                            <input type="text" name="nationality" class="form-control" placeholder="" required>
                        </div>
                    </div>

                    <div class="col-sm-4 ml-4">
                        <div class="form-group">
                            <label for="inputVaccinated">Vaccinated:</label>
                            <select name="vacc" id="vacc" class="form-control">
                                <option value="NO">NO</option>
                                <option value="YES">YES</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" name="submit" class="btn btn-primary float-right mr-2" style="background-color: #606C5D; border: none;">Submit</button>
                </div>
                <br>



                <?php
                if (isset($_POST['submit'])) {
                    $name = $_POST['name'];
                    $gender = $_POST['gender'];
                    $age = $_POST['age'];
                    $contact = $_POST['mobileNum'];
                    $body_temp = $_POST['temp'];
                    $covid_diagnose    = $_POST['diagnosed'];
                    $covid_encountered = $_POST['encountered'];
                    $nationality = $_POST['nationality'];
                    $vacinated = $_POST['vacc'];

                    $sql = "INSERT INTO users
                    (name, gender, age, contact, body_temp, covid_diagnose, covid_encounter, vacinated, nationality)
                    VALUES
                    ('$name','$gender', '$age', '$contact','$body_temp','$covid_diagnose','$covid_encountered','$vacinated','$nationality')";

                    if (mysqli_query($conn, $sql)) {
                        echo '<script> alert("Data submitted successfully!") </script>';
                        return;
                    } else {
                        echo '<script> alert("Connection Error. Please try again later.") </script>';
                    }
                    //close connection
                    mysqli_close($conn);
                } ?>

            </form>
        </div>
    </div>

    <script>
        function IsMobileNumber(mobileNum) {
            var mob = /^[1-9]{1}[0-9]{9}$/;
            var txtMobile = document.getElementById(mobileNum);
            if (mob.test(txtMobile.value) == false) {
                alert("Please enter valid mobile number.");
                txtMobile.focus();
                return false;
            }
            return true;
        }
    </script>




</body>

</html>