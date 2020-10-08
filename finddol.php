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
    $url = "https://lottsanook.herokuapp.com/?date=".$val;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, urlencode($url));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    //$string  = file_get_contents('https://lottsanook.herokuapp.com/?date='.$val.'');
    $number_array  = json_decode($response, true);
    if(array_search($_GET['search'], $number_array)){
        echo $val;
    }
}
echo 'เสร็จแล้ว';
?>