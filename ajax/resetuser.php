<?php
include 'config.php';
$username = $_REQUEST['username'];

$query = mysqli_query($mysqli, "SELECT securityques FROM users WHERE username='$username'");
$row = mysqli_fetch_row($query);
if(mysqli_num_rows($query) == 1) {
    echo $row[0];
}
else {
    echo '0';
}
?>