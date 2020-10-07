
<?php

header('Access-Control-Allow-Origin: *');

//echo htmlspecialchars(file_get_contents("https://news.sanook.com/lotto/check/01092560/"));

$string  = file_get_contents('https://news.sanook.com/lotto/check/'.$_GET['date'].'/');
$dom = new DOMDocument();
//$dom->loadHTML(mb_convert_encoding($string, 'HTML-ENTITIES', 'UTF-8'));
$dom->loadHTML($string);
$dom->preserveWhiteSpace = false;
//get all meta tags
$el = $dom->getElementsByTagName('span');

foreach($el as $val){

        if ($val ->nodeValue == 'ผลสลากกินแบ่งรัฐบาล รางวัลที่ 2 มี 5 รางวัลๆละ 200,000 บาท' || $val ->nodeValue == 'ผลสลากกินแบ่งรัฐบาล รางวัลที่ 2 มี 5 รางวัลๆละ 100,000 บาท') {
            echo 'วันนี้หวยออก';
        }

}
?>
