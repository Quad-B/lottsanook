<?php

$year = 2533;

header('Access-Control-Allow-Origin: *');

while($year <= 2563) {



    //echo htmlspecialchars(file_get_contents("https://www.myhora.com/%E0%B8%AB%E0%B8%A7%E0%B8%A2/%E0%B8%9B%E0%B8%B5-2533.aspx"));

    $string  = file_get_contents('https://www.myhora.com/%E0%B8%AB%E0%B8%A7%E0%B8%A2/%E0%B8%9B%E0%B8%B5-'.strval($year).'.aspx');
    $dom = new DOMDocument();
    $dom->loadHTML($string);
    $dom->preserveWhiteSpace = false;
    $bigel = $dom->getElementsByTagName('font');

    foreach($bigel as $val){
        if(is_numeric(strpos($val ->nodeValue, 'ตรวจสลากกินแบ่งรัฐบาล'))){
            echo $val ->nodeValue.'<br>';
        }
    }

    $year += 1;

}
?>