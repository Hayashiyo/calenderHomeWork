<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=h3, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // if(!empty($_GET)){
    // $height = $_GET['height'];
    // $weight = $_GET['weight'];
    // }elseif(!empty($_POST)){
    //     $height = $_POST['height'];
    //     $weight = $_POST['weight'];   
    // }else{
    //     echo "<a href='bmi.php'>資料錯誤請回首頁</a> ";
    //     exit();
    // }

    // // $bmi = round($weight / (($height / 100) * ($height / 100)), 1);
    // $bmi=round($weight/(($height/100)*($height/100)),1);
    // echo "高" . $height . "寬" . $weight . "bmi" . $bmi;
    // if ($bmi < 18.5) {
    //     $level = "過輕";
    // } elseif ($bmi < 24) {
    //     $level = "健康";
    // } elseif ($bmi < 27) {
    //     $level = "過重";
    // } elseif ($bmi < 30) {
    //     $level = "輕度肥胖";
    // } elseif ($bmi < 35) {
    //     $level ="中度肥胖";
    // } else {
    //     $level = "重度肥胖";
    // }
    // echo $level;
    
    ?>
    <?php
$height=$_GET['height'];
$weight=$_GET['weight'];
if(!empty($_GET)){
    $height=$_GET['height'];
    $weight=$_GET['weight'];

}else if(!empty($_POST)){

    $height=$_POST['height'];
    $weight=$_POST['weight'];
}else{

    echo "資料輸入錯誤，請回表單重新輸入";
    echo "<a href='bmi.php'>回表單</a>";
    exit();
}

echo "身高為".$height."<br>";
echo "體重為".$weight."<br>";
$bmi=round($weight/(($height/100)*($height/100)),1);
echo $bmi;
if($bmi<18.5){
    $level="體重過輕";
}else if($bmi<24){
    $level="健康體位";
}else if($bmi<27){
    $level="過重";
}else if($bmi<30){
    $level="輕度肥胖";
}else if($bmi<35){
    $level="中度肥胖";
}else{
    $level="重度肥胖";
}
?>
<h3>你的BMI計算結果為:<?=$bmi;?></h3>
    <h3>結果</h3>
    <div><?= $bmi ?></div>
    <div><?= $level ?></div>
    <a href="./bmi.php">return</a>
</body>

</html>