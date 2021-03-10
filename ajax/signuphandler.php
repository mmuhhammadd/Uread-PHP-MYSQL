<?php
include 'config.php';
$username = $_REQUEST['username'];
$query = mysqli_query($mysqli, "SELECT * FROM users WHERE username='$username'");
if($query) {
    echo mysqli_num_rows($query);
}
?>