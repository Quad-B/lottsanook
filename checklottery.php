<?php
header('Access-Control-Allow-Origin: *');
if(isset($_GET['by'])){
    $date=$_GET['by'];
}
$url = "https://lottsanook.herokuapp.com/?date=".$date;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);
$yourlot = $response;
if(file_exists("cache/".$date.".txt")){
    $myfile = fopen("cache/".$date.".txt","r") or die("Unable to open file!");
    $yourlot = fread($myfile,filesize("cache/".$date.".txt"));
}
$lot_array  = json_decode($yourlot);
echo $yourlot;
?>