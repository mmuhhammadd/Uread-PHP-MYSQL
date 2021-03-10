<?php
include 'config.php';
$id = $_REQUEST['id'];
$title = $_REQUEST['title'];
$author = $_REQUEST['author'];
$year = $_REQUEST['year'];
$image = $_REQUEST['image'];
$date = date_create($year);
$dateformat = date_format($date, "Y-m-d");

$query = mysqli_query($mysqli, "UPDATE books SET title='$title', author='$author', year='$dateformat', image='$image' WHERE id='$id'");
if ($query) {
    echo 'success';
}
else {
    echo mysqli_error($mysqli);
}
?>