<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
$days=json_decode(file_get_contents("https://lottsanook.herokuapp.com/god.php"));
$get=json_decode(file_get_contents("https://lottsanook.herokuapp.com/?date=".end($days)));
if(isset($_GET['info'])){
    echo json_encode(array("win"=>$get[0][1],"threefirst"=>$get[1][1].",".$get[1][2],"threeend"=>$get[2][1].",".$get[2][2],"twoend"=>$get[3][1]));
}else{
    echo json_encode(array("info"=>array("date"=>end($days)),"win"=>$get[0][1],"threefirst"=>$get[1][1].",".$get[1][2],"threeend"=>$get[2][1].",".$get[2][2],"twoend"=>$get[3][1]));55                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
}
?>