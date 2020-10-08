<?php
header('Access-Control-Allow-Origin: *');
$year = 2533;
$cachear = array();
while($year-543 <= date('Y')) {
    $string  = file_get_contents('https://www.myhora.com/%E0%B8%AB%E0%B8%A7%E0%B8%A2/%E0%B8%9B%E0%B8%B5-'.strval($year).'.aspx');
    array_push($cachear,$string);
    $year += 1;
}
$file = fopen("cache.txt","w");
echo fwrite($file,json_encode($cachear));
fclose($file);
?>