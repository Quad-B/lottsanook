<?php
$url = "https://www.myhora.com/%E0%B8%AB%E0%B8%A7%E0%B8%A2/%E0%B8%87%E0%B8%A7%E0%B8%94-".$day."-".urlencode($monthtext)."-".$year.".aspx";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);
$dom = new DOMDocument();
$dom->loadHTML($response);
$dom->preserveWhiteSpace = false;
$el = $dom->getElementsByTagName('img');
foreach($el as $val){
    echo $val -> getAttribute('class');
}
?>