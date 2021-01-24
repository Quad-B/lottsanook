<?php
$im = imagecreatefrompng("https://image.joox.com/JOOXcover/0/6e93d6e3a4f7ca69/640");
$rgb = iimagecolorat($im, "500", "500");
$r = ($rgb >> 16) & 0xFF;
$g = ($rgb >> 8) & 0xFF;
$b = $rgb & 0xFF;

var_dump($r, $g, $b);
?>