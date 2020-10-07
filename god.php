<?php

header('Access-Control-Allow-Origin: *');

$year = 2533;

$yearlist = array();

while($year <= 2543) {

    //echo htmlspecialchars(file_get_contents("https://www.myhora.com/%E0%B8%AB%E0%B8%A7%E0%B8%A2/%E0%B8%9B%E0%B8%B5-2533.aspx"));

    $string  = file_get_contents('https://www.myhora.com/%E0%B8%AB%E0%B8%A7%E0%B8%A2/%E0%B8%9B%E0%B8%B5-'.strval($year).'.aspx');
    $dom = new DOMDocument();
    $dom->loadHTML($string);
    $dom->preserveWhiteSpace = false;
    $bigel = $dom->getElementsByTagName('font');

    foreach($bigel as $val){
        if(is_numeric(strpos($val ->nodeValue, 'ตรวจสลากกินแบ่งรัฐบาล'))){
            //echo substr($val ->nodeValue, 74).'     ';
            //echo $val ->nodeValue.'<br>';
            $day = explode(" ", substr($val ->nodeValue, 74));
            //print_r($day);
            //echo $day[0];
            //echo $day[2];
            //echo $day[3];
            //echo '<br>';

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

            array_push($yearlist,sprintf("%08d",$day[0]).$monthnum.$day[3]);
        }
    }

    $year += 1;

}

var_dump($yearlist);

?>