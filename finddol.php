
<?php


header('Access-Control-Allow-Origin: *');

//echo htmlspecialchars(file_get_contents("https://news.sanook.com/lotto/check/01092560/"));

$texttime = "15-09-2020";

$your_date = strtotime("1 day", strtotime($texttime));
$new_date = date("dmY", $your_date);

$whatdate = $your_date;
while($whatdate !== strtotime(date("d-m-Y"))) {
        
        $aday = date("dm",$whatdate).date("Y",$whatdate)+543;

$string  = file_get_contents('https://news.sanook.com/lotto/check/'.$aday.'/');
$dom = new DOMDocument();
//$dom->loadHTML(mb_convert_encoding($string, 'HTML-ENTITIES', 'UTF-8'));
$dom->loadHTML($string);
$dom->preserveWhiteSpace = false;
//get all meta tags
$el = $dom->getElementsByTagName('span');

foreach($el as $val){

        if ($val ->nodeValue == 'ผลสลากกินแบ่งรัฐบาล รางวัลที่ 2 มี 5 รางวัลๆละ 200,000 บาท' || $val ->nodeValue == 'ผลสลากกินแบ่งรัฐบาล รางวัลที่ 2 มี 5 รางวัลๆละ 100,000 บาท') {
            echo 'วันนี้หวยออก';
            $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
  fwrite($myfile, $wow);
  fclose($myfile);
        }

}
        $whatdate = strtotime("1 day", $whatdate);
}
?>
