<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>session</h1>
    <?php
    session_start();
    $_SESSION['name']='LEO';
    echo "<br>";

    echo $_SESSION['name'];
    
    ;?>
<br>
<a href="./tesession.php">會員登入</a>
|
<a href="./tesession02.php">個人資料</a>
</body>
</html>