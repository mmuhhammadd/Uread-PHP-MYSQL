<?php
include 'config.php';
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$query = mysqli_query($mysqli, "SELECT * FROM users WHERE username='$username' AND password='$password'");
if(mysqli_num_rows($query) == 1) {
    echo mysqli_num_rows($query);
    session_start();
    $_SESSION['username'] = $username;
    
}
?>