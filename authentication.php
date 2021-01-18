<?php

include('connection.php');
$email = $_POST['email'];
$pass = $_POST['pass'];

//to prevent from mysqli injection
$email = stripcslashes($email);
$pass= stripcslashes($pass);

$email = mysqli_real_escape_string($con, $email);
$pass = mysqli_real_escape_string($con, $pass);

$sql = "select *from user where email = '$email' and pass = '$pass'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$count = mysqli_num_rows($result);


if ($count == 1) {
    echo '<script>alert("Login successful")</script>';
}

else {
    echo '<script>alert("Login failed. Invalid email id or password!")</script>';
}
