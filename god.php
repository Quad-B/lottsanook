<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
if(isset($_GET["cache"])){
    $myfile = fopen("cache/test.txt", "r") or die("Unable to open file!");
    echo fgets($myfile);
    fclose($myfile);
    exit();
}
$year = 2533;
$preyearlist = array();
$preyearsuperlist = array();
$yearlist = array();
$nextyear = date('Y')+543;
$channel = [];
$mydate = "";
if(file_exists("cache/test.txt")){
    $myfile = fopen("cache/test.txt", "r") or die("Unable to open file!");
    $mydate = json_decode(fgets($myfile));
    if(substr(end($mydate),4,4) == date('Y')+543){
        $year = date('Y')+543;
        //echo "yes this year";
        foreach ($mydate as $key => $value) {
            if(substr($value,4,4) == $year){
                //echo $value;
                unset($mydate[$key]);
            }
        }
    }else{
        $year = substr(end($mydate),4,4);
        //echo "yes that year ".substr(end($mydate),4,4);
        foreach ($mydate as $key => $value) {
            if(substr($value,4,4) == $year){
                //echo $value;
                unset($mydate[$key]);
            }
        }
    }
    $mydate = array_values($mydate);
}
while($year <= $nextyear) {
    $mh = curl_multi_init();
    $channel = [];
    for ($i=0; $i < 10; $i++) {
        $ayear = $year+$i;
        $channel[$i] = curl_init("https://www.myhora.com/%E0%B8%AB%E0%B8%A7%E0%B8%A2/%E0%B8%9B%E0%B8%B5-".strval($ayear).".aspx");
        curl_setopt($channel[$i], CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($channel[$i], CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($channel[$i], CURLOPT_SSL_VERIFYPEER, 0);
        curl_multi_add_handle($mh,$channel[$i]);
    }
    $running = null;
    do {
        curl_multi_exec($mh, $running);
        curl_multi_select($mh);
    } while ($running > 0);
    for ($i=0; $i < 10; $i++) { 
        curl_multi_remove_handle($mh, $channel[$i]);
    }
    curl_multi_close($mh);
    for ($i=0; $i < 10; $i++) {
        $preyearsuperlist = array();
        $preyearlist = array();
        $res = curl_multi_getcontent($channel[$i]);
        $peryear = array();
        $dom = new DOMDocument();
        $dom->loadHTML($res);
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
                array_unshift($preyearsuperlist,sprintf("%02d",$day[0]).$monthnum.$day[3]);
            }
        }
        foreach($peryear as $val){
            array_push($yearlist,$val);
            if($mydate != ""){
                array_push($mydate,$val);
            }
        }
        foreach($preyearsuperlist as $val){
            array_push($preyearlist,$val);
            $prefile = fopen("cache/".$day[3].".txt","w");
            fwrite($prefile,json_encode($preyearlist));
            fclose($prefile);
        }
    }
    $year += 10;
}
if ($mydate != "") {
    $file = fopen("cache/test.txt","w");
    fwrite($file,json_encode($mydate));
    fclose($file);
    //echo "test";
    echo json_encode($mydate);
}else{
    $file = fopen("cache/test.txt","w");
    fwrite($file,json_encode($yearlist));
    fclose($file);
    //echo "test2";
    echo json_encode($yearlist);
}
?>