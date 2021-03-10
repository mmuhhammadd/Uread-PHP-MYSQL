<?php
include 'config.php';
$title = $_REQUEST['title'];
$user = $_REQUEST['user'];

$query = mysqli_query($mysqli, "SELECT * from books WHERE title = '$title' AND user = '$user'");
$row = mysqli_fetch_row($query);
if ($query) {
    echo $row[0];
}
?>