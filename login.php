<?php 
error_reporting(0);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include('database.php');

$data = json_decode(file_get_contents("php://input"));

// print_r($_POST);
$first_name=$data->first_name;
$email =$data->email;
$password =$data->password;


$result= mysqli_query($con, "SELECT * FROM login_register WHERE 
		email='".$email."' AND password='".$password."'");

	$nums = mysqli_num_rows($result);
	$rs = mysqli_fetch_array($result);

	if ($nums>=1) {
		http_response_code(200);
		$outp = "";

		$outp .= '{"first_name":"' . $rs["first_name"] . '",';
		$outp .= '"email":"' . $rs["email"] . '",';
		$outp .= '"password":"' . $rs["password"] . '",';
		$outp .= '"Status":"200"}';

		echo $outp;
	}else{
		http_response_code(202);
	}

?>