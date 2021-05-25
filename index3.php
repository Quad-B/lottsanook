<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
$filename = $_GET['date'].".txt";
$day = substr($_GET['date'], 0,2);
$month = substr($_GET['date'], 2,2);
$year = substr($_GET['date'], 4,4);
switch ($month){
    case '01' : $monthtext="มกราคม"; break;
    case '02' : $monthtext="กุมภาพันธ์"; break;
    case '03' : $monthtext="มีนาคม"; break;
    case '04' : $monthtext="เมษายน"; break;
    case '05' : $monthtext="พฤษภาคม"; break;
    case '06' : $monthtext="มิถุนายน"; break;
    case '07' : $monthtext="กรกฎาคม"; break;
    case '08' : $monthtext="สิงหาคม"; break;
    case '09' : $monthtext="กันยายน"; break;
    case '10' : $monthtext="ตุลาคม"; break;
    case '11' : $monthtext="พฤศจิกายน"; break;
    case '12' : $monthtext="ธันวาคม"; break;
}
if (isset($_GET['fresh'])) {
    if(file_exists("cache/".$filename)){
        unlink("cache/".$filename);
    }
}
if(file_exists("cache/".$filename)){
    $myfile = fopen("cache/".$filename,"r") or die("Unable to open file!");
    $readwow = fread($myfile,filesize("cache/".$filename));
    if (isset($_GET['from'])) {
        $readwow = json_decode($readwow, true);
        $readwow[0][0] = $day.' '.$monthtext.' '.$year;
        $readwow = json_encode($readwow);
    }
    echo $readwow;
    fclose($myfile);
    exit();
}
$bttf = $year-543;
$url = "https://lottery.kapook.com/".$year."/".$bttf."-".$month."-".$day;
//echo $url;
//$url = "https://news.sanook.com/lotto/check/".$_GET['date']."/";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);
$dom = new DOMDocument();
//echo $response;
if($response == ""){
    echo json_encode(array(array("รางวัลที่1",0),array("เลขหน้า3ตัว",0,0),array("เลขท้าย3ตัว",0,0),array("เลขท้าย2ตัว",0),array("รางวัลข้างเคียงรางวัลที่1",0,0),array("รางวัลที่2",0,0,0,0,0),array("รางวัลที่3",0,0,0,0,0,0,0,0,0,0),array("รางวัลที่4",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),array("รางวัลที่5",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),));
    exit();
}
$dom->loadHTML($response);
$dom->preserveWhiteSpace = false;
$edog = $dom->getElementsByTagName('section');
//$bigel = $dom->getElementsByTagName('strong');
//$el = $dom->getElementsByTagName('span');
$lottapi = array (
    array("รางวัลที่1",0),
    array("เลขหน้า3ตัว",0,0),
    array("เลขท้าย3ตัว",0,0),
    array("เลขท้าย2ตัว",0),
    array("รางวัลข้างเคียงรางวัลที่1",0,0),
    array("รางวัลที่2",0,0,0,0,0),
    array("รางวัลที่3",0,0,0,0,0,0,0,0,0,0),
    array("รางวัลที่4",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
    array("รางวัลที่5",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
);
if (isset($_GET['from'])) {
    $lottapi[0][0] = $day.' '.$monthtext.' '.$year;
}
$minwave = 0;
$maxwave = 5;
$arcount=0;
foreach ($edog as $val) {
    //echo $val->getElementsByTagName('strong');
    foreach ($val->getElementsByTagName('strong') as $valtwo) {
        if(is_numeric($valtwo->nodeValue)){
            //echo $valtwo->nodeValue;
            //echo "<br>";
            $mrcount++;
            $lottapi[$arcount][$mrcount] = $valtwo->nodeValue;
            if($arcount==0&&$mrcount==1){
                $arcount+=1;
                $mrcount=0;
            }
            if($arcount==1&&$mrcount==2){
                $arcount+=1;
                $mrcount=0;
            }
            if($arcount==2&&$mrcount==2){
                $arcount+=1;
                $mrcount=0;
            }
            if($arcount==3&&$mrcount==1){
                $arcount+=1;
                $mrcount=0;
            }
            if($arcount==4&&$mrcount==2){
                $arcount+=1;
                $mrcount=0;
            }
            if($arcount==5&&$mrcount==2){
                $arcount+=1;
                $mrcount=0;
            }
            if($arcount==6&&$mrcount==10){
                $arcount+=1;
                $mrcount=0;
            }
            if($arcount==7&&$mrcount==50){
                $arcount+=1;
                $mrcount=0;
            }
            if($arcount==8&&$mrcount==100){
                /*$arcount+=1;
                $mrcount=0;*/
                break;
            }
        }
    }
}
echo json_encode($lottapi);
if (isset($_GET['from'])) {
    $lottapi[0][0] = "รางวัลที่1";
}
if(preg_match('~[0-9]+~', $lottapi[0][1])){
    $myfile = fopen("cache/".$filename, "w") or die("Unable to open file!");
    fwrite($myfile, json_encode($lottapi));
    fclose($myfile);
}
?>
