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
foreach($json_array as $id){
    if($count <= 408){
        $count += 1;
        continue;
    }

    //if(rand(0,1) == '0'){
        $fetchURL = "https://quadbproject.000webhostapp.com/forfind/?date=".$id."&from";
    /*}else{
        $fetchURL = "https://lottsanook.herokuapp.com/?date=".$id."&from";
    }*/
    
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