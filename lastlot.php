<?php
$days=json_decode(file_get_contents("https://lottsanook.herokuapp.com/god.php"));
$get=json_decode(file_get_contents("https://lottsanook.herokuapp.com/?date=".end($days)));
echo json_encode(array("win"=>$get[0][1],"threefirst"=>"X5","threeend"=>"Highlander","twoend"=>"Highlander"));
?>