<?php
header('Access-Control-Allow-Origin: *');
if(strlen($_GET['search']) != 6){
    echo "error";
    exit();
}
if(isset($_GET['by'])){
    $date=$_GET['by'];
}
$url = "https://lottsanook.herokuapp.com/?date=".$date;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);
$yourlot = $response;
if(file_exists("cache/".$date.".txt")){
    $myfile = fopen("cache/".$date.".txt","r") or die("Unable to open file!");
    $yourlot = fread($myfile,filesize("cache/".$date.".txt"));
}
$lot_array  = json_decode($yourlot);
//echo $yourlot;
/*if($lot_array[0][1] == $_GET['search']){
    echo "hee";
}*/
foreach($lot_array as $x => $val) {
    foreach($val as $y => $superval) {
        //echo "$x and $y = $val<br>";
        if($superval == $_GET['search'] && $y != 0){
            //echo "hee";
            if($x == 1){
                echo "111111";
            }
            echo $superval;
        }
        //echo $superval;
    }
    /*if($lot_array[0][1] == $_GET['search']){
        echo "hee";
    }*/
}
?>