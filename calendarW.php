<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>萬年曆</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            background-image: url(./p/greg-rakozy-oMpAz-DN-9I-unsplash.jpg);
            background-size: cover;
            background-repeat: no-repeat;
        }

        table {
            width: 60%;
            border-collapse: collapse;
            margin: 0 auto;
            text-align: center;
            background: black;
            opacity: .6
        }

        table td {
            border: 1px solid #ccc;
            padding: 3px 9px;
        }

        td {
            color: aqua;
            font-size: x-large;
        }

        .change {
            display: flex;
            width: 100%;
            justify-content: space-around;
            align-items: center;
            /* background-color: blueviolet; */
        }

        .youbi {
         font-size: xx-large;
        }

        a:hover {
            color: red;
        }
        .head{color: gray;font-style: italic;}
        td:hover{background-color: gray;}
        td:nth-child(1) { color: red; }
        td:nth-child(7) { color: red; }
        span{font-family: 'Courier New', Courier, monospace;font-size: xx-large;}
        
    </style>
</head>

<body>
    <br>
    <?php
    // 宣告空陣列
    $cal = [];

    $month = (isset($_GET['m'])) ? $_GET['m'] : date("n"); //三元判斷 IF $_GET 存在 ? 用$_GET ELSE : 用date("n")
    $year = (isset($_GET['y'])) ? $_GET['y'] : date("Y");
    if ($month < 1) {
        $month = 12;
        $year = $year - 1;
    }
    if ($month > 12) {
        $month = 1;
        $year = $year + 1;
    }
    // echo $year;
    // echo $month;
    echo "<br>";
    $nextMonth = $month + 1;
    $prevMonth = $month - 1;
    // echo $nextMonth;
    // echo $prevMonth;



    $firstDay = $year . "-" . $month . "-1";
    $firstDayWeek = date("N", strtotime($firstDay));
    $monthDays = date("t", strtotime($firstDay));
    $lastDay = $year . '-' . $month . '-' . $monthDays;
    $spaceDays = $firstDayWeek; //空隔日=開始日-1(EX:周六開始有五空格/周四有三.....
    $weeks = ceil(($monthDays + $spaceDays) / 7); //空隔日+開始日/7=週數
    $MandSP=($monthDays + $spaceDays);

    for ($i = 0; $i < $spaceDays; $i++) {
        $cal[] = ''; //陣列放入=>START空隔日
    }

    for ($i = 0; $i < $monthDays; $i++) {
        $cal[] = date("Y-m-d", strtotime("+$i days", strtotime($firstDay))); //陣列放入=>月中日數
    }
    for ($i = 0; $i <($weeks*7)-$MandSP; $i++) {
        $cal[] = ''; //陣列放入=>END空隔日
    }
    // print_r($cal)

    /* echo "<pre>";
print_r($cal);
echo "</pre>"; */

    // echo "第一天" . $firstDay . "星期" . $firstDayWeek;
    // echo "<br>";
    // echo "該月共" . $monthDays . "天,最後一天是" . $lastDay;
    // echo "<br>";
    // echo "月曆天數共" . ($monthDays + $spaceDays) . "天，" . $weeks . "周";

    ?>

    <div class="change">
        <a href="?y=<?= $year; ?>&m=<?= $prevMonth; ?>"><i class="fa-solid fa-angles-left">prev</i></a>
        <!-- y代入$year & m代入$prevMonth-->
        <h1 class="head"><?= $year; ?> 年 <?= $month; ?> 月份</h1>
        <a href="?y=<?= $year; ?>&m=<?= $nextMonth; ?>"><i class="fa-solid fa-angles-right">next</i></a>
    </div>
    <br>
    <br>
    <div>
        <table>
            <tr class="youbi">
                <td>日</td>
                <td>一</td>
                <td>二</td>
                <td>三</td>
                <td>四</td>
                <td>五</td>
                <td>六</td>
            </tr>
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
    </div>
</body>

</html>