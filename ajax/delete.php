<?php
include 'config.php';
$id = $_REQUEST['id'];
mysqli_query($mysqli, "DELETE FROM books WHERE id='$id'");

?>