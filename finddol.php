<?php

header('Access-Control-Allow-Origin: *');

//echo htmlspecialchars(file_get_contents("https://news.sanook.com/lotto/check/01092560/"));

$json_string  = file_get_contents('https://lottsanook.herokuapp.com/test.txt');
$json_array  = json_decode($json_string, true);

$start = array_search('16012550',$json_array);
$count = 0;
?>
<script type="text/javascript">
console.log(<?php echo $start; ?>);
</script>
<?php

foreach($json_array as $val){

        if($count <= 40){
            continue;
            $count += 1;
        }

        $string  = file_get_contents('https://lottsanook.herokuapp.com/?date='.$val);
        $number_array  = json_decode($string, true);

        if(array_search($_GET['search'], $number_array)){
            echo 'yes';
        }

}

$start  = file_get_contents('https://lottsanook.herokuapp.com/ohmygod.php?wow='.$wtf);
$end = $start;
echo 'เสร็จแล้ว';
?>