<?php
header('Access-Control-Allow-Origin: *');
$url = "https://lottsanook.herokuapp.com/?date=".date("dm")."".date("Y")+543;
echo $url;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);
$result=json_decode($response);
if($result[0][1] == "xxxxxx"){
    echo "yes";
} else {
    echo "no";
}
?>
