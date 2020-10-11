<?php
header('Access-Control-Allow-Origin: *');
$myfile = fopen("test.txt","r") or die("Unable to open file!");
$json_string = fread($myfile,filesize("test.txt"));
fclose($myfile);
$json_array  = json_decode($json_string);
$count = 0;
$allwin = array();
foreach($json_array as $val){
    if($count <= 408){
        $count += 1;
        continue;
    }
    $url = "https://lottsanook.herokuapp.com/?date=".$val."&from";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);
    $number_array  = json_decode($response);
    //var_dump($number_array);
    foreach($number_array as $vall){
        if (in_array($_GET['search'], $vall))
        {
            array_push($allwin,$number_array[0][0]);
            //echo $number_array[0][0];
        }
    }
}

echo json_encode($allwin);
?>