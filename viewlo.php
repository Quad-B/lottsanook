<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Charm&display=swap');

        body{
            font-family: 'Charm', cursive;
            background-image: url('https://quadbproject.000webhostapp.com/money-1153538_1280.jpg');
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="mb-2 mt-2" style="font-size: 10vh"><center><span class="badge bg-secondary">ผลการออกสลากกินแบ่งรัฐบาล ประจำวันที่ <?php echo (int)$day ?> <?php echo $monthtext ?> <?php echo $year ?></span></center></div>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-success">
                        <center>รางวัลที่1</center>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><center><h3><?php echo $obj[0][1] ?></h3></center></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-info">
                        <center>รางวัลเลขหน้าสามตัว</center>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><center><h3><?php echo $obj[1][1] ?> | <?php echo $obj[1][2] ?></h3></center></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-info">
                        <center>รางวัลเลขท้ายสามตัว</center>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><center><h3><?php echo $obj[2][1] ?> | <?php echo $obj[2][2] ?></h3></center></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-warning">
                        <center>รางวัลเลขท้ายสองตัว</center>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><center><h3><?php echo $obj[3][1] ?></h3></center></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-header">
                Fun Fact
            </div>
            <div class="card-body">
                <p class="card-text d-inline"><div id="numfind"></div> เคยออกมาแล้ว <div id="numcount"></div> ครั้ง ในรอบ 13 ปี</p>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
    <script>
    $.getJSON('https://lottsanook.herokuapp.com/god.php', function(data1) {
        $.getJSON('https://lottsanook.herokuapp.com/?date='+data1[data1.length - 1], function(data2) {
            randnum = rand(1,6);
            if(randnum == 1){
                numsel = $obj[0][1];
            } else if(randnum == 2) {
                numsel = $obj[1][1];
            } else if(randnum == 3) {
                numsel = $obj[1][2];
            } else if(randnum == 4) {
                numsel = $obj[2][1];
            } else if(randnum == 5) {
                numsel = $obj[2][2];
            } else if(randnum == 6) {
                numsel = $obj[3][1];
            }
            $.getJSON('https://lottsanook.herokuapp.com/finddol.php?search=<?php echo $numsel ?>', function(data3) {
                document.getElementById('numfind').innerText = numsel
                console.log(data3.length)
                document.getElementById('numfind').innerText = data3.length
            });
        });
    });
    
    </script>
</body>
</html>