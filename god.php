<?php
header('Access-Control-Allow-Origin: *');
//$json_string  = file_get_contents('https://lottsanook.herokuapp.com/test.txt');
//$json_array  = json_decode($json_string, true);
//$elementCount  = count($json_array);
//$year = substr($json_array[$elementCount-1],-4);
//if($year-543 == date('Y')){
//    echo 'จะเอาปีหน้าด้วยหรอหรือยังไง?';
//    exit();
//}
//$year += 1;
//$yearlist = $json_array;
//if($elementCount == 0){
    $year = 2533;
//    $yearlist = array();
//}
//$nextyear = $year+10;
$nextyear = 2563;
while($year <= $nextyear) {
    $ch1 = curl_init();
    $ch2 = curl_init();
    $ch3 = curl_init();
    $ch4 = curl_init();
    $ch5 = curl_init();
    $ch6 = curl_init();
    $ch7 = curl_init();
    $ch8 = curl_init();
    $ch9 = curl_init();
    $ch10 = curl_init();

    curl_setopt($ch1, CURLOPT_URL, "https://www.myhora.com/%E0%B8%AB%E0%B8%A7%E0%B8%A2/%E0%B8%9B%E0%B8%B5-".strval($year).".aspx");
    curl_setopt($ch1, CURLOPT_HEADER, 0);
    curl_setopt($ch2, CURLOPT_URL, "https://www.myhora.com/%E0%B8%AB%E0%B8%A7%E0%B8%A2/%E0%B8%9B%E0%B8%B5-".strval($year+1).".aspx");
    curl_setopt($ch2, CURLOPT_HEADER, 0);
    curl_setopt($ch3, CURLOPT_URL, "https://www.myhora.com/%E0%B8%AB%E0%B8%A7%E0%B8%A2/%E0%B8%9B%E0%B8%B5-".strval($year+2).".aspx");
    curl_setopt($ch3, CURLOPT_HEADER, 0);
    curl_setopt($ch4, CURLOPT_URL, "https://www.myhora.com/%E0%B8%AB%E0%B8%A7%E0%B8%A2/%E0%B8%9B%E0%B8%B5-".strval($year+3).".aspx");
    curl_setopt($ch4, CURLOPT_HEADER, 0);
    curl_setopt($ch5, CURLOPT_URL, "https://www.myhora.com/%E0%B8%AB%E0%B8%A7%E0%B8%A2/%E0%B8%9B%E0%B8%B5-".strval($year+4).".aspx");
    curl_setopt($ch5, CURLOPT_HEADER, 0);
    curl_setopt($ch6, CURLOPT_URL, "https://www.myhora.com/%E0%B8%AB%E0%B8%A7%E0%B8%A2/%E0%B8%9B%E0%B8%B5-".strval($year+5).".aspx");
    curl_setopt($ch6, CURLOPT_HEADER, 0);
    curl_setopt($ch7, CURLOPT_URL, "https://www.myhora.com/%E0%B8%AB%E0%B8%A7%E0%B8%A2/%E0%B8%9B%E0%B8%B5-".strval($year+6).".aspx");
    curl_setopt($ch7, CURLOPT_HEADER, 0);
    curl_setopt($ch8, CURLOPT_URL, "https://www.myhora.com/%E0%B8%AB%E0%B8%A7%E0%B8%A2/%E0%B8%9B%E0%B8%B5-".strval($year+7).".aspx");
    curl_setopt($ch8, CURLOPT_HEADER, 0);
    curl_setopt($ch9, CURLOPT_URL, "https://www.myhora.com/%E0%B8%AB%E0%B8%A7%E0%B8%A2/%E0%B8%9B%E0%B8%B5-".strval($year+8).".aspx");
    curl_setopt($ch9, CURLOPT_HEADER, 0);
    curl_setopt($ch10, CURLOPT_URL, "https://www.myhora.com/%E0%B8%AB%E0%B8%A7%E0%B8%A2/%E0%B8%9B%E0%B8%B5-".strval($year+9).".aspx");
    curl_setopt($ch10, CURLOPT_HEADER, 0);

    $mh = curl_multi_init();

    curl_multi_add_handle($mh,$ch1);
    curl_multi_add_handle($mh,$ch2);
    curl_multi_add_handle($mh,$ch3);
    curl_multi_add_handle($mh,$ch4);
    curl_multi_add_handle($mh,$ch5);
    curl_multi_add_handle($mh,$ch6);
    curl_multi_add_handle($mh,$ch7);
    curl_multi_add_handle($mh,$ch8);
    curl_multi_add_handle($mh,$ch9);
    curl_multi_add_handle($mh,$ch10);

    for ($i=1; $i <= 10; $i++) { 
        $string = curl_multi_getcontent($ch$$i);
        $peryear = array();
        //$string  = file_get_contents('https://www.myhora.com/%E0%B8%AB%E0%B8%A7%E0%B8%A2/%E0%B8%9B%E0%B8%B5-'.strval($year).'.aspx');
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
    }
    $year += 10;
}
$file = fopen("test.txt","w");
echo fwrite($file,json_encode($yearlist));
fclose($file);
?>