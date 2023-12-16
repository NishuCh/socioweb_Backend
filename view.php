<?php 
error_reporting(0);

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

include('database.php');


$result = mysqli_query($con,"SELECT * from addpost");

$outp = "";
while($rs = mysqli_fetch_array($result))
{
	if ($outp !=""){$outp .= ",";}
	$outp .= '{"post_tittle":"' . $rs["post_tittle"] . '",';
	$outp .= '"post_des":"' . $rs["post_des"] . '",';
	$outp .= '"id":"' . $rs["id"] . '"}';
}

    $outp ='{"records":[' .$outp. ']}';
    //$con->close();

    echo($outp);
?>