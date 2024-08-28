<?php
$conn = mysqli_connect("localhost", "root", "", "simple_blog");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
