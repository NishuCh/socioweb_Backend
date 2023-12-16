<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



include('database.php');


$sql = "select * from addpost where id='".$_GET['id']."'";
$result = mysqli_query($con,$sql);
 

$outp = "";
while($rs = mysqli_fetch_array($result)) {

	 $desc = mysqli_real_escape_string($con,$rs["post_des"]);
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"post_tittle":"'  . $rs["post_tittle"] . '",';
    $outp .= '"id":"'   .$rs["id"]        . '",';
    $outp .= '"post_des":"'.  $desc   . '"}'; 
}
//$outp ='{"records":['.$outp.']}';
//$conn->close();
 
echo($outp);

?>