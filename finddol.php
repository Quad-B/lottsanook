<?php

header('Access-Control-Allow-Origin: *');

//echo htmlspecialchars(file_get_contents("https://news.sanook.com/lotto/check/01092560/"));

$texttime = "15-09-2020";

$your_date = strtotime("1 day", strtotime($texttime));
$new_date = date("dmY", $your_date);

$wtf = '';
$whatdate = $your_date;
while($whatdate <= strtotime(date("d-m-Y"))) {
        
        $aday = date("dm",$whatdate).date("Y",$whatdate)+543;
        if (strlen($aday) == 7) {
                $aday = sprintf("%08d",date("dm",$whatdate).date("Y",$whatdate)+543);
        }
        
        $string  = file_get_contents('https://news.sanook.com/lotto/check/'.$aday.'/');

        if (strpos($string, 'ผลสลากกินแบ่งรัฐบาล รางวัลที่ 2 มี 5 รางวัลๆละ 200,000 บาท') || strpos($string, 'ผลสลากกินแบ่งรัฐบาล รางวัลที่ 2 มี 5 รางวัลๆละ 100,000 บาท')) {
            $wtf .= $aday;
        }
  
        $whatdate = strtotime("1 day", $whatdate);
}

$start  = file_get_contents('http://lottsanook.herokuapp.com/ohmymod.php?wow='.$aday);
$end = $start;
echo 'เสร็จแล้ว';
?>
