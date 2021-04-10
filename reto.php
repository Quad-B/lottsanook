<?php
header('Access-Control-Allow-Origin: *');
$url = "https://lottsanook.herokuapp.com/?date=16042564";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);
$result=json_decode($response);
if($result[8][100] == "xxxxxx"){
    echo "yes";
} else {
    echo "no";
}
?>