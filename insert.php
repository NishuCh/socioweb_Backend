<?php
error_reporting(0);

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

include('database.php');

$data = json_decode(file_get_contents("php://input"));

$post_tittle =$data->post_tittle;
$post_des =$data->post_des;



if ($post_tittle && $post_des ) {

	$sql = "INSERT INTO  addpost(
		post_tittle,
		post_des
		
	)VALUES(
		'$post_tittle',
		'$post_des'
		
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