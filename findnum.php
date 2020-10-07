<?php
//header('Location: https://quadbproject.000webhostapp.com/testfind.html');

//error_reporting(E_ERROR | E_PARSE);

$texttime = "15-09-2020";

$your_date = strtotime("1 day", strtotime($texttime));
$new_date = date("dmY", $your_date);

$whatdate = $your_date;
while($whatdate !== strtotime(date("d-m-Y"))) {

    $aday = date("dm",$whatdate).date("Y",$whatdate)+543;

    $string  = file_get_contents('https://news.sanook.com/lotto/check/'.$aday.'/');
    $dom = new DOMDocument();
    $dom->loadHTML($string);
    $dom->preserveWhiteSpace = false;
    //get all meta tags
    $bigel = $dom->getElementsByTagName('strong');
    $el = $dom->getElementsByTagName('span');

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

    $minwave = 0;
    $maxwave = 5;

    foreach($el as $val){
        //get value of each content
        //echo $val -> getAttribute('class').'<br>';
        if ($val -> getAttribute('class') == 'lotto__number' || $val -> getAttribute('class') == 'default-font--reward') {

            if ($minwave >= 1 && $minwave <= $maxwave) {
                $lottapi[$wave][$minwave] = $val ->nodeValue;
                $minwave++;
            } else {
                $minwave = 0;
            }

            if ($val ->nodeValue == 'ผลสลากกินแบ่งรัฐบาล รางวัลที่ 2 มี 5 รางวัลๆละ 200,000 บาท' || $val ->nodeValue == 'ผลสลากกินแบ่งรัฐบาล รางวัลที่ 2 มี 5 รางวัลๆละ 100,000 บาท') {
                $minwave += 1;
                $maxwave = 5;
                $wave = 5;
            }

            if ($val ->nodeValue == 'ผลสลากกินแบ่งรัฐบาล รางวัลที่ 3 มี 10 รางวัลๆละ 80,000 บาท' || $val ->nodeValue == 'ผลสลากกินแบ่งรัฐบาล รางวัลที่ 3 มี 10 รางวัลๆละ 40,000 บาท') {
                $minwave += 1;
                $maxwave = 10;
                $wave = 6;
            }

            if ($val ->nodeValue == 'ผลสลากกินแบ่งรัฐบาล รางวัลที่ 4 มี 50 รางวัลๆละ 40,000 บาท' || $val ->nodeValue == 'ผลสลากกินแบ่งรัฐบาล รางวัลที่ 4 มี 50 รางวัลๆละ 20,000 บาท') {
                $minwave += 1;
                $maxwave = 50;
                $wave = 7;
            }

            if ($val ->nodeValue == 'ผลสลากกินแบ่งรัฐบาล รางวัลที่ 5 มี 100 รางวัลๆละ 20,000 บาท' || $val ->nodeValue == 'ผลสลากกินแบ่งรัฐบาล รางวัลที่ 5 มี 100 รางวัลๆละ 10,000 บาท') {
                $minwave += 1;
                $maxwave = 100;
                $wave = 8;
            }

            //echo $val ->nodeValue.'<br>';
        }
        if ($val ->nodeValue == 'รางวัลที่ 1') {
            //echo $bigel[0] ->nodeValue.'<br>';
            $lottapi[0][1] = $bigel[0] ->nodeValue;
        } else if ($val ->nodeValue == 'เลขหน้า 3 ตัว') {
            //echo $bigel[1] ->nodeValue.$bigel[2] ->nodeValue.'<br>';
            $lottapi[1][1] = $bigel[1] ->nodeValue;
            $lottapi[1][2] = $bigel[2] ->nodeValue;
        } else if ($val ->nodeValue == 'เลขท้าย 3 ตัว') {
            //echo $bigel[3] ->nodeValue.$bigel[4] ->nodeValue.'<br>';
            if (substr($_GET['date'],4,4) <= 2558) {
                if (substr($_GET['date'],2,2) <= 8 && substr($_GET['date'],4,4) <= 2558 || substr($_GET['date'],4,4) < 2558) {
                    $lottapi[2][1] = $bigel[1] ->nodeValue;
                    $lottapi[2][2] = $bigel[2] ->nodeValue;
                    $lottapi[2][3] = $bigel[3] ->nodeValue;
                    $lottapi[2][4] = $bigel[4] ->nodeValue;
                } else {
                    $lottapi[2][1] = $bigel[3] ->nodeValue;
                    $lottapi[2][2] = $bigel[4] ->nodeValue;
                }
            } else {
                $lottapi[2][1] = $bigel[3] ->nodeValue;
                $lottapi[2][2] = $bigel[4] ->nodeValue;
            }
        } else if ($val ->nodeValue == 'เลขท้าย 2 ตัว') {
            //echo $bigel[5] ->nodeValue.'<br>';
            $lottapi[3][1] = $bigel[5] ->nodeValue;
        } else if ($val ->nodeValue == 'รางวัลข้างเคียงรางวัลที่ 1') {
            //echo $bigel[6] ->nodeValue.$bigel[7] ->nodeValue.'<br>';
            if (is_numeric($bigel[6] ->nodeValue)) {
                $lottapi[4][1] = $bigel[6] ->nodeValue;
                $lottapi[4][2] = $bigel[7] ->nodeValue;
            } else {
                $lottapi[4][1] = $bigel[7] ->nodeValue;
                $lottapi[4][2] = $bigel[8] ->nodeValue;
            }
        }
    }

    foreach ($lottapi as $value)
    { 
        foreach ($value as $inside)
        { 
            //if($inside==0){
            //    continue;
            //} else {
                echo $inside.'<br>';
            //}
        }
    }


    $whatdate = strtotime("1 day", $whatdate);

}
?>
