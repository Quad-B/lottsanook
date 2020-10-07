<?php
header('Access-Control-Allow-Origin: *');
$json_string  = file_get_contents('https://lottsanook.herokuapp.com/test.txt');
$json_array  = json_decode($json_string, true);
$elementCount  = count($json_array);
$year = substr($json_array[$elementCount-1],-4);
$yearlist = $json_array;
if($elementCount == 0){
    $year = 2533;
    $yearlist = array();
}
echo $elementCount;
echo $year;
echo $yearlist;
$nextyear = $year+7;
while($year <= $nextyear) {
    $peryear = array();
    $string  = file_get_contents('https://www.myhora.com/%E0%B8%AB%E0%B8%A7%E0%B8%A2/%E0%B8%9B%E0%B8%B5-'.strval($year).'.aspx');
    $dom = new DOMDocument();
    $dom->loadHTML($string);
    $dom->preserveWhiteSpace = false;
    $bigel = $dom->getElementsByTagName('font');
    foreach($bigel as $val){
        if(is_numeric(strpos($val ->nodeValue, 'ตรวจสลากกินแบ่งรัฐบาล'))){
            $day = explode(" ", substr($val ->nodeValue, 74));
            switch ($day[2]){
                case 'มกราคม' : $monthnum="01"; break;
                case 'กุมภาพันธ์' : $monthnum="02"; break;
                case 'มีนาคม' : $monthnum="03"; break;
                case 'เมษายน' : $monthnum="04"; break;
                case 'พฤษภาคม' : $monthnum="05"; break;
                case 'มิถุนายน' : $monthnum="06"; break;
                case 'กรกฎาคม' : $monthnum="07"; break;
                case 'สิงหาคม' : $monthnum="08"; break;
                case 'กันยายน' : $monthnum="09"; break;
                case 'ตุลาคม' : $monthnum="10"; break;
                case 'พฤศจิกายน' : $monthnum="11"; break;
                case 'ธันวาคม' : $monthnum="12"; break;
            }
            array_unshift($peryear,sprintf("%02d",$day[0]).$monthnum.$day[3]);
        }
    }

    foreach($peryear as $val){
        array_push($yearlist,$val);
    }

    $year += 1;
}

$file = fopen("test.txt","w");
echo fwrite($file,json_encode($yearlist));
fclose($file);

//var_dump($yearlist);
?>