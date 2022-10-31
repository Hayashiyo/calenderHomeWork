<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>萬年曆</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-align: center;
        }
        .change {
            display: flex;
            width: 100%;
            justify-content: space-around;
            align-items: center;
            /* background-color: blueviolet; */
        }

        .cal{
            display:flex;
            flex-wrap: wrap;
            width:80%;
            margin: auto;
        }
        .cal .date{
            border:1px solid #999;
            width:calc(100% / 7);
            margin-left:-1px;
            margin-top:-1px;
        }
        .cal .date:hover{
            transform: scale(1.05);
            background-color: lightcyan;
        }
        .date:nth-child(1){background-color: red;}
        .date:nth-child(7){background-color: red;}
    </style>
</head>
<body>
<?php
$cal=['日','月','火','水','木','金','土'];

$month=(isset($_GET['m']))?$_GET['m']:date("n");
$year=(isset($_GET['y']))?$_GET['y']:date("Y");
if ($month < 1) {
    $month = 12;
    $year = $year - 1;
}
if ($month > 12) {
    $month = 1;
    $year = $year + 1;
}

$nextMonth=$month+1;
$prevMonth=$month-1;


$firstDay=$year."-".$month."-1";
$firstDayWeek=date("N",strtotime($firstDay));
$monthDays=date("t",strtotime($firstDay));
$lastDay=$year.'-'.$month.'-'.$monthDays;
$spaceDays=$firstDayWeek-1;
$weeks=ceil(($monthDays+$spaceDays)/7);
$MandSP=($monthDays + $spaceDays);


for($i=0;$i<$spaceDays;$i++){
    $cal[]='';
}

for($i=0;$i<$monthDays;$i++){
    $cal[]=date("Y-m-d",strtotime("+$i days",strtotime($firstDay)));
}
for ($i = 0; $i <($weeks*7)-$MandSP; $i++) {
    $cal[] = ''; //陣列放入=>END空隔日
}
// print_r($cal)

?>

<div class="change">
        <a href="?y=<?= $year; ?>&m=<?= $prevMonth; ?>"><i class="fa-solid fa-angles-left">prev</i></a>
        <!-- y代入$year & m代入$prevMonth-->
        <h1 class="head"><?= $year; ?> 年 <?= $month; ?> 月份</h1>
        <a href="?y=<?= $year; ?>&m=<?= $nextMonth; ?>"><i class="fa-solid fa-angles-right">next</i></a>
</div>

<div class='cal'>
<?php
foreach($cal as $i => $day){
    echo "<div class='date'>$day</div>";
}
?>
</div>

</body>
</html>