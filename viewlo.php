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
    <?php
    $json = file_get_contents('https://lottsanook.herokuapp.com/god.php');
    $obj = json_decode($json);
    $json = file_get_contents('https://lottsanook.herokuapp.com/?date='.end($obj));
    $obj = json_decode($json);
    $day = substr(end($obj), 0,2);
    $month = substr(end($obj), 2,2);
    $year = substr(end($obj), 4,4);
    switch ($month) {
      case '01' : $monthtext="มกราคม"; break;
      case '02' : $monthtext="กุมภาพันธ์"; break;
      case '03' : $monthtext="มีนาคม"; break;
      case '04' : $monthtext="เมษายน"; break;
      case '05' : $monthtext="พฤษภาคม"; break;
      case '06' : $monthtext="มิถุนายน"; break;
      case '07' : $monthtext="กรกฎาคม"; break;
      case '08' : $monthtext="สิงหาคม"; break;
      case '09' : $monthtext="กันยายน"; break;
      case '10' : $monthtext="ตุลาคม"; break;
      case '11' : $monthtext="พฤศจิกายน"; break;
      case '12' : $monthtext="ธันวาคม"; break;
    }
    ?>
    <div class="container">
        <div class="mb-2 mt-2" style="font-size: 10vh"><center><span class="badge bg-secondary">ผลการออกสลากกินแบ่งรัฐบาล ประจำวันที่ <?php echo substr(end($obj), 0,2) ?> <?php echo $monthtext ?> <?php echo substr(end($obj), 4,4) ?></span></center></div>
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
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
</body>
</html>