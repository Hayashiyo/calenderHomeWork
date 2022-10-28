<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>萬年曆</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        table {
            border-collapse: collapse;
            margin: 0 auto;
        }

        table td {
            border: 1px solid #ccc;
            padding: 3px 9px;
        }

        .change {
            display: flex;
            width: 100%;
            justify-content: space-between;
            align-items: center;
            background-color: blueviolet;
        }
    </style>
</head>

<body>
    <?php
    // 宣告空陣列
    $cal = [];

    $month = (isset($_GET['m'])) ? $_GET['m'] : date("n");//三元判斷 IF $_GET 存在 ? 用$_GET ELSE : 用date("n")
    $year = (isset($_GET['y'])) ? $_GET['y'] : date("Y");
    if($month<1){$month==12;$year - 1;}
    if($month>12){$month==1;$year + 1;}
    $nextMonth = $month + 1;
    $prevMonth = $month - 1;



    $firstDay = $year . "-" . $month . "-1";
    $firstDayWeek = date("N", strtotime($firstDay));
    $monthDays = date("t", strtotime($firstDay));
    $lastDay = $year . '-' . $month . '-' . $monthDays;
    $spaceDays = $firstDayWeek - 1; //空隔日=開始日-1(EX:周六開始有五空格/周四有三.....
    $weeks = ceil(($monthDays + $spaceDays) / 7); //空隔日+開始日/7=週數

    for ($i = 0; $i < $spaceDays; $i++) {
        $cal[] = ''; //陣列放入=>空隔日-1
    }

    for ($i = 0; $i < $monthDays; $i++) {
        $cal[] = date("Y-m-d", strtotime("+$i days", strtotime($firstDay))); //陣列放入=>月中日數
    }

    /* echo "<pre>";
print_r($cal);
echo "</pre>"; */

    echo "第一天" . $firstDay . "星期" . $firstDayWeek;
    echo "<br>";
    echo "該月共" . $monthDays . "天,最後一天是" . $lastDay;
    echo "<br>";
    echo "月曆天數共" . ($monthDays + $spaceDays) . "天，" . $weeks . "周";

    ?>

    <div class="change">
        <a href="?<?= $year; ?>&m=<?= $prevMonth; ?>">上一個月</a>
        <h1><?= $year; ?> 年 &m=<?= $month; ?> 月份</h1>
        <a href="?<?= $year; ?>&m=<?= $nextMonth; ?>">下一個月</a>
    </div>
    <br>

    <table>
        <?php
        foreach ($cal as $i => $day) {
            if ($i % 7 == 0) {
                echo "<tr>";
            }
            echo "<td>$day</td>";

            if ($i % 7 == 6) {
                echo "</tr>";
            }
        }

        ?>

    </table>
</body>

</html>