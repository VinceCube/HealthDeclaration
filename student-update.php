<?php
include 'dbconn.php';

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];

  $name = $_POST['name'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $contact = $_POST['contact'];
  $temp = $_POST['temp'];
  $diagnose = $_POST['diagnose'];
  $encounter = $_POST['encounter'];
  $vacinated = $_POST['vacinated'];
  $nationality = $_POST['nationality'];

  $sql = "UPDATE `users` SET `name` = '$name', `gender` = '$gender', `age` = '$age', `contact` = '$contact', `body_temp` = '$temp', `covid_diagnose` = '$diagnose', `covid_encounter` = '$encounter', `vacinated` = '$vacinated', `nationality` = '$nationality'  WHERE `users`.`id` = $id";


  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Record successfully updated!');</script>";
    echo "<script>window.location.href = 'user_info.php';</script>";
  } else {
    echo "Error updating record: " . $conn->error;
  }
}
$conn->close();
?>