<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>member</h1>
    <?php
    if(isset($_GET['result'])){
        switch($_GET['result']){
            case 'succes';
        }
    }
    ?>
    <form action="check.php" method="post">
    <div><input type="text"></div>
    <div><input type="number" name="acc" id="$acc"></div>
    <div><input type="submit" value="login" name="pw"></div>
    </form>
</body>
</html>