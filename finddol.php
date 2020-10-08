<?php
header('Access-Control-Allow-Origin: *');
$json_string  = file_get_contents('https://lottsanook.herokuapp.com/test.txt');
$json_array  = json_decode($json_string, true);
$count = 0;
foreach($json_array as $val){
    if($count <= 408){
        $count += 1;
        continue;
    }
    $string  = file_get_contents('https://lottsanook.herokuapp.com/?date='.$val.'');
    $number_array  = json_decode($string, true);
    if(array_search($_GET['search'], $number_array)){
        echo $val;
    }
}
echo 'เสร็จแล้ว';
?>