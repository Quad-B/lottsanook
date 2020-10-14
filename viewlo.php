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
            background-image: url('https://pixabay.com/get/57e1d0404f51a414f6da8c7dda2a3376103bdaec4e50774977297fdc9448c0_1280.jpg');
        }
    </style>
</head>
<body>
    <?php
    $json = file_get_contents('https://lottsanook.herokuapp.com/god.php');
    $obj = json_decode($json);
    $json = file_get_contents('https://lottsanook.herokuapp.com/?date='.end($obj));
    $obj = json_decode($json);
    ?>
    <div class="container">
        <div class="mb-2 mt-2" style="font-size: 10vh"><center><span class="badge bg-secondary">ผลการออกสลากกินแบ่งรัฐบาล ประจำวันที่ 1 ตุลาคม 2563</span></center></div>
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