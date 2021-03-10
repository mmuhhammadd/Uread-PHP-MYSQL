<?php
include "config.php";
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$securityquestion = $_REQUEST['securityques'];
$securityanswer = $_REQUEST['securityans'];

$query = mysqli_query($mysqli, "INSERT INTO users (username, password, securityques, securityans) VALUES ('$username', '$password', '$securityquestion', '$securityanswer')");

if($query) {
    echo 'success';
}
else {
    echo mysqli_error($mysqli);
}
?>