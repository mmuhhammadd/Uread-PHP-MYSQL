<?php
include 'config.php';
$username = $_REQUEST['username'];
$answer = $_REQUEST['answer'];

$query = mysqli_query($mysqli, "SELECT * FROM users WHERE username='$username' and securityans='$answer'");
if(mysqli_num_rows($query) == 1) {
    echo 'success';
}
else {
    echo '0';
}
?>