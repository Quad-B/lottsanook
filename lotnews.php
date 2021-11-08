<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.brighttv.co.th/tag/%25e0%25b9%2580%25e0%25b8%25a5%25e0%25b8%2582%25e0%25b9%2580%25e0%25b8%2594%25e0%25b9%2587%25e0%25b8%2594/feed',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

//get items from xml
$xml = simplexml_load_string($response);
$json = json_encode($xml);
$array = json_decode($json,TRUE);
print_r($array);