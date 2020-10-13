<?php
header('Access-Control-Allow-Origin: *');
$myfile = fopen("test.txt","r") or die("Unable to open file!");
$json_string = fread($myfile,filesize("test.txt"));
fclose($myfile);
$json_array  = json_decode($json_string);
$count = 0;
$allwin = array();
$mh = curl_multi_init();
$channels = [];
/*foreach($json_array as $val){
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
    foreach($number_array as $vall){
        if (in_array($_GET['search'], $vall))
        {
            array_push($allwin,$number_array[0][0]);
        }
    }
}*/

foreach($json_array as $id){
    if($count <= 408){
        $count += 1;
        continue;
    }

    $fetchURL = "https://lottsanook.herokuapp.com/?date=".$id."&from";
    
    $channels[$id] = curl_init($fetchURL);
    curl_setopt($channels[$id], CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($channels[$id], CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($channels[$id], CURLOPT_SSL_VERIFYPEER, 0);
    curl_multi_add_handle($mh, $channels[$id]);
}

$running = null;
do {
    curl_multi_exec($mh, $running);
    curl_multi_select($mh);
} while ($running > 0);

foreach ($json_array as $id) {
    if($count <= 408){
        $count += 1;
        continue;
    }
    curl_multi_remove_handle($mh, $channels[$id]);
}

curl_multi_close($mh);

foreach($json_array as $id){
    if($count <= 408){
        $count += 1;
        continue;
    }
    
    $res    = curl_multi_getcontent($channels[$id]);

    $number_array  = json_decode($res);
    foreach($number_array as $vall){
        if (in_array($_GET['search'], $vall))
        {
            array_push($allwin,$number_array[0][0]);
        }
    }
}

echo json_encode($allwin);
?>