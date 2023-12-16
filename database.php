<?php
$con=mysqli_connect('localhost', 'root', '')or die('Databse connection error');
mysqli_select_db($con,'react-blog')or die('database error');
?>