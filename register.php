<?php 
error_reporting(0);

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

include('database.php');
$data = json_decode(file_get_contents("php://input"));

$first_name =$data->first_name;
$last_name =$data->last_name;
$email =$data->email;
$password =$data->password;

if ($first_name && $email && $password) {

	$sql = "INSERT INTO  login_register(
		first_name,
		last_name,
		email,
		password
	)VALUES(
		'$first_name',
		'$last_name',
		'$email',
		'$password'
	)";
	$result = mysqli_query($con,$sql);
	
	if ($result) {
		$response=array(
			'status'=>'valid'
		);
		echo json_encode($response);
	}else{
		$response=array(
			'status'=>'invalid'
		);
		echo json_encode($response);
	}
}

?>