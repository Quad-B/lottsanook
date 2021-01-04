<?php
$url = "https://www.lottovip.co/%E0%B8%AB%E0%B8%A7%E0%B8%A2%E0%B9%84%E0%B8%97%E0%B8%A2%E0%B8%A3%E0%B8%B1%E0%B8%90/";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);
$dom = new DOMDocument();
$dom->loadHTML($response);
$dom->preserveWhiteSpace = false;
$el = $dom->getElementsByTagName('img');
$xpath = new DOMXPath($el);
foreach($xpath as $val){
    $src = $val->evaluate("string(//img/@src)");
    echo $src;
}
?>