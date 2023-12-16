<?php 
// error_reporting(0);

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

$data = json_decode(file_get_contents("php://input"));

include('database.php');

$sql = "DELETE from addpost where id='".$data->id."'";
$result = mysqli_query($con,$sql);

?>