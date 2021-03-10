<?php
include 'config.php';

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$query = mysqli_query($mysqli, "UPDATE users SET password='$password' WHERE username='$username'");

if($query) {
    echo 'success';
}
?>