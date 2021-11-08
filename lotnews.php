<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.brighttv.co.th/tag/เลขเด็ด/feed',
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
//print_r($array);
//loop news 5 times
for($i=0;$i<5;$i++){
    $title = $array['channel']['item'][$i]['title'];
    $link = $array['channel']['item'][$i]['link'];
    $description = $array['channel']['item'][$i]['description'];
    $pubDate = $array['channel']['item'][$i]['pubDate'];
    $image = $array['channel']['item'][$i]['enclosure']['@attributes']['url'];
    echo $title;
    echo $link;
    echo $description;
    echo $pubDate;
    echo $image;
}
//print_r($json);