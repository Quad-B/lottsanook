<?php

header('Access-Control-Allow-Origin: *');

//echo htmlspecialchars(file_get_contents("https://news.sanook.com/lotto/check/01092560/"));

$json_string  = file_get_contents('https://lottsanook.herokuapp.com/test.txt');
$json_array  = json_decode($json_string, true);

$count = 0;

echo $json_array[0];

foreach($json_array as $val){

    if($count <= 408){
        $count += 1;
        continue;
    }

    echo $val;

    $string  = file_get_contents('https://lottsanook.herokuapp.com/?date='.$val.'');
    $number_array  = json_decode($string, true);

    var_dump($number_array);
    
    if(array_search($_GET['search'], $number_array)){
        echo 'yes';
    }

}

echo 'เสร็จแล้ว';
?>