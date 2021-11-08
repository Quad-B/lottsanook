<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$cars = array(); 

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.brighttv.co.th/tag/เลขเด็ด/feed',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;

//$removed = preg_replace('/^\s*\/\/<!\[CDATA\[([\s\S]*)\/\/\]\]>\s*\z/', '$1', $response);

//get from xml
/*$xml = new SimpleXMLElement($response);
//get title and link of each news
print_r($xml->channel->item->description);
foreach ($xml->channel->item as $item) {
    preg_match("/^<!\[CDATA\[(.*)\]\]>$/s", $item->description, $out);
  $cars[] = array(
    'title' => $item->title,
    'link' => $item->link,
    'description' => $out[1],
    'pubDate' => $item->pubDate,
    'guid' => $item->guid,
  );
}*/
//print_r(json_encode($cars));

$xml = simplexml_load_string($response, 'SimpleXMLElement', LIBXML_NOCDATA);
$json = json_encode($xml);
$array = json_decode($json,TRUE);
//print_r($array);
//loop news 5 times
//print_r($array);
for($i=0;$i<5;$i++){
     $title = $array['channel']['item'][$i]['title'];
     $link = $array['channel']['item'][$i]['link'];
     $description = $array['channel']['item'][$i]['description'];
     $pubDate = $array['channel']['item'][$i]['pubDate'];
     //$image = $array['channel']['item'][$i]['enclosure']['@attributes']['url'];
     /*echo $title;
     echo $link;
     echo $description;
     echo $pubDate;
     echo $image;*/
     //cut description to 100 char and add ...
     $description = substr($description,0,100);
     $description = $description."...";
     $a=array($title,$link,$description,$pubDate);
     array_push($cars,$a);
}

echo json_encode($cars);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.khaosod.co.th/tag/เลขเด็ด/feed',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;

//get items from xml
$xml = simplexml_load_string($response, 'SimpleXMLElement', LIBXML_NOCDATA);
$json = json_encode($xml);
$array = json_decode($json,TRUE);
//print_r($array);
//loop news 5 times
//print_r($array);
for($i=0;$i<5;$i++){
    $title = $array['channel']['item'][$i]['title'];
    $link = $array['channel']['item'][$i]['link'];
    $description = $array['channel']['item'][$i]['description'];
    print_r($array['channel']['item'][$i]['description']);
    $pubDate = $array['channel']['item'][$i]['pubDate'];
    //$image = $array['channel']['item'][$i]['enclosure']['@attributes']['url'];
    /*echo $title;
    echo $link;
    echo $description;
    echo $pubDate;
    echo $image;*/
    //cut description to 100 char and add ...
    $description = substr($description,0,100);
    $description = $description."...";
    $a=array($title,$link,$description,$pubDate);
    array_push($cars,$a);
}

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.brighttv.co.th/tag/หวยแม่น้ำหนึ่ง/feed',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;

//get items from xml
$xml = simplexml_load_string($response, 'SimpleXMLElement', LIBXML_NOCDATA);
$json = json_encode($xml);
$array = json_decode($json,TRUE);
//print_r($array);
//loop news 5 times
//print_r($array);
for($i=0;$i<5;$i++){
    $title = $array['channel']['item'][$i]['title'];
    $link = $array['channel']['item'][$i]['link'];
    $description = $array['channel']['item'][$i]['description'];
    $pubDate = $array['channel']['item'][$i]['pubDate'];
    //$image = $array['channel']['item'][$i]['enclosure']['@attributes']['url'];
    /*echo $title;
    echo $link;
    echo $description;
    echo $pubDate;
    echo $image;*/
    //cut description to 100 char and add ...
    $description = substr($description,0,100);
    $description = $description."...";
    $a=array($title,$link,$description,$pubDate);
    array_push($cars,$a);
}

echo json_encode($cars);
//print_r($json);
?>