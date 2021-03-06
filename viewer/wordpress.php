<?php
header('Access-Control-Allow-Origin: *');
$rss = new DOMDocument();
$rss->load('https://boyphongsakorn.wordpress.com/feed/');

$feed = array();
foreach ($rss->getElementsByTagName('item') as $node)
{
    $item = array ( 
    'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
    'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
    'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
    'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
    'img' => $node->getElementsByTagName('content')->item(2)->getAttribute("url"),
    );
array_push($feed, $item);
}

echo json_encode($feed);
?>
