<?php

include 'dbconn.php';

//encounter
	$count_all_users = "SELECT COUNT(covid_encounter) as count FROM `users` WHERE covid_encounter = 'yes' OR covid_encounter = 'YES'";
    $result = mysqli_query($conn, $count_all_users);
    $row = mysqli_fetch_assoc($result);
    $total_encounter = $row['count'];

    //vacinated
    $count_vaccine = "SELECT COUNT(vacinated) as count FROM `users` WHERE vacinated = 'yes' OR vacinated = 'YES'";
    $result = mysqli_query($conn, $count_vaccine);
    $row = mysqli_fetch_assoc($result);
    $total_vaccine = $row['count'];

    //fever
    $count_fever = "SELECT COUNT(body_temp) as count FROM `users` WHERE body_temp > 36.5";
    $result = mysqli_query($conn, $count_fever);
    $row = mysqli_fetch_assoc($result);
    $total_fever = $row['count'];

    //nationality
    $count_foreign = "SELECT COUNT(nationality) as count FROM `users` WHERE nationality != 'FILIPINO' OR nationality != 'filipino' OR nationality != 'Filipino'";
    $result = mysqli_query($conn, $count_foreign);
    $row = mysqli_fetch_assoc($result);
    $total_foreign = $row['count'];

    //
    $count_adult = "SELECT COUNT(age) as count FROM `users` WHERE age >= 18";
    $result = mysqli_query($conn, $count_adult);
    $row = mysqli_fetch_assoc($result);
    $total_adult = $row['count'];

    //
    $count_minor = "SELECT COUNT(age) as count FROM `users` WHERE age <= 17";
    $result = mysqli_query($conn, $count_minor);
    $row = mysqli_fetch_assoc($result);
    $total_minor = $row['count'];


?>
