<?php

header('Access-Control-Allow-Origin: *');

//echo htmlspecialchars(file_get_contents("https://www.myhora.com/%E0%B8%AB%E0%B8%A7%E0%B8%A2/%E0%B8%9B%E0%B8%B5-2533.aspx"));

$string  = file_get_contents('https://www.myhora.com/%E0%B8%AB%E0%B8%A7%E0%B8%A2/%E0%B8%9B%E0%B8%B5-2533.aspx');
$dom = new DOMDocument();
$dom->loadHTML($string);
$dom->preserveWhiteSpace = false;
$bigel = $dom->getElementsByTagName('font');

foreach($bigel as $val){
    //if(strpos($val ->nodeValue, 'ตรวจสลากกินแบ่งรัฐบาล')){
        echo $val ->nodeValue.'<br>';
        echo strpos($val ->nodeValue, 'ตรวจสลากกินแบ่งรัฐบาล').'<br>';
    //}
}
?>