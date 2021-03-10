<?php
include 'config.php';
$title = $_REQUEST['title'];
$author =  $_REQUEST['author'];
$year = $_REQUEST['year'];
$image = $_REQUEST['image'];
$user = $_REQUEST['user'];

$query = mysqli_query($mysqli, "INSERT INTO books (title, author, year, image, user) VALUES ('$title', '$author', '$year', '$image', '$user')");

?>